<?php

class Create extends Controller{
    public function index(){
        if (!isset($_POST['buat']))header('Location: ' . BASEURL . '/home');
        $data['judul'] = 'CREATE';
        $data['folder'] = 'create';
        $data['nama_kuis'] = $_POST['nama_kuis'];
        $data['nama_genre'] = strtolower($_POST['nama_genre']);
        $data['deskripsi_kuis'] = $_POST['deskripsi_kuis'];
        $this->view('templates/header',$data);
        $this->view($data['folder'] . '/index',$data);
        $this->view('templates/footer',$data);
    }
    public function createQuiz(){
        if(!isset($_POST['soal'])) {
            Flasher::setFlash('Kuis','Tidak dapat dibuat','(tidak memuat soal)','danger');
            header('Location: ' . BASEURL . '/create');
            exit;
        }
        $db_genre = $this->model('Genre_model')->getGenreBy('nama_genre',$_POST['nama_genre']);
        $id_kuis = $this->model('Kuis_model')->tambahKuis($_POST['nama_kuis'],$_POST['deskripsi_kuis'],$db_genre['id_genre']);
        $ids_kumpulan_soal = $this->model('Kumpulansoal_model')->tambahSoal($_POST['soal']);
        if ($this->model('Detailkuis_model')->tambahDetailKuis($id_kuis,$ids_kumpulan_soal)>0){
            Flasher::setFlash('Kuis anda telah','Berhasil','dibuat','primary');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Kuis anda telah','Gagal','dibuat','danger');
            header('Location: ' . BASEURL . '/home');
            exit;

        }
    }
}

?>