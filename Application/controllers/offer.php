<?php
class offer extends controller {
    public function index() {
        $this->list();
    }

    public function list() {
        if (!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL.'/login');}
        $responseData = $this->model('offerModel')->listOffers(1,1,20);
        $this->render('site/header_with_dt');
        $this->render('site/left_side');
        $this->render('site/top_side');
        $this->render('offerList', $responseData);
        $this->render('site/footer_with_dt');
    //    print_r($this->model('productModel')->getAllProducts());
        /* $this->sendOutput(
            json_encode($responseData),
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        ); */
        // echo json_encode($params);
    }

    public function new() {
        if (!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL.'/login');}
        $responseData["conditions"] = $this->model('offerModel')->conditions4New();
        // echo json_encode($responseData);
        $this->render('site/header_with_dt');
        $this->render('site/left_side');
        $this->render('site/top_side');
        $this->render('offerNew', $responseData);
        $this->render('site/footer');
    }

    public function detail($params) {
        if (!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL.'/login');}
        $responseData = $this->model('offerModel')->offerDetail($params);
        $this->render('site/header_with_dt');
        $this->render('site/left_side');
        $this->render('site/top_side');
        $this->render('offerDetail', $responseData);
        $this->render('site/footer_with_dt');
    }

    public function print($params) {
        if (!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL.'/login');}
        $responseData = $this->model('offerModel')->offerDetail($params);
        $this->render('offerPrint', $responseData);
    }
}

