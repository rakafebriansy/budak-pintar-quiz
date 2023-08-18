<?php

class Home extends Controller{
    public function index() {
        if (!isset($_SESSION['login'])) header('Location: ' . BASEURL . '/landing');
        $data['judul'] = 'HOME';
        $data['folder'] = 'home';
        $data['genre'] = $this->model('Genre_model')->getGenreAll();
        $data['kuis'] = $this->model('Kuis_model')->getKuisOrder();
        $this->view('templates/header',$data);
        $this->view($data['folder'] . '/index',$data);
        $this->view('templates/footer',$data);
    }
    public function editProfile(){
        if(strtolower($_POST['nama_pengguna']) == $_SESSION['nama_pengguna'] && $_POST['alamat_email'] == $_SESSION['alamat_email'] && $_FILES['gambar_profil']['error'] == 4){
            header('Location: ' . BASEURL . '/home');
            exit;
        } else{
            $informasi_gambar = $_FILES['gambar_profil'];
            $error_code  = $this->model('Pengguna_model')->ubahInformasiAkun($_POST,$informasi_gambar);
            if($error_code>0){
                Flasher::setFlash('Akun anda','Berhasil','diperbarui','success');
                header('Location: ' . BASEURL . '/home');
                exit;
            } else if ($error_code<0){
                Flasher::setFlash('Nama',strtolower($_POST['nama_pengguna']),'telah tersedia','danger');
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
        if($this->model('Pengguna_model')->hapusAkun($_SESSION['id_pengguna'])>0){
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
        $error_code = $this->model('Pengguna_model')->ubahKataSandi($_POST);
        if($error_code>0){
            Flasher::setFlash('Kata sandi anda','Berhasil','diperbarui','success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else if ($error_code<0) {
            Flasher::setFlash('Silahkan isi kembali dengan kata sandi yang','Baru','','warning');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Kata sandi','Salah','','danger');
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
    public function searching(){
        $db_kuis = $this->model('Kuis_model')->getKuisLike('nama_kuis',$_POST['kata_kunci']);
        $db_genre = $this->model('Genre_model')->getGenreAll();
        if(sizeof($db_kuis)>0){
            if (!isset($_SESSION['login'])){
                foreach($db_kuis as $kuis){
                    $id_genre = $kuis['genre_id_genre'];
                    foreach($db_genre as $genre){
                        if($genre['id_genre'] == $id_genre){
                        $nama_genre = $genre['nama_genre'];
                        echo '<div class="col-md-4 pt-3">
                                <div class="card">
                                    <div class="card-header">
                                    ' . ucfirst($nama_genre) . '
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="attempt" value="' . $kuis['id_kuis'] . '">
                                        <h5 class="card-title">' . ucfirst($kuis['nama_kuis']) .'</h5>
                                        <p class="card-text">' . ucfirst($kuis['deksripsi_kuis']) . '</p>
                                        <button type="button" class="btn btn-primary tombol-mulai" data-bs-toggle="modal" data-bs-target="#formModal1">Mulai</button>
                                    </div>
                                </div>
                            </div>';
                            
                        }
                    }
                }
            } else {
                foreach($db_kuis as $kuis){
                    $id_genre = $kuis['genre_id_genre'];
                    foreach($db_genre as $genre){
                        if($genre['id_genre'] == $id_genre){
                        $nama_genre = $genre['nama_genre'];
                        echo '<div class="col-md-4 pt-3">
                                <div class="card">
                                    <div class="card-header">
                                    ' . ucfirst($nama_genre) . '
                                    </div>
                                    <div class="card-body">
                                        <form action="' . BASEURL . '/attempt" method="post">','</form>
                                                <input type="hidden" name="attempt" value="' . $kuis['id_kuis'] . '">
                                                <h5 class="card-title">' . ucfirst($kuis['nama_kuis']) .'</h5>
                                                <p class="card-text">' .ucfirst($kuis['deksripsi_kuis']) . '</p>
                                                <button value="' . $kuis['id_kuis'] . '" id="tombol-mulai" type="button" class="btn btn-primary" data-bs-target="#formModal2" data-bs-toggle="modal" data-bs-dismiss="modal">Mulai</button>
                                        </form>
                                    </div>
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
    public function orderBy(){
        $db_kuis = $this->model('Kuis_model')->getKuisOrder($_POST['kata_kunci']);
        $db_genre = $this->model('Genre_model')->getGenreAll();
        if(sizeof($db_kuis)>0){
            if (!isset($_SESSION['login'])){
                foreach($db_kuis as $kuis){
                    $id_genre = $kuis['genre_id_genre'];
                    foreach($db_genre as $genre){
                        if($genre['id_genre'] == $id_genre){
                        $nama_genre = $genre['nama_genre'];
                        echo '<div class="col-md-4 pt-3">
                                <div class="card">
                                    <div class="card-header">
                                    ' . ucfirst($nama_genre) . '
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="attempt" value="' . $kuis['id_kuis'] . '">
                                        <h5 class="card-title">' . ucfirst($kuis['nama_kuis']) .'</h5>
                                        <p class="card-text">' . ucfirst($kuis['deksripsi_kuis']) . '</p>
                                        <button type="button" class="btn btn-primary tombol-mulai" data-bs-toggle="modal" data-bs-target="#formModal1">Mulai</button>
                                    </div>
                                </div>
                            </div>';
                            
                        }
                    }
                }
            } else {
                foreach($db_kuis as $kuis){
                    $id_genre = $kuis['genre_id_genre'];
                    foreach($db_genre as $genre){
                        if($genre['id_genre'] == $id_genre){
                        $nama_genre = $genre['nama_genre'];
                        echo '<div class="col-md-4 pt-3">
                                <div class="card">
                                    <div class="card-header">
                                    ' . ucfirst($nama_genre) . '
                                    </div>
                                    <div class="card-body">
                                        <form action="' . BASEURL . '/attempt" method="post">','</form>
                                                <input type="hidden" name="attempt" value="' . $kuis['id_kuis'] . '">
                                                <h5 class="card-title">' . ucfirst($kuis['nama_kuis']) .'</h5>
                                                <p class="card-text">' . ucfirst($kuis['deksripsi_kuis']) . '</p>
                                                <button value="' . $kuis['id_kuis'] . '" id="tombol-mulai" type="button" class="btn btn-primary" data-bs-target="#formModal2" data-bs-toggle="modal" data-bs-dismiss="modal">Mulai</button>
                                        </form>
                                    </div>
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
}
