<?php

class Home extends Controller{
    public function index() {
        if (!isset($_SESSION['login'])) header('Location: ' . BASEURL . '/landing');
        $data['judul'] = 'HOME';
        $this->view('templates/home-header',$data);
        $this->view('home/index',$_POST);
        $this->view('templates/home-footer');
    }
    public function editProfile(){
        if(strtolower($_POST['nama_pengguna']) == $_SESSION['nama_pengguna'] && $_POST['alamat_email'] == $_SESSION['alamat_email'] && $_FILES['gambar']['error'] == 4){
            header('Location: ' . BASEURL . '/home');
            exit;
        } else{
            $informasi_gambar = ['nama_gambar'=>$_FILES['gambar']['name'],
            'ukuran_gambar' => $_FILES['gambar']['size'],
            'kode_eror'=> $_FILES['gambar']['error'],
            'temporary'=>$_FILES['gambar']['tmp_name']];

            if($this->model('User_model')->ubahInformasiAkun($_POST,$informasi_gambar)>0){
                Flasher::setFlash('Akun anda','Berhasil','diperbarui','success');
                header('Location: ' . BASEURL . '/home');
                exit;
            } else {
                Flasher::setFlash('Akun anda','Gagal','diperbarui','danger');
                header('Location: ' . BASEURL . '/home');
                exit;
            }
        }
    }
    public function deleteAccount(){
        if($this->model('User_model')->hapusAkun($_SESSION['id_pengguna'])>0){
            Flasher::setFlash('Akun anda','Berhasil','dihapus','success');
            session_unset();
            header('Location: ' . BASEURL . '/landing');
            exit;
        } else {
            Flasher::setFlash('Akun anda','Gagal','dihapus','danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
    public function changePassword(){
        if($this->model('User_model')->ubahKataSandi($_POST)>0){
            Flasher::setFlash('Kata sandi anda','Berhasil','diperbarui','success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Kata sandi anda','Gagal','diperbarui','danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
    public function logout(){
        if(session_unset()){
            Flasher::setFlash('Anda','Berhasil','keluar','primary');
            header('Location: ' . BASEURL . '/landing');
            exit;
        } else {
            Flasher::setFlash('Anda','Gagal','keluar','danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
}


?>