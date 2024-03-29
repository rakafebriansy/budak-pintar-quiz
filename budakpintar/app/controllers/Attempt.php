<?php

class Attempt extends Controller
{
    public function index()
    {
        if (!isset($_POST['attempt'])) {
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            $params['kolom'] = 'id_kuis';
            $params['nilai'] = $_POST['attempt'];
            $db_kuis = $this->model('Kuis_model')->getKuisSingle('=', $params);
            $db_genre = $this->model('Genre_model')->getGenreBy('id_genre', $db_kuis['genre_id_genre']);
            $db_detail_kuis = $this->model('Detailkuis_model')->getDetailkuisBy('kuis_id_kuis', $_POST['attempt']);
            $db_kumpulan_soal = $this->model('Kumpulansoal_model')->getKumpulanSoalBy('id_kumpulan_soal', $db_detail_kuis);

            $data['judul'] = 'ATTEMPT';
            $data['folder'] = 'attempt';
            $data['nama_kuis'] = $db_kuis['nama_kuis'];
            $data['nama_genre'] = $db_genre['nama_genre'];
            $data['kumpulan_soal'] = $db_kumpulan_soal;
            $data['id_kuis'] = $db_kuis['id_kuis'];
            $this->view('templates/header', $data);
            $this->view($data['folder'] . '/index', $data);
            $this->view('templates/footer', $data);
        }
    }
    public function evaluation()
    {
        $db_detail_kuis = $this->model('Detailkuis_model')->getDetailkuisBy('kuis_id_kuis', $_POST['id_kuis']);
        $db_kumpulan_soal = $this->model('Kumpulansoal_model')->getKumpulanSoalBy('id_kumpulan_soal', $db_detail_kuis);
        if (isset($_POST['jawaban'])) {
            $total_skor = $this->model('Kuis_model')->penilaianKuis($_POST['jawaban'], $db_kumpulan_soal);
        } else {
            $total_skor = 0;
        }
        try {
            $this->model('Peringkat_model')->tambahSkor($db_detail_kuis[0]['kuis_id_kuis'], $total_skor);
            $_SESSION['total_skor'] = $total_skor;
        } catch (Exception $e) {
            $_SESSION['total_skor'] = 404;
        }
        header('Location: ' . BASEURL . '/home');
        exit;
    }
}
