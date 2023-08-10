<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = 'HOME';
        $this->view('templates/home-header',$data);
        $this->view('home/index',$data);
        $this->view('templates/home-footer');
    }
    public function register(){
        if($this->model('User_model')->daftarAkun($_POST)>0){
            Flasher::setFlash('Berhasil','terdaftar','primary');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Gagal','terdaftar','danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
    public function login(){
        if($this->model('User_model')->masukAkun($_POST)>0){
            Flasher::setFlash('Berhasil','masuk','primary');
            header('Location: ' . BASEURL . '/logged');
            exit;
        } else {
            Flasher::setFlash('Gagal','masuk','danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
}

?>