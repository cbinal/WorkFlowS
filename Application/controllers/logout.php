<?php
class logout extends controller {
    public function index(){
        $this->sessionManager->allSessionDelete();
        helper::redirect(SITE_URL);

    }
}