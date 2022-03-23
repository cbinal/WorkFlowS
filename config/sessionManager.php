<?php
class sessionManager extends model{
    static function createSession($array=[]) {
        foreach ($array as $key=>$value) {
            $_SESSION[$key] = helper::cleaner($value);
        }
    }

    static function deleteSession($key) {
        unset($_SESSION[$key]);
    }
    public function allSessionDelete() {
        session_destroy();
    }
    public function isLogged() {
        if(isset($_SESSION["user"]) and isset($_SESSION["password"])) {
            $query = $this->db->prepare('select * from users where user_name = ? and password = ?');
            $query->execute(array($_SESSION["user"], $_SESSION["password"]));
            if ($query->rowCount()!=0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getUserInfo() {
        if ($this->isLogged()) {
            $query = $this->db->prepare("select * from users where user_name= ? and password = ?");
            $query->execute(array($_SESSION["user"], $_SESSION["password"]));
            return $query->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}