<?php
ini_set ('display_errors',1);
ini_set ('display_startup_errors',1);
error_reporting (E_ALL);

define('HOST','localhost'); //AQUI VA TU HOST
define('USER','root');
define('PASS','root');
define('DBNAME','world');

class crud {
            //declaramos una variable para conexión
            protected $conexion;
            //================================================================ CONFIG ============================================================================================            
            //Función que cambia los valores de configuracion de acceso a la BD
            public function __configDB($host,$user,$pass,$dbName){
                define('HOST',$host); //AQUI VA TU HOST
                define('USER',$user);
                define('PASS',$pass);
                define('DBNAME',$dbName);
            }


            //================================================================ ACCESO A BD ============================================================================================            
            //Función que Abre la conexion con la BD
            public function __conectar(){
                $this->conexion = new mysqli(HOST,USER,PASS,DBNAME);
                if ($this->conexion->connect_error) {
                    die("Error de Conexión (".$this->conexion->connect_errno .") ".$this->conexion->connect_error);
                }
                return true;
            }
        

            //Función que cierra la conexion con la BD
            public function __desconectar(){
                if ($this->__conectar()) {
                    $this->conexion->close();
                }
            }
            //================================================================ CRUD ============================================================================================            
            //Función que crea tablas
            public function __crearTabla($nombreTabla,$datosNewTabla,$primaryKey){
                $sql= "CREATE TABLE IF NOT EXISTS $nombreTabla ( ";
                foreach($datosNewTabla as $indice=>$dato){
                        $sql.=$indice." ".$dato." , ";
                }
                $sql.=" PRIMARY KEY ( ";
                foreach($primaryKey as $indice=>$dato){
                    $sql.=$dato;
                }
                $sql.="))";
                if ($this->conexion->query($sql) === TRUE) {
                    echo "Se ha creado la tabla ".$nombreTabla; 
                } else {
                    echo "Fallo: NO se ha creado la tabla ".$this->conexion->error;
                }
            }
            

            //Función que crea tablas
            public function __eliminarTabla($nombreTabla){
                $sql="DROP TABLE IF EXISTS $nombreTabla";
                if ($this->conexion->query($sql) === TRUE) {
                    echo "Se ha ELIMINADO la tabla ( ".$nombreTabla." )"; 
                } else {
                    echo "Fallo: NO se ha eliminado la tabla ".$this->conexion->error;
                }
            }
           
            
            //Función que crea tablas
            public function __eliminarTuplasTabla($nombreTabla){
                $sql="TRUNCATE TABLE $nombreTabla";
                if ($this->conexion->query($sql) === TRUE) {
                    echo "Se ha barrido con los datos de la  tabla ".$nombreTabla; 
                } else {
                    echo "Fallo: NO se ha borrado datos de la tabla ".$this->conexion->error;
                }
            }


            //Creamos la función que tomara como parámetro la matriz campo => dato
            public function __insertarTupla($tabla, $camposdatos){
                //separamos los datos por si son varios
                $campo = implode(", ", array_keys($camposdatos));
                $sql= "INSERT INTO `$tabla` ( $campo ) ";
                $i=0;
                foreach($camposdatos as $indice=>$valor) {
                    $dato[$i] = "'".$valor."'";
                    $i++;
                }
                $datos = implode(", ",$dato);
                $sql.=" VALUES ($datos)";
                //Insertamos los valores en cada campo
                if($this->conexion->query($sql) === TRUE){
                    echo "Nueva Tupla insertado";
                }else{
                    echo "Fallo no se ha insertado la Tupla ".$this->conexion->error;
                }
            }
            

            //funcion para eliminar datos de una tabla
            public function __borrarTupla($tabla, $camposdatos) {
                $sql= " DELETE FROM `$tabla` WHERE ";
                foreach($camposdatos as $indice => $valor) {
                    $sql.=" '$indice' = '$valor' ";
                }
                $resultado=$this->conexion->query($sql);
                // var_dump($resultado);
                if($this->conexion->query($sql) ===TRUE){
                    if($this->conexion->affected_rows){
                        echo "Registro eliminado";//REGRESAR AQUI
                    } else{
                        echo "Fallo no se pudo eliminar el registro".$this->conexion->error;
                    }
                }
                else{echo "Fallo no se pudo eliminar el registro".$this->conexion->error;}
            }


            //Creamos la función que tomara como parámetro la matriz campo => dato
            public function __actualizarTupla($tabla, $camposset, $camposcondicion){
                //separamos los valores SET a modificar
                $sql= "UPDATE $tabla SET ";
                foreach($camposset as $indice=>$dato){
                    if ($dato === end($camposset)){
                        $sql.=$indice." = '".$dato."' ";// MALDITA ( , )
                    }else{
                        $sql.=$indice." = '".$dato."' , ";
                    }
                }
                $sql.=" WHERE ";
                foreach($camposcondicion as $indice=>$dato){
                    $sql.= $indice." = '".$dato."'";
                }
                // //Actualización de registros
                if($this->conexion->query($sql) === TRUE){
                    if(mysqli_affected_rows($this->conexion)){
                        echo "Registro actualizado";
                    }  else{
                        echo "Fallo NO se pudo Actualizar la tupla".$this->conexion->error;
                    }
                }
            }
            

            // funcion Buscar en una tabla por campos
            public function __buscarPorCampos($tabla,$campos){
                $campos=implode(", ",$campos);
                $resultado=$this->conexion->query("SELECT $campos FROM $tabla");
                if($resultado===FALSE){ 
                    echo "Sentencia incorrecta con datos ( ".$tabla.", ".$campos." )";
                }else{
                    return $resultado->fetch_all(MYSQLI_ASSOC); 
                }
            }


            // funcion SELECT ALL de una tabla
            public function __selectAll($tabla){
                $resultado=$this->conexion->query(" SELECT * FROM $tabla ");
                if($resultado===FALSE){ 
                    echo "Sentencia incorrecta llamado a una tabla ( ".$tabla." )";
                }else{ 
                    return $resultado->fetch_all(MYSQLI_ASSOC); 
                }
            }


            // funcion SELECT UNA TUPLA de una tabla por condicion
            public function __selectOne($tabla,$condiciones){
                $sql= "SELECT *FROM $tabla WHERE ";

                foreach($condiciones as $indice=>$dato){
                    $sql.= "".$indice." = '".$dato."' ";
                }
                // echo $sql;
                $resultado=$this->conexion->query($sql);
                if($resultado===FALSE){ 
                    echo "Sentencia incorrecta llamado a una tabla ( ".$tabla." )";
                }else{ 
                    return $resultado->fetch_all(MYSQLI_ASSOC); 
                }
            }


            // funcion SELECT ALL WHERE LIKE por condicion
            public function __selectWhereLike($tabla,$condiciones){
                $sql= "SELECT *FROM $tabla WHERE ";
                foreach($condiciones as $indice=>$dato){
                    if ($dato === end($condiciones)){//SI es el ultimo
                        $sql.=$indice." LIKE '%".$dato."%' ";// MALDITA ( , )
                    }else{
                        $sql.=$indice." LIKE '%".$dato."%' OR ";
                    }
                }
                $resultado=$this->conexion->query($sql);
                if($resultado===FALSE){ 
                    echo "Sentencia incorrecta llamado a una tabla ( ".$tabla." )";
                }else{ 
                    return $resultado->fetch_all(MYSQLI_ASSOC); 
                }
            }
            
}
?>