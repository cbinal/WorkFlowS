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

    private function smashData($data=[]) {
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
        $offerDetails = $data["details"];
        unset($data["details"]);
        unset($data["heads"]["0"]);
        $returnValue = [];
        $rev_no = $this->versionController('offers', $data["heads"]['reference_no']);
        $data["heads"]["revision_no"] = $rev_no;
        $smashedData = $this->smashData($data["heads"]);
        // return json_encode($smashedData);

        try {
            $sql = "INSERT INTO offers (".$smashedData["fields_str"].") VALUES (".$smashedData["params_str"].")";
            $stmt= $this->db->prepare($sql);
            // return json_encode($data["heads"]);
            $returnValue[0]["status"] = boolval($stmt->execute($data["heads"]));
            $returnValue[0]["id"] = $this->db->lastInsertId();
            if (boolval($rev_no)) {
                $returnValue[0]["message"] = "Teklif revizyon kaydı başarıyla tamamlandı.";
            } else {
                $returnValue[0]["message"] = "Teklif üst bilgileri başarıyla kaydedildi.";
            }
            // return $returnValue;
        } catch (Exception $e) {
            $returnValue[0]["status"] = False; 
            $returnValue[0]["message"]=$e;
            // return $returnValue;
        }

        if ($returnValue[0]["status"]) {
            // return $offerDetails;
            $valuesArr = [];
            $arrangedValues = [];
            $mID = 0; 
            $arrInd = -1;
            foreach ($offerDetails as $key=>$value) {
                $moduleArr = explode("-",$key);
                if ($mID != $moduleArr[1]) {
                    $arrInd++;
                    $mID = $moduleArr[1];
                    $arrangedValues[$arrInd]["module_id"] = $moduleArr[1];
                    $arrangedValues[$arrInd]["offer_id"] = $returnValue[0]["id"];
                }
                $arrangedValues[$arrInd][$moduleArr[0]] = $value;
                // $this->db->prepare(sql);
            }
            $arrInd = 1;
            foreach ($arrangedValues as $item) {
                $smashedData = $this->smashData($item);
                $sql = "INSERT INTO offer_details (".$smashedData["fields_str"].") VALUES (".$smashedData["params_str"].")";
                $stmt= $this->db->prepare($sql);
                // return json_encode($item);
                $returnValue[$arrInd]["status"] = $stmt->execute($item);
                $returnValue[$arrInd]["id"] = $this->db->lastInsertId();
                $returnValue[$arrInd]["message"] = ($returnValue[$arrInd]["status"] ? 'Kayıt Başarılı' : 'Kayıt Hatası');
                $arrInd++;
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