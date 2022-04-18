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
        return $returnValue;
    }

    public function postNewOffer () {
        //Buraya yeni teklif işlenecek
    }
}