<?php
class productModel extends model {
    public function getAllProducts() {
        $query = $this->db->prepare("select * from products");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}