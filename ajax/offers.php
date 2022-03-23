<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require_once "../wsdl/lib/Model.php";
if (!empty($_POST)) {
    function allProducts() {
        $classModel = new \Model\ModelMySQL();
        echo $classModel->selectDB("products");
    }

    function getModules($params) {
        $classModel = new \Model\ModelMySQL();
    //    echo json_encode($params);
        $query = $classModel->db->prepare('SELECT mg.product_id, mg.module_group_name, mg.price_inf, m.* FROM `module_groups` mg LEFT JOIN modules m on m.`module_group_id` = mg.`id` WHERE mg.`product_id`='.$params["productId"].' ORDER BY mg.`sort`, m.`sort`');
//        echo json_encode($query);
        $query->execute($params->productId);

        echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    }

    function postData($params) {
        // echo json_encode($params);
        $classModel = new \Model\ModelMySQL();
        $returnValue = $classModel->postOffer($params);
        echo json_encode($returnValue);
    }

    $action = $_POST['action'];
    $params = $_POST['params'];
//    $action = $_GET['action'];
//    $params = $_GET['params'];

    if (function_exists($action)) {
        call_user_func($action,$params);
    } else {
        echo "bulunamadı.".$action;
    }


}