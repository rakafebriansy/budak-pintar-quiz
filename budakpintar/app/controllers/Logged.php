<?php

class Logged extends Controller{
    public function index() {
        $data['judul'] = 'LOGGED';
        $this->view('templates/logged-header',$data);
        $this->view('logged/index',$_POST);
        $this->view('templates/logged-footer');
    }
}

?>