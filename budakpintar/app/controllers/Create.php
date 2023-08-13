<?php

class Create extends Controller{
    public function index(){
        $data['judul'] = 'CREATE';
        $data['folder'] = 'create';
        $data['nama_kuis'] = $_POST['nama_kuis'];
        $data['genre'] = strtolower($_POST['genre']);
        $this->view('templates/header',$data);
        $this->view('create/index',$data);
        $this->view('templates/footer',$data);
    }
    public function createQuiz(){
        $id_kuis = $this->model('Kuis_model')->tambahKuis($_POST['nama_kuis'],$_POST['genre']);
        $id_kumpulan_soal = $this->model('Kuis_model')->tambahSoal($_POST['soal']);
    }
}

?>