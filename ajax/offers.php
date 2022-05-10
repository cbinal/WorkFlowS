<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use Model\ModelMySQL;

require_once "../wsdl/lib/Model.php";
if (!empty($_POST)) {
    function allProducts() {
        $classModel1 = new \Model\ModelMySQL();
        echo json_encode($classModel1->selectDB("products"));
    }

    function getModules($params) {  
        $classModel = new \Model\ModelMySQL();
    //    echo json_encode($params);
        $query = $classModel->db->prepare('SELECT * FROM `vw_product_module_matches` WHERE `product_id`='.$params["productId"]);
    //    echo json_encode($query);
        $query->execute();

        echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    }

    function getFeatures($params) {
        $classModel = new \Model\ModelMySQL();
        $query = $classModel->db->prepare('SELECT * FROM `vw_product_feature_matches` WHERE `product_id`='.$params["productId"]);
        // echo json_encode($query);
        $query->execute();

        echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    }

    function postData($params) {
        // echo json_encode($params);
        $classModel = new \Model\ModelMySQL();
        $returnValue = $classModel->postOffer($params);
        echo json_encode($returnValue);
    }

    function getAffectingCondition($params){
        $classModel = new \Model\ModelMySQL();
        $query = $classModel->selectDB("modules", "id=".$params["module_id"]);
        echo json_encode($query);
    }

    function getAffectedModule($params){
        $classModel = new \Model\ModelMySQL();
        $query = $classModel->selectDB("conditions", "id=".$params["condition_id"]);
        echo json_encode($query);
    }

    $action = $_POST['action'];
    $params = $_POST['params'];
    // $action = $_GET['action'];
    // $params = $_GET['params'];

    if (function_exists($action)) {
        call_user_func($action,$params);
    } else {
        echo "bulunamadı.".$action;
    }


}