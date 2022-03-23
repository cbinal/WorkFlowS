<?php
class dashboard extends controller {
    public function index() {
        if (!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL.'/login'); }
        $this->render('site/header');
        $this->render('site/left_side');
        $this->render('site/top_side');
        $this->render('dashboard');
        $this->render('site/footer');
    }
}