<?php
class offerModel extends model {
    public function listOffers($position, $page, $page_size) {
        $query = $this->db->prepare("SELECT * FROM `vw_max_pos_transitions` LEFT JOIN offers on offers.id = vw_max_pos_transitions.transaction_id WHERE vw_max_pos_transitions.for_what = 'offer' and vw_max_pos_transitions.transition_type=? limit 0,100");
        $query->execute(array($position));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function offerDetail ($params) {
        $returnValue = [];
        $query = $this->db->prepare('select * from `offers` where id=?');
        $query->execute(array($params[0]));
        $returnValue["general_information"] = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $this->db->prepare("select * from `vw_offer_to_others` where offer_id = ?");
        $query->execute(array($returnValue["general_information"][0]["id"]));
        $returnValue["technical_details"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $returnValue;
    }

    public function postNewOffer () {
        //Buraya yeni teklif işlenecek
    }
}