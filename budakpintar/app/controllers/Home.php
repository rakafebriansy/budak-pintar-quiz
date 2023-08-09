<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = 'HOME';
        $this->view('templates/home-header',$data);
        $this->view('home/index',$data);
        $this->view('templates/home-footer');
    }
    public function daftar(){
        if($this->model('User_model')->daftarAkun($_POST)>0){
            Flasher::setFlash('Berhasil','terdaftar','success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Gagal','terdaftar','danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
    public function masuk(){
        if($this->model('User_model')->masukAkun($_POST)>0){
            Flasher::setFlash('Berhasil','masuk','success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Gagal','masuk','danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
}

?>