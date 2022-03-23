<?php
require_once "lib/nusoap.php";
require_once "lib/Model.php";

//use Model\Model;

class postOperations {
    public function post($what, $where="", $order="", $params=[]) {
        $classModel = new Model\ModelMySQL();
        return json_encode($classModel->selectDB($what, $where, $order, $params));
    }

    public function ms_post($what, $where="", $order="", $params=[]) {
        $classModel = new Model\ModelMSSQL();
        return json_encode($classModel->selectDB($what, $where, $order, $params));
    }
}
  
$server = new soap_server();
$server->configureWSDL("postService", "http://192.168.1.250/postService");

$server->register("postOperations.postOffer",
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
    "http://192.168.1.250/userService",
    "http://192.168.1.250/userService#getUser",
    "rpc",
    "encoded",
    "Get user from id");


@$server->service(file_get_contents("php://input"));