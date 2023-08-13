<?php

class App{
    protected $controller = 'Landing'; //DEFAULT CONTROLLER
    protected $method = 'index'; //DEFAULT METHOD
    protected $parameters = [];

    public function __construct() {
        $url = $this->parseURL();

        //CONTROLLER
        if (isset($url[0])){
            if (file_exists('../app/controllers/' . $url[0] . '.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //METHOD
        if(isset($url[1])) {
            if (method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //PARAMETERS
        if (!empty($url)){
            $this->parameters = array_values(($url));
        }

        call_user_func_array([$this->controller,$this->method],$this->parameters);
    }

    public function parseURL(){ //MENGAMBIL TEKS DI URL
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}