<?php

class Landing extends Controller {
    public function index() {
        if (isset($_SESSION['login'])) header('Location: ' . BASEURL . '/home');
        $data['judul'] = 'LANDING PAGE';
        $data['folder'] = 'landing';
        $data['genre'] = $this->model('Genre_model')->getGenreAll();
        $data['kuis'] = $this->model('Kuis_model')->getKuisAll(false);
        $this->view('templates/header',$data);
        $this->view($data['folder'] . '/index',$data);
        $this->view('templates/footer',$data);
    }
    public function register(){
        $error_code = $this->model('Pengguna_model')->daftarAkun($_POST);
        if($error_code>0){
            Flasher::setFlash('Anda','Berhasil','membuat akun','primary');
            header('Location: ' . BASEURL . '/landing');
            exit;
        } else if ($error_code<0){
            Flasher::setFlash('Nama',strtolower($_POST['nama_pengguna']),'telah digunakan','danger');
            header('Location: ' . BASEURL . '/landing');
            exit;
        } else {
            Flasher::setFlash('Anda','Gagal','membuat akun','danger');
            header('Location: ' . BASEURL . '/landing');
            exit;
        }
    }
    public function login(){
        $error_code = $this->model('Pengguna_model')->masukAkun($_POST);
        if($error_code>0){
            $_SESSION['login'] = true;
            Flasher::setFlash('Anda','Berhasil','masuk','primary');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else if ($error_code<0) {
            Flasher::setFlash('Akun dengan nama',strtolower($_POST['nama_pengguna']),'tidak ditemukan','danger');
            header('Location: ' . BASEURL . '/landing');
            exit;
        } else {
            Flasher::setFlash('Kata sandi','Salah','','danger');
            header('Location: ' . BASEURL . '/landing');
            exit;
        }
    }
    public function forgotPassword(){
        if($this->model('Pengguna_model')->lupaKataSandi($_POST)>0){
            Flasher::setFlash('Anda','Akan segera.','menerima email','primary');
            // header('Location: ' . BASEURL . '/landing');
            echo '<script> window.location.href="http://localhost/budakpintar/public/";</script>';
            exit;
        } else {
            Flasher::setFlash('Akun anda','Belum','terdaftar','danger');
            // header('Location: ' . BASEURL . '/landing');
            echo '<script> window.location.href="http://localhost/budakpintar/public/";</script>';
            exit;
        }
    }
}

?>