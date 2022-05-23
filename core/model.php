<?php
class model
{
    public $currentCurrencies = 'cbinal';//$this->getCurrenciesMB(["day"=>0]);
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

    public function getCurrenciesMB($params){
        $folder = $params["year"].$params["month"];
        $file = $params["day"].$params["month"].$params["year"];
        $url = "https://www.tcmb.gov.tr/kurlar/$folder/$file.xml";
        if($params["day"]==0){$url = "https://www.tcmb.gov.tr/kurlar/today.xml";}
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $response = curl_exec($curl);
        if ($response === false) {
            throw new Exception\ConnectionFailed('Sunucu Bağlantısı Kurulamadı: ' . $curl->error());
        }
        curl_close($curl);
        echo json_encode((array) simplexml_load_string($response));
        // echo "<br>".json_encode($doviz->Currency[0]->BanknoteSelling);
    }

    public function selectDB($tableName, $where = "", $orderby = "", $params=[])
    {
        $orderby = (!empty($orderby))?" order by ".$orderby:"";
        $where = (!empty($where))?" where ".$where:"";
        $query = $this->db->prepare("select * from $tableName $where $orderby");
        $query->execute($params);
        // print_r($query);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function freeQuery($queryText, $params = []) {
        $query = $this->db->prepare($queryText);
        $query->execute($params);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    } 

    public function getColums($tableName) {
        $query = $this->freeQuery("SELECT `COLUMN_NAME`, `COLUMN_COMMENT` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='workflow' AND `TABLE_NAME`=:table_name", ["table_name"=>$tableName]);
        return $query;
    }

}