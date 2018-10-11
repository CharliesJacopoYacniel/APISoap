<?php
ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
error_reporting ( E_ALL );
$url="http://localhost:8888/wsConciliaciones/Server.php";
$uri="http://localhost:8888/wsConciliaciones/";
require_once('myClass.php'); 
    // require_once('WSDLDocument/src/WSDLDocument.php');
    // $wsdl = new WSDLDocument("Conciliaciones",$url,$uri);
    // var_dump($wsdl->saveXml());

// $servidor = new SoapServer("myWsdl.wsdl");
$servidor = new SoapServer("test.wsdl");
$servidor->setClass("Conciliaciones"); 
$servidor->addFunction(SOAP_FUNCTIONS_ALL);
$servidor->handle();
?>