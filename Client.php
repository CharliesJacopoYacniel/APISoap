<?php
ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
error_reporting ( E_ALL );

$url="http://localhost:8888/APISoap/Server.php";
$uri="http://localhost:8888/APISoap/";

$wsdl="http://localhost:8888/APISoap/Server.php?wsdl";
$cliente = new SoapClient($wsdl);
// var_dump($cliente->__getFunctions());
// echo '<br>';
// echo '<br>';
// echo json_encode($cliente->pre_Conciliacion('6','2'));
echo json_encode($cliente->conciliacion());
// echo json_encode($cliente->ver_conciliacion());
/*
    PRE-CON,
    RESU-PAGO,
    VER-CON

    SOL-GAR 
    CON-GAR
    VER-GAR
*/
?>