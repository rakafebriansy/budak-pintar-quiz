<?php

class Attempt extends Controller{
    public function index(){
        if(!isset($_POST['attempt'])){
            header('Location: ' . BASEURL . '/home');
            exit;
        } else{
            $db_kuis = $this->model('Kuis_model')->getKuisBy('id_kuis',$_POST['attempt']);
            $db_genre = $this->model('Genre_model')->getGenreBy('id_genre',$db_kuis['genre_id_genre']);
            $db_detail_kuis = $this->model('Detailkuis_model')->getDetailkuisBy('kuis_id_kuis',$_POST['attempt']);
            $db_kumpulan_soal = $this->model('Kumpulansoal_model')->getKumpulanSoalBy('id_kumpulan_soal',$db_detail_kuis);
    
            $data['judul'] = 'ATTEMPT';
            $data['folder'] = 'attempt';
            $data['nama_kuis'] = $db_kuis['nama_kuis'];
            $data['nama_genre'] = $db_genre['nama_genre'];
            $data['kumpulan_soal'] = $db_kumpulan_soal;
            $this->view('templates/header',$data);
            $this->view($data['folder'] . '/index',$data);
            $this->view('templates/footer',$data);
        }
    }
}

?>