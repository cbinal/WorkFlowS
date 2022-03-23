<?php
class userModel extends model {
    public function control($userName, $uPasswd) {
        $pass = md5($uPasswd);
        $query = $this->db->prepare("select * from users where user_name = ? and password = ?");
        $query->execute(array($userName, $pass));
        return $query->rowCount();
    }

}