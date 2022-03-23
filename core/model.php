<?php
class model
{
    public $db;
    public function __construct(){
        $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_USERNAME,DB_PASSWORD);
//        $this->db = new PDO('mysql:host=localhost;dbname=workflow','cbinal','Mer6514A4cve.');

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

}