<?php
require_once "lib/nusoap.php";
require_once "lib/Model.php";

//use Model\Model;

class getOperations {
    public function get($what, $where="", $order="", $params=[]) {
        $classModel = new Model\ModelMySQL();
        return json_encode($classModel->selectDB($what, $where, $order, $params));
    }

    public function ms_get($what, $where="", $order="", $params=[]) {
        $classModel = new Model\ModelMSSQL();
        return json_encode($classModel->selectDB($what, $where, $order, $params));
    }
}
  
$server = new soap_server();
$server->configureWSDL("getService", "http://192.168.1.250/wsdl/getService");

$server->register("getOperations.get",
    array(
        "what"   => "xsd:string",
        "where"  => "xsd:string",
        "order"  => "xsd:string",
        "params" => [
            "xsd:string",
            "xsd:string",
            "xsd:string",
            "xsd:string",
            "xsd:string"
        ]
    ),
    array("return" => "xsd:string"),
    "http://192.168.1.250/wsdl/getService",
    "http://192.168.1.250/wsdl/getService#get",
    "rpc",
    "encoded",
    "Get user from id");
$server->register("getOperations.ms_get",
    array(
        "what"   => "xsd:string",
        "where"  => "xsd:string",
        "order"  => "xsd:string",
        "params" => [
            "xsd:string",
            "xsd:string",
            "xsd:string",
            "xsd:string",
            "xsd:string"
        ]
    ),
    array("return" => "xsd:string"),
    "http://192.168.1.250/wsdl/getService",
    "http://192.168.1.250/wsdl/getService#ms_get",
    "rpc",
    "encoded",
    "Get user from id");

@$server->service(file_get_contents("php://input"));