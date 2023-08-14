<?php

class Create extends Controller{
    public function index(){
        $data['judul'] = 'CREATE';
        $data['folder'] = 'create';
        $data['nama_kuis'] = $_POST['nama_kuis'];
        $data['nama_genre'] = strtolower($_POST['nama_genre']);
        $this->view('templates/header',$data);
        $this->view('create/index',$data);
        $this->view('templates/footer',$data);
    }
    public function createQuiz(){
        $db_genre = $this->model('Kuis_model')->getBerdasarkan('genre','nama_genre',$_POST['nama_genre']);
        $id_kuis = $this->model('Kuis_model')->tambahKuis($_POST['nama_kuis'],$db_genre['id_genre']);
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