<?php

class App{
    protected $controller = 'Home'; //DEFAULT CONTROLLER
    protected $method = 'index'; //DEFAULT METHOD
    protected $parameters = [];

    public function __construct() {
        $url = $this->parseURL();

        // var_dump(($url));
        //CONTROLLER
        if (isset($url[0])){
            if (file_exists('../app/controllers/' . $url[0] . '.php')){ //Mengecek ada tidaknya sebuah file
                $this->controller = $url[0]; //Mengubah controller
                unset($url[0]); //Menghapus nilai dari array
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php'; //Memanggil controller
        $this->controller = new $this->controller; //Mengubah nama controller menjadi instance

        //METHOD
        if(isset($url[1])) {
            if (method_exists($this->controller,$url[1])){ //Mengecek ada tidaknya sebuah method
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //PARAMETERS
        if (!empty($url)){ //Mengecek sebuah array kosong atau tidak
            $this->parameters = array_values(($url)); //Mengambil semua value dari sebuah array
        }

        call_user_func_array([$this->controller,$this->method],$this->parameters); //Menjalankan controller & method serta mengirim parameter jika ada
    }

    public function parseURL(){ //MENGAMBIL TEKS DI URL
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/'); //Menghapus karakter di akhir string
            $url = filter_var($url,FILTER_SANITIZE_URL); //Membersihkan url dari karakter berbahaya
            $url = explode('/',$url); //Memecah string menjadi array
            return $url;
        }
    }
}