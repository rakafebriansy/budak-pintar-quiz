<?php

class Logged extends Controller{
    public function index() {
        $data['judul'] = 'LOGGED';
        $this->view('templates/logged-header',$data);
        $this->view('logged/index',$_POST);
        $this->view('templates/logged-footer');
    }
    public function editProfile(){
        if($this->model('User_model')->ubahInformasiAkun($_POST)>0){
            Flasher::setFlash('Berhasil','diperbarui','primary');
            header('Location: ' . BASEURL . '/logged');
            exit;
        } else {
            Flasher::setFlash('Gagal','diperbarui','danger');
            header('Location: ' . BASEURL . '/logged');
            exit;
        }
    }
    public function deleteAccount(){
        if($this->model('User_model')->hapusAkun($_SESSION['id_pengguna'])>0){
            Flasher::setFlash('Berhasil','dihapus','success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Gagal','dihapus','danger');
            header('Location: ' . BASEURL . '/logged');
            exit;
        }
    }
}


?>