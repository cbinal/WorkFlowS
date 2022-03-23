<?php
class worklist extends controller {
    public function index() {
        if (!$this->sessionManager->isLogged()) die();
        view::render('site/header');
        view::render('site/left_side');
        view::render('site/top_side');
        view::render('site/empty_body');
        view::render('site/footer');
    }
}