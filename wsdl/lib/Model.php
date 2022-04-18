<?php

namespace Model;

use mysql_xdevapi\Exception;

class ModelMySQL
{
    public $db;

    public function __construct()
    {
        $this->db = new \PDO('mysql:host=localhost;dbname=workflow','cbinal','Mer6514A4cve.');
    }

    public function selectDB($tableName, $where = "", $orderby = "", $params=[])
    {
        $orderby = (!empty($orderby))?" order by ".$orderby:"";
        $where = (!empty($where))?" where ".$where:"";
        $query = $this->db->prepare("select * from $tableName $where $orderby");
        $query->execute($params);
        return json_encode($query->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function versionController($forWhat, $referenceNo)
    {
        $offer = $this->selectDB($forWhat, "reference_no = ?",'revision_no desc',[$referenceNo]);

        $jsonOffer = json_decode($offer);

        if (empty($jsonOffer)) {
            return 0;
        } else {
            return $jsonOffer[0]->revision_no+1;
        }

    }

    private function arrangeData($data) {
        $returnValue = [];
        $tableName = "";
        foreach($data as $key=>$value) {
            $expKey = explode("-",$key);
            $returnValue[$expKey[0]][$expKey[2]][$expKey[1]] = $value;
            // $returnValue[$expKey[0]]["offer_id"] = $expKey[2];
        }
        $arrangedArr = [];
        $fieldName = array("features"=>"feature_id", "details"=>"module_id");
        foreach($returnValue as $itemKey=>$itemValue) {
            foreach($itemValue as $key=>$value) {
                $value[$fieldName[$itemKey]] = $key;
                $arrangedArr[$itemKey][] = $value;
            }
        }
        return $arrangedArr;
    }

    private function smashData($data=[]) {
        // return gettype($data);
        $fields = [];
        $params = [];
        foreach($data as $key=>$value){
            if (boolval($key)) {
                $fields[] = $key;
                $params[] = ":".$key;
            }
        }

        $fields_str = implode(', ', $fields);
        $params_str = implode(', ', $params);

        return array("fields_str"=>$fields_str, "params_str"=>$params_str);
    }

    public function postOffer($data) //TODO:cbinal DOM dan gelen veriye güvenme kontrollü içeri al  
    {
        $returnedValue = $this->arrangeData($data["details"]);
        $offerFeatures = $returnedValue["features"];
        $offerDetails  = $returnedValue["details"];
        unset($data["features"]);
        unset($data["heads"]["0"]);
        $returnValue = [];
        $rev_no = $this->versionController('offers', $data["heads"]['reference_no']);
        $data["heads"]["revision_no"] = $rev_no;
        $smashedData = $this->smashData($data["heads"]);
        // return ($smashedData);
        try {
            $sql = "INSERT INTO offers (".$smashedData["fields_str"].") VALUES (".$smashedData["params_str"].")";
            $stmt= $this->db->prepare($sql);
            // return $stmt;
            $returnValue["heads"]["status"] = boolval($stmt->execute($data["heads"]));
            // return $data["heads"];
            $returnValue["heads"]["id"] = $this->db->lastInsertId();
            if (boolval($rev_no)) {
                $returnValue["heads"]["message"] = "Teklif revizyon kaydı başarıyla tamamlandı.";
            } else {
                $returnValue["heads"]["message"] = "Teklif üst bilgileri başarıyla kaydedildi.";
            }
            // return $returnValue;
        } catch (Exception $e) {
            $returnValue["heads"]["status"] = False; 
            $returnValue["heads"]["message"]=$e;
            // return $returnValue;
        }

        if ($returnValue["heads"]["status"]) {
            // return $offerDetails;
            foreach ($offerDetails as $item) {
                $item["product_id"]=$data["heads"]["product_id"];
                $item["offer_id"]=$returnValue["heads"]["id"];
                $smashedData = $this->smashData($item);
                $sql = "INSERT INTO offer_details (".$smashedData["fields_str"].") VALUES (".$smashedData["params_str"].")";
                $stmt= $this->db->prepare($sql);
                // return $stmt;
                // return json_encode($item);
                $status = $stmt->execute($item);
                $returnValue["details"][] = array("status"=>$status, "id"=>$this->db->lastInsertId(), "message"=>$status ? 'Kayıt Başarılı' : 'Kayıt Hatası');
            }
        } 

        if ($returnValue["heads"]["status"]) {
            // return $offerDetails;
            $arrInd = 1;
            foreach ($offerFeatures as $item) {
                $item["product_id"]=$data["heads"]["product_id"];
                $item["offer_id"]=$returnValue["heads"]["id"];
                $smashedData = $this->smashData($item);
                $sql = "INSERT INTO offer_features (".$smashedData["fields_str"].") VALUES (".$smashedData["params_str"].")";
                $stmt= $this->db->prepare($sql);
                // return json_encode($item);
                $status = $stmt->execute($item);
                $returnValue["features"][] = array("status"=>$status, "id"=>$this->db->lastInsertId(), "message"=>$status ? 'Kayıt Başarılı' : 'Kayıt Hatası');
            }
            return $returnValue;
        } else {
            return $returnValue;
        } 
    }

    public function __destruct()
    {
        $this->db = null;
    }
}

class ModelMSSQL
{
    public $mssqlDB;

    public function __construct()
    {
        $hostname='192.168.1.3';
        $dbname='SEKIZLI2019';
        $username='workflow_usr';
        $password='!123456aA';
        $this->mssqlDB = new \PDO("sqlsrv:Server=$hostname,1433;Database=$dbname", $username, $password);
    }

    public function selectDB($tableName, $where = "", $orderby = "", $params=[])
    {
        $orderby = (!empty($orderby))?" order by ".$orderby:"";
        $where = (!empty($where))?" where ".$where:"";
        $query = $this->mssqlDB->prepare("select * from $tableName $where $orderby");
        $query->execute($params);
        return json_encode($query->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function __destruct()
    {
        $this->mssqlDB = null;
    }

}