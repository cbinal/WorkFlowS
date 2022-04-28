<?php
class offerModel extends model {
    public function listOffers($position, $page, $page_size) {
        $query = $this->db->prepare("SELECT * FROM `vw_max_rev_offers` limit 0,100");
        // $query = $this->db->prepare("SELECT * FROM `vw_max_pos_transitions` LEFT JOIN offers on offers.id = vw_max_pos_transitions.transaction_id WHERE vw_max_pos_transitions.for_what = 'offer' and vw_max_pos_transitions.transition_type=? limit 0,100");
        $query->execute(array($position));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function offerDetail ($params) {
        $returnValue = [];
        $query = $this->db->prepare('select * from `offers` where id=?');
        $query->execute(array($params[0]));
        $returnValue["heads"] = $query->fetchAll(PDO::FETCH_ASSOC);
        $returnValue["details"] = $this->selectDB("vw_offer_details","offer_id=".$returnValue["heads"][0]["id"]);
        $returnValue["features"] = $this->selectDB("vw_offer_features", "offer_id = ".$returnValue["heads"][0]["id"]);
        // $returnValue["conditions"] = $this->selectDB("vw_")
        return $returnValue;
    }

    private function groupByKey($data=[], $key, $key1){
        $return = array();
      
        foreach($data as $val) {
            $tempKey = $val[$key];
            unset($val[$key]);
            $return[$tempKey][] = $val; 
        }
        $return1 = [];
        foreach($return as $fkey=>$fvalue){
            $tempVal = [];
            foreach($fvalue as $item) {
                unset($item[$key1]);
                $tempVal[] = $item;
            }
            $return1[] = array($key1=>$return[$fkey][0][$key1], $fkey=>$tempVal);
            unset($tempVal);
        }
        // echo json_encode($return1)."<br>";
        return $return1;
    }
/*
    public function conditions4New() {
        $query = $this->selectDB('vw_conditions_with_defaults','');
        $deneme = $this->groupByKey($query, 'feature_group_id',"feature_group_name");
         foreach($deneme as $item){
            foreach($item as $key=>$value){
                if(is_array($value)) {
                    $deneme1 = $this->groupByKey($value, 'condition_id', 'condition_name');
                    unset($deneme[0][$key]);
                    $deneme[0][$key] = $deneme1;
                    unset($deneme1);
                }
            }
        }
        echo "buradan başlar<br>";
        echo json_encode($deneme);
        return $query;
    }
 */

    public function conditions4New() {
        $featureGroups = $this->selectDB('feature_groups', 'is_active=1 and sort>89', 'sort');

        foreach($featureGroups as $key=>$value){
            $conditions = $this->selectDB('conditions', 'feature_group_id='.$value["id"], 'sort');
            foreach($conditions as $key1=>$value1){
                $condition_values = $this->selectDB('condition_values', 'condition_id='.$value1["id"]);
                $conditions[$key1]["data"] = $condition_values;
            }
            $featureGroups[$key]["data"] = $conditions;
        }
        return $featureGroups;
    }

    public function postNewOffer () {
        //Buraya yeni teklif işlenecek
    }
}