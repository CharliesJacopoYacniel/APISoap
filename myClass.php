<?php
include_once "conexion/crud.php";
/**
 * Servicios web para el proyecto Conciliaciones y Protocolos DARA 
 * @author  ========================== ---- By Beanario Software --- <c.tejada@beanar.io>
 * @version 1.0
 */
class Conciliaciones { 
     /**
     *  1.1 METODO INVOKESERVICE
     *  Descripción:
     *  Este método se utilizará para realizar la ejecución de los servicios de conciliación bancaria:
     *  - Pre-conciliación (PRE-CON)
     *  - Conciliación (RESU-PAGO) y
     *  - Verificación de Conciliación (VER-CON):
     * @param string $userId
     * @param string $password
     * @param string $service
     * @return string $mesagge
     */
    public function invokeService($userId,$password,$service){
        $mesagge="mensaje de pespuesta de llamado principal ,valores:".$userId." ".$password." ".$service;
        switch ($service) {
            case "PRE-CON":
                $mesagge=$mesagge." PRE-CON";
                break;
            case "RESU-PAGO":
                $mesagge=$mesagge." RESU-PAGO";
                break;
            case "VER-CON":
                $mesagge=$mesagge." VER-CON";
                break;
            case "SOL-GAR":
                $mesagge=$mesagge." SOL-GAR";
                break;
            case "CON-GAR":
                $mesagge=$mesagge." CON-GAR";
                break;
            case "VER-GAR":
                $mesagge=$mesagge." VER-GAR";
                break;    
            default:
                $mesagge=" = CASO INDEFINIFO,INTENTE DE NUEVO = ";
        }
        return $mesagge;
    }

    /**
     * 1.2 MÉTODO PRE-CONCILIACIÓN BANCARIA (PRE-CON)
     * Descripción:
     * Este método se utilizará para realizar la Pre-conciliación bancaria; el método se encarga de devolver las liquidaciones que fueron pagadas durante el día ingresado.
     * @param string $codigoBancario
     * @param string $fechaPago
     * @return array $response
     */
    public function pre_Conciliacion($codigoBancario,$fechaPago){
        $db = new crud();
        if($db->__conectar()){
            $response=array(
                "codigoBancarioTGR"=>"HN-TETS",
                "fechaPago"=>"09-10-2018",
                "totalOperaciones"=>"13422",
                "totalTransferido"=>"187,322.93",
                "OPERACIONES"=>$db->__selectAll('country'),
                "OPERACION"=>$db->__selectAll('countrylanguage'),
                "idLiqExterno"=>"092jhsj",
                "importePagado"=>"8712.09"
            );
            $db->__desconectar();
        }
        return $response;
    }
    
    /** 
     * 1.3 MÉTODO DE CONCILIACIÓN BANCARIA O RESUMEN PAGO (RESU-PAGO)
     * Este método se utilizará para conciliar las operaciones, de un determinado día de operación. Este método devuelve el archivo de PA01.
     * @param string $codigoBancarioTGR
     * @param string $fechaPago
     * @param float $totalOperaciones
     * @param float $totalTransferido
     * @param array $OPERACIONES
     * @param array $OPERACION
     * @param string $idLiqExterno
     * @param float $importePagado
     * @return array $response
     */
    public function conciliacion($codigoBancarioTGR,$fechaPago,$totalOperaciones,$totalTransferido,$OPERACIONES,$OPERACION,$idLiqExterno,$importePagado){
        $db = new crud();
        if($db->__conectar()){
            $selecWhere =array("ID"=>1);
            $response=array("urlPA01"=>"http://localhost:8888/wsConciliaciones/test.wsdl",
                            "fechaOperacion"=>"09-10-2018",
                            "totalOperaciones"=>$db->__selectOne('city',$selecWhere),
                            "totalTransferido"=>"187,322.93",
                            "nroTransaccion"=>"122",
                            "fechaHoraTrn"=>"09-10-2018 20:30:23");
            $db->__desconectar();
        }
        return $response;
    }

    /** 
     * 1.4 MÉTODO DE VERIFICACIÓN DE CONCILIACIÓN BANCARIA (VER-CON)
     * Descripción:
     * Este método se utilizará para verificar que la conciliación bancaria se halla realizado de manera satisfactoria.
     * @param string $codigoBancarioTGR
     * @param string $fechaPago
     * @param string $idConciliacion
     * @return array $response
     */

    public function ver_conciliacion($codigoBancarioTGR,$fechaPago,$idConciliacion){
        $db = new crud();
        if($db->__conectar()){
            $selecWhereLike =array("Name"=>"Tegu");
            $response=array(
                "codigoBancarioTGR"=>"test HN08",
                "descBanco"=>$db->__selectWhereLike('city',$selecWhereLike),
                "descConciliado"=>"Test de descricion de conciliacion",
                "idConciliacion"=>"HNBASA01",
                "fechaConciliacion"=>"09-10-2018 20:30:23"
                );
            $db->__desconectar();
        }
        
        return $response;
    }

    
}

?>