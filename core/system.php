<?php
class system {
    protected $controller;
    protected $method;
    protected $getParams;
    public function __construct() {
        $this->controller = "main";
        $this->method = "index";
        $this->getParams = $_GET;
        if(isset($_GET["pageAct"])) {
            $url = explode("/",filter_var(rtrim($_GET["pageAct"],"/"),FILTER_SANITIZE_URL));
            array_shift($this->getParams);
        } else {
            $url[0]=$this->controller;
            $url[1]=$this->method;
        }
        if (file_exists(CONTROLLERS_PATH."/".$url[0].".php")) {
            $this->controller = $url[0];
        } else {
            $url[0]="controller404";
            $this->controller = $url[0];
        }
        require_once CONTROLLERS_PATH."/".$this->controller.".php";
        if (class_exists($this->controller)) {
            $this->controller = new $this->controller;
            array_shift($url);
        } else {
            exit("$this->controller not found.");
        }
        if (!isset($url[0])) {
            $url[0] = "index";
        }
        if (method_exists($this->controller, $url[0])) {
            $this->method = $url[0];
            array_shift($url);
        }else{
            exit("Method called ".$url[0]." was not found");
        }
        $tobeSent = [];
        $tobeSent = $url;
        $tobeSent[] = $this->getParams;
        call_user_func_array([$this->controller,$this->method], array($tobeSent));
    }
}