<?php
session_start();
require_once 'init.php';
$system = new system();
/* require_once "wsdl/lib/nusoap.php";
  
$client = new nusoap_client("http://192.168.1.250/wsdl/getOperations.php?wsdl", true);
$error  = $client->getError();
  
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
  
$result = $client->call("getOperations.get", array("offers"));
  
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
} else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
        echo "<h2>Main</h2>";
        echo $result;
    }
}
  
// show soap request and response
echo "<h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>"; */