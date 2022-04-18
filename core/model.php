<?php
class model
{
    public $db;
    public function __construct(){
        $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_USERNAME,DB_PASSWORD);
    }
    public function model($file) {
        if (file_exists(MODELS_PATH."/".$file.".php")) {
            require_once MODELS_PATH."/".$file.".php";
            if (class_exists($file)) {
                return new $file;
            } else {
                exit("$file is not a class");
            }
        } else {
            exit("$file model file is not found.");
        }
    }

    public function selectDB($tableName, $where = "", $orderby = "", $params=[])
    {
        $orderby = (!empty($orderby))?" order by ".$orderby:"";
        $where = (!empty($where))?" where ".$where:"";
        $query = $this->db->prepare("select * from $tableName $where $orderby");
        $query->execute($params);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function freeQuery($queryText, $params = []) {
        $query = $this->db->prepare($queryText);
        return $query->execute($params);
    } 

}