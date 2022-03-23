<?php
class controller{
    public $sessionManager;
    public $userInfo;

    public function __construct($uriParams=[]){
        $this->sessionManager = new sessionManager();
        $this->userInfo = $this->sessionManager->getUserInfo();
    }

    public function render($file, $params=[]) {
        if ($file !== 'login' && (/* count($params)>0 ||  */isset($params))) {
            if (!$this->sessionManager->isLogged()) {helper::redirect(SITE_URL."/login");die( );}
        }
        if(file_exists(VIEWS_PATH."/".$file.".php")){
            //extract($params);
            require_once VIEWS_PATH."/".$file.".php";
        } else {
            exit($file." Görüntü Dosyası bulunamadı");
        }
    }

    public function model($file) {
        if (file_exists(MODELS_PATH."/".$file.".php")) {
            require_once MODELS_PATH."/".$file.".php";
            if (class_exists($file)) {
                return new $file;
            } else {
                exit("$file is not a class");
            }
        } else {
            exit("$file model file is not found.");
        }
    }

    static function allSessionDelete() {
        session_destroy();
    }

    protected function sendOutput($data, $httpHeaders=array())
    {
        header_remove('Set-Cookie');
 
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
                // echo $httpHeader;
            }
        }
        // header($httpHeaders);
        header("Access-Control-Allow-Origin: *");      
        // header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        echo $data;
        exit;
    }

}