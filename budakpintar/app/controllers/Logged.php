<?php

class Logged extends Controller{
    public function index() {
        $data['judul'] = 'LOGGED';
        $this->view('templates/logged-header',$data);
        $this->view('logged/index',$_POST);
        $this->view('templates/logged-footer');
    }
    public function editProfile(){
        if($_POST['nama_pengguna'] == $_SESSION['nama_pengguna'] && $_POST['alamat_email'] == $_SESSION['alamat_email'] && $_FILES['gambar']['error'] == 4){
            header('Location: ' . BASEURL . '/logged');
            exit;
        } else{
            $informasi_gambar = ['nama_gambar'=>$_FILES['gambar']['name'],
            'ukuran_gambar' => $_FILES['gambar']['size'],
            'kode_eror'=> $_FILES['gambar']['error'],
            'temporary'=>$_FILES['gambar']['tmp_name']];

            if($this->model('User_model')->ubahInformasiAkun($_POST,$informasi_gambar)>0){
                Flasher::setFlash('Berhasil','diperbarui','primary');
                header('Location: ' . BASEURL . '/logged');
                exit;
            } else {
                Flasher::setFlash('Gagal','diperbarui','danger');
                header('Location: ' . BASEURL . '/logged');
                exit;
            }
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
    public function changePassword(){
        if($this->model('User_model')->ubahKataSandi($_POST)>0){
            Flasher::setFlash('Berhasil','diubah','primary');
            header('Location: ' . BASEURL . '/logged');
            exit;
        } else {
            Flasher::setFlash('Gagal','diubah','danger');
            header('Location: ' . BASEURL . '/logged');
            exit;
        }
    }
}


?>