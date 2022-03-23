<?php
class login extends controller {
    public function index()
    {
        $this->render('login');
    }

    public function send() {
        if($_POST) {
            $userName = helper::cleaner($_POST['userName']);
            $uPasswd = helper::cleaner($_POST['uPasswd']);

            if($userName!="" and $uPasswd!="") {
                $control = $this->model('userModel')->control($userName, $uPasswd);
                if($control == 0){
                    helper::flashData("statu","Böyle bir kullanıcı yok");
                    helper::redirect(SITE_URL."/login");
                }else{
                    sessionManager::createSession(['user'=>$userName,'password'=>md5($uPasswd),'shop_id'=>$control[1]]);
                    helper::redirect(SITE_URL."/dashboard");
                }
            }else{
                helper::flashData("statu","Lütfen Tüm Alanları Giriniz");
                helper::redirect(SITE_URL."/login");
            }
        }else{
            exit("Hatalı Giriş");
        }
    }
}