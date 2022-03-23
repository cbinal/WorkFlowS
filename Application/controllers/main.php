<?php
class main extends controller{
    public function index($URIparams=[]){
        if ($this->sessionManager->isLogged()) {
            helper::redirect(SITE_URL."/dashboard");
        } else {
            helper::redirect(SITE_URL."/login");
        }
    }
}