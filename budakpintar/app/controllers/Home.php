<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = 'HOME';
        $this->view('templates/home-header',$data);
        $this->view('home/index',$data);
        $this->view('templates/home-footer');
    }
}

?>