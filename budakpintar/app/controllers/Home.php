<?php

class Home extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['login'])) header('Location: ' . BASEURL . '/landing');
        $params['kolom'] = 'id_kuis';
        $params['nilai'] = '';
        $jumlah_data_perhalaman = 6;
        $banyak_kuis = $this->model('Kuis_model')->getBanyakKuis($params);
        $data['judul'] = 'HOME';
        $data['folder'] = 'home';
        $data['genre'] = $this->model('Genre_model')->getGenreAll();
        $data['kuis'] = $this->model('Kuis_model')->getKuisSet($params, 'ASC');
        $data['banyak_pagination'] = ceil($banyak_kuis / $jumlah_data_perhalaman);
        if (isset($_SESSION['total_skor'])) {
            $data['total_skor'] = $_SESSION['total_skor'];
            unset($_SESSION['total_skor']);
        }
        $this->view('templates/header', $data);
        $this->view($data['folder'] . '/index', $data);
        $this->view('templates/footer', $data);
    }
    public function editProfile()
    {
        if (strtolower($_POST['nama_pengguna']) == $_SESSION['nama_pengguna'] && $_POST['alamat_email'] == $_SESSION['alamat_email'] && $_FILES['gambar_profil']['error'] == 4) {
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            $informasi_gambar = $_FILES['gambar_profil'];
            $error_code  = $this->model('Pengguna_model')->ubahInformasiAkun($_POST, $informasi_gambar);
            if ($error_code > 0) {
                Flasher::setFlash('Akun anda', 'Berhasil', 'diperbarui', 'success');
                header('Location: ' . BASEURL . '/home');
                exit;
            } else if ($error_code < 0) {
                Flasher::setFlash('Nama', strtolower($_POST['nama_pengguna']), 'telah tersedia', 'danger');
                header('Location: ' . BASEURL . '/home');
                exit;
            } else {
                Flasher::setFlash('Akun anda', 'Gagal', 'diperbarui', 'danger');
                header('Location: ' . BASEURL . '/home');
                exit;
            }
        }
    }
    public function deleteAccount()
    {
        if ($this->model('Pengguna_model')->hapusAkun($_SESSION['id_pengguna']) > 0) {
            Flasher::setFlash('Akun anda', 'Berhasil', 'dihapus', 'success');
            session_unset();
            header('Location: ' . BASEURL . '/landing');
            exit;
        } else {
            Flasher::setFlash('Akun anda', 'Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
    public function changePassword()
    {
        $error_code = $this->model('Pengguna_model')->ubahKataSandi($_POST);
        if ($error_code > 0) {
            Flasher::setFlash('Kata sandi anda', 'Berhasil', 'diperbarui', 'success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else if ($error_code < 0) {
            Flasher::setFlash('Silahkan isi kembali dengan kata sandi yang', 'Baru', '', 'warning');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Kata sandi', 'Salah', '', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
    public function logout()
    {
        if (session_unset()) {
            Flasher::setFlash('Anda', 'Berhasil', 'keluar', 'primary');
            header('Location: ' . BASEURL . '/landing');
            exit;
        } else {
            Flasher::setFlash('Anda', 'Gagal', 'keluar', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
    public function searching()
    {
        $params['kolom'] = 'nama_kuis';
        $params['nilai'] = $_POST['kata_kunci'];
        $jumlah_data_perhalaman = 6;
        $banyak_kuis = $this->model('Kuis_model')->getBanyakKuis($params);
        $banyak_pagination = ceil($banyak_kuis / $jumlah_data_perhalaman);
        if (isset($_POST['halaman_aktif'])) {
            $halaman_aktif = $_POST['halaman_aktif'];
        } else {
            $halaman_aktif = 1;
        }
        $data_awal = ($halaman_aktif * $jumlah_data_perhalaman) -  $jumlah_data_perhalaman;
        if (isset($_POST['urut_berdasar'])) {
            $urut_berdasarkan = $_POST['urut_berdasar'];
        } else {
            $urut_berdasarkan = 'ASC';
        }
        $db_kuis = $this->model('Kuis_model')->getKuisSet($params, $urut_berdasarkan, $data_awal);
        $db_genre = $this->model('Genre_model')->getGenreAll();
        if (sizeof($db_kuis) > 0) {
            if (!isset($_SESSION['login'])) {
                echo    '<nav aria-label="Page navigation example">
                        <input type="hidden" value="' . $halaman_aktif . '" id="halaman-sekarang">
                        <ul class="pagination">';
                if ($halaman_aktif > 1) {
                    echo    '<li class="page-item">
                        <a id="halaman-prev" class="page-link" role="button" type="button" aria-label="Previous">
                            &laquo;
                        </a>
                    </li>
                    ';
                }
                for ($i = 1; $i <= $banyak_pagination; $i++) {
                    if ($i == $halaman_aktif) {
                        echo '<li class="page-item"><a class="page-link halaman-ke bg-primary text-white" role="button" type="button">' . $i . '</a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link halaman-ke" role="button" type="button">' . $i . '</a></li>';
                    }
                }
                if ($halaman_aktif < $banyak_pagination) {
                    echo    '<li class="page-item">
                        <a id="halaman-next" class="page-link" role="button" type="button" aria-label="Next">
                        &raquo;
                        </a>
                    </li>';
                }
                echo    '</ul>
                </nav>';
                foreach ($db_kuis as $kuis) {
                    $id_genre = $kuis['genre_id_genre'];
                    foreach ($db_genre as $genre) {
                        if ($genre['id_genre'] == $id_genre) {
                            $nama_genre = $genre['nama_genre'];
                            echo '<div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                    ' . ucfirst($nama_genre) . '
                                    </div>
                                    <div class="card-body" style="min-height:136px !important;">
                                        <input type="hidden" name="attempt" value="' . $kuis['id_kuis'] . '">
                                        <h5 class="card-title">' . ucfirst($kuis['nama_kuis']) . '</h5>
                                        <p class="card-text">' . ucfirst($kuis['deksripsi_kuis']) . '</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary tombol-mulai" data-bs-toggle="modal" data-bs-target="#formModal1">Mulai</button>
                                        <button type="button" class="btn btn-outline-warning tombol-mulai px-2" data-bs-toggle="modal" data-bs-target="#formModal1">🏆</button>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                }
            } else {
                echo    '<nav aria-label="Page navigation example">
                        <input type="hidden" value="' . $halaman_aktif . '" id="halaman-sekarang">
                        <ul class="pagination">';
                if ($halaman_aktif > 1) {
                    echo    '<li class="page-item">
                                <a id="halaman-prev" class="page-link" role="button" type="button" aria-label="Previous">
                                    &laquo;
                                </a>
                            </li>
                            ';
                }
                for ($i = 1; $i <= $banyak_pagination; $i++) {
                    if ($i == $halaman_aktif) {
                        echo '<li class="page-item"><a class="page-link halaman-ke bg-primary text-white" role="button" type="button">' . $i . '</a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link halaman-ke" role="button" type="button">' . $i . '</a></li>';
                    }
                }
                if ($halaman_aktif < $banyak_pagination) {
                    echo    '<li class="page-item">
                                <a id="halaman-next" class="page-link" role="button" type="button" aria-label="Next">
                                &raquo;
                                </a>
                            </li>';
                }
                echo    '</ul>
                        </nav>';
                foreach ($db_kuis as $kuis) {
                    $id_genre = $kuis['genre_id_genre'];
                    foreach ($db_genre as $genre) {
                        if ($genre['id_genre'] == $id_genre) {
                            $nama_genre = $genre['nama_genre'];
                            echo '<div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                    ' . ucfirst($nama_genre) . '
                                    </div>
                                    <form action="' . BASEURL . '/attempt" method="post">', '</form>
                                        <div class="card-body" style="min-height:136px !important;">
                                            <input type="hidden" name="attempt" value="' . $kuis['id_kuis'] . '">
                                            <h5 class="card-title">' . ucfirst($kuis['nama_kuis']) . '</h5>
                                            <p class="card-text">' . ucfirst($kuis['deksripsi_kuis']) . '</p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <button value="' . $kuis['id_kuis'] . '" id="tombol-mulai" type="button" class="btn btn-primary" data-bs-target="#formModal2" data-bs-toggle="modal" data-bs-dismiss="modal">Mulai</button>
                                            <button value="' . $kuis['id_kuis'] . '" type="button" class="tombol-peringkat btn btn-outline-warning px-2" data-bs-toggle="modal" data-bs-target="#formModal4">🏆</button>
                                        </div>
                                    </form>
                                </div>
                            </div>';
                        }
                    }
                }
            }
        } else {
            echo '
            <div class="text-center pt-3">
                <h5 class="card-title text-danger">Kuis Tidak Ditemukan.</h5>
            </div>
            ';
        }
    }
    public function showLeaderboard()
    {
        $db_skor = $this->model('Peringkat_model')->getSkor($_POST['id_kuis']);
        $banyak_skor = sizeof($db_skor);
        $db_pengguna = $this->model('Pengguna_model')->getPenggunaAll();
        echo '
        <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Pengguna</th>
            <th scope="col">Skor</th>
          </tr>
        </thead>
        <tbody>';
        for ($i = 0; $i < $banyak_skor; $i++) {
            foreach ($db_pengguna as $pengguna) {
                if ($pengguna['id_pengguna'] == $db_skor[$i]['pengguna_id_pengguna']) {
                    $nama_pengguna = $pengguna['nama_pengguna'];
                }
            }
            echo  ' <tr>
                    <th scope="row">' . $i + 1 . '</th>
                    <td>' . ucfirst($nama_pengguna) . '</td>
                    <td>' . $db_skor[$i]['total_skor'] . '</td>
                </tr>';
        }
        echo '</tbody>
            </table>
        ';
    }
}
