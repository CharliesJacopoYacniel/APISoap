<?php
require_once "crud.php";

$db = new crud();
$datos =array("datos array "=>"esta vacio ");
//parameros de Busqueda __buscarTupla
$paramBuscar = array("Name");

//parameros de elimnar __borrarTupla
$datosBorrar = array("Code"=>"AFG");

//parametros de funcion __insertarTupla
$lenguajes = array("nombre"=>'LATA3',
                    "apellido"=>'T',);

//parametros de funcion __actualizarTupla
$datosSet = array(
                  "Code"=>"HND", 
                  "Name"=>'HONDURAS',//Kabul
                  "Continent"=>'Honduras',
                  "Region"=>'Central America',
                  "SurfaceArea"=>112088.00,
                  "IndepYear"=>1838,
                  "Population"=>6485000,
                  "LifeExpectancy"=>69.9,
                  "GNP"=>5333.00,
                  "GNPOld"=>4697.00,
                  "LocalName"=>"Honduras",
                  "GovernmentForm"=>"Republic",
                  "HeadOfState"=>"Carlos Roberto Flores Facussé",
                  "Capital"=>933,
                  "Code2"=>"HN",
                  );
$datosWhere= array("Code"=>"HND");

//parametros de funcion __crearTabla
$datosNewTabla = array("id"=>"int(3) NOT NULL AUTO_INCREMENT", 
                        "nombre"=>'varchar(50) NOT NULL',
                        "apellido"=>'varchar(150) NOT NULL');
$primaryKey =array("primaryKey"=>"id");   

//parametos de funcion __selectOne
$selecWhere =array("ID"=>1);

//parametos de deuncio __selectWhereLike
$selecWhereLike =array("Name"=>"Tegu");  
//

if($db->__conectar()){
    // $datos=$db->__selectAll('countrylanguage');
    // $datos=$db->__selectAll('city');
    //  $datos=$db->__selectOne('city',$selecWhere);
    //  $datos=$db->__selectWhereLike('city',$selecWhereLike);
    // $datos=$db->__buscarPorCampos('country',$paramBuscar);
    // $db->__borrarTupla("country",$datosBorrar);
    // $db->__insertarTupla("personasTEST",$lenguajes);
    // $db->__actualizarTupla("country",$datosSet,$datosWhere);
    // $db->__crearTabla("personasTEST",$datosNewTabla,$primaryKey);
    // $db->__eliminarTabla("testTable");
    // $db->__eliminarTuplasTabla("personasTEST");
    
    
    // $xml = new SimpleXMLElement('<response/>');
    // foreach ($datos as $key => $value) {
    //     if(!is_object($value)){
    //     // $i=0;
    //         foreach ($value as $campo => $valor) {
    //             // $value= str_replace('.',',',$value);
    //             if(!(String)$valor){
    //                 $valor=(String)$valor;
    //             }
    //         }
    //         $value=array_flip($value);
    //         // var_dump($value);
    //     }
    //     array_walk_recursive($value, array($xml,'addChild'));
    // }
    // print $xml->asXML();

    $db->__desconectar();
}


var_dump($datos);
