<?php

class Landing extends Controller {
    public function index() {
        // var_dump($_SESSION);die;
        if (isset($_SESSION['login'])) header('Location: ' . BASEURL . '/home');
        $data['judul'] = 'LANDING PAGE';
        $this->view('templates/landing-header',$data);
        $this->view('landing/index',$data);
        $this->view('templates/landing-footer');
    }
    public function register(){
        if($this->model('User_model')->daftarAkun($_POST)>0){
            Flasher::setFlash('Berhasil','terdaftar','primary');
            header('Location: ' . BASEURL . '/landing');
            exit;
        } else {
            Flasher::setFlash('Gagal','terdaftar','danger');
            header('Location: ' . BASEURL . '/landing');
            exit;
        }
    }
    public function login(){
        if($this->model('User_model')->masukAkun($_POST)>0){
            $_SESSION['login'] = true;
            Flasher::setFlash('Berhasil','masuk','primary');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Gagal','masuk','danger');
            header('Location: ' . BASEURL . '/landing');
            exit;
        }
    }
    public function forgotPassword(){
        if($this->model('User_model')->lupaKataSandi($_POST)>0){
            Flasher::setFlash('Akan segera','menerima email','primary');
            header('Location: ' . BASEURL . '/landing');
            exit;
        } else {
            Flasher::setFlash('Tidak akan','menerima email','danger');
            header('Location: ' . BASEURL . '/landing');
            exit;
        }
    }
}

?>