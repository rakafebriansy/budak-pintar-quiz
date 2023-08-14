<?php

$nama_pengguna = $_SESSION['nama_pengguna'];
$alamat_email = $_SESSION['alamat_email'];
$id_pengguna = $_SESSION['id_pengguna'];
$gambar = '';
$tampilan_gambar = 'user.png';
if (isset($_SESSION['gambar'])){
  $gambar = $_SESSION['gambar'];
}
if ($gambar != ''){
  $tampilan_gambar = $gambar;
}


?>

<div class="container">
  <!-- NAVBAR START -->
  <nav class="navbar navbar-light fixed-top bg-white">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?=BASEURL;?>/img/logo.png" alt="" height="40" class="d-inline-block align-text-center">
        <img src="<?=BASEURL;?>/img/name_brand.svg" alt="" height="20" class="d-inline-block align-text-center">
      </a>
    <!-- PROFILE -->
    <div class="dropdown justify-content-start align-items-center text-center">
      <label for="tombol-profil">      
        <img src="<?=BASEURL;?>/img/<?=$tampilan_gambar?>" width="40" alt="">
      </label>
      <a id="dropdownMenuButton1" name="dropdownMenuButton1" class="btn ms-1 fs-5 dropdown-toggle"
      data-bs-toggle="dropdown" aria-expanded="false"><?=ucfirst($nama_pengguna);?></a>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" id="tombol-profil" name="tombol-profil" data-bs-toggle="modal" data-bs-target="#formModal1">Ubah Profil</a></li>
        <li><a class="dropdown-item" id="tombol-ubah-sandi" name="tombol-ubah-sandi" data-bs-toggle="modal" data-bs-target="#formModal2">Ubah Sandi</a></li>
        <li><a class="dropdown-item" id="tombol-keluar" name="tombol-keluar" data-bs-toggle="modal" data-bs-target="#formModal2">Keluar</a></li>
      </ul>
    </div>
  </nav>
  <!-- NAVBAR END -->
  


  <!-- HERO START -->
  <section id="hero" class="mb-5">
        <div id="flasher">
        <?php Flasher::flash(); ?>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h2 class="fs-1 text-start  mb-5 pt-md-5">Kerjakan kuis, kapan dan di mana saja!
        </h2>
        <p class="fs-4 text-start mb-5">Pilih kuis sesuai keinginan kamu, agar menambah pengetahuan dan mengasah
          kemampuan.
        </p>
        <div class="row mb-2">
          <div class="col-8 col-md-7">
            <a href="#category-linked" class="btn btn-primary btn-lg w-75">Jelajahi Kuis</a>
          </div>
        </div>
        <div class="row">
          <div class="col-8 col-md-7">
            <button id="tombol-buat-kuis" type="button" class="btn btn-outline-primary btn-lg w-75" data-bs-toggle="modal" data-bs-target="#formModal3">Buat Kuis</button>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <img src="<?=BASEURL;?>/img/hero.png" alt="" class="img-fluid">
      </div>
    </div>
  </section>
  <!-- HERO END -->

  <br><div id="category-linked"></div><br><br>

  <!-- SEARCH START -->
  <section id="search" class="mt-5 mb-5">
    <h2 class="">Temukan kuis yang kamu suka!</h2>
    <form class="d-flex mt-4">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </section>
  <!-- SEARCH END -->

  <br><br>

  <!-- CATEGORY START -->
  <section id="category">
    <div class="mathematics">
      <h3 class="fs-4">Matematika</h3>
      <div class="row ">
        <div class="col-md-4 pt-3">
          <div class="card">
            <img src="<?=BASEURL;?>/img/probabilitas.jpeg" class="card-img-top" height="200" alt="...">
            <div class="card-body">
              <h5 class="card-title">Judul Kuis</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, necessitatibus.</p>
              <a href="#" class="btn btn-primary">Mulai</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pt-3">
          <div class="card">
            <img src="<?=BASEURL;?>/img/statistika.jpeg" class="card-img-top" height="200" alt="...">
            <div class="card-body">
              <h5 class="card-title">Judul Kuis</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, necessitatibus.</p>
              <a href="#" class="btn btn-primary">Mulai</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pt-3">
          <div class="card">
            <img src="<?=BASEURL;?>/img/spldv.jpg" class="card-img-top" height="200" alt="...">
            <div class="card-body">
              <h5 class="card-title">Judul Kuis</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, necessitatibus.</p>
              <a href="#" class="btn btn-primary">Mulai</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CATEGORY END -->


  <!-- EDIT PROFILE MODAL START -->
  <div class="modal fade" id="formModal1" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div id="form-modal-1" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel">Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?=BASEURL?>/home/editProfile" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="container d-flex justify-content-center">
            <img src="<?=BASEURL?>/img/<?=$tampilan_gambar?>" width="100" alt="" class="img-thumbnail">
          </div>
          <input type="hidden" name="gambar_default" value="<?=$gambar?>">
          <label for="nama_pengguna" class="mt-4">Nama Pengguna</label>
          <input type="text" class="form-control form-control-lg mt-2" name="nama_pengguna"
            value="<?=ucfirst($nama_pengguna)?>" placeholder="Masukkan nama pengguna" required/>
          <label for="alamat_email" class="mt-3">Email</label>
          <input type="email" class="form-control form-control-lg mt-2" name="alamat_email"
            value="<?=$alamat_email?>" placeholder="Masukkan alamat email yang valid" required/>
          <label for="gambar" class="mt-3">Foto Profil</label>
          <input type="file" name="gambar" class="form-control form-control-lg mt-2">
        </div>
        <div class="modal-footer text-center text-lg-start d-flex justify-content-between align-items-center">
          <button id="tombol-hapus-akun" type="button" class="btn btn-danger text-white" data-bs-target="#formModal2"
            data-bs-toggle="modal" data-bs-dismiss="modal" style="padding-left: 1rem; padding-right: 1rem;">Hapus
            Akun</button>
          <button type="submit" class="btn btn-primary"
            style="padding-left: 1rem; padding-right: 1rem;">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- EDIT PROFILE MODAL END -->



  <!-- BUAT KUIS MODAL START-->
  <div class="modal fade" id="formModal3" aria-hidden="true" aria-labelledby="formModalLabel3"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div id="form-modal-3" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel3">Buat Kuis</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?=BASEURL?>/create" method="post">
          <div class="modal-body fs-4">
            <input type="hidden" value="on" name="buat">
            <input type="text" class="form-control form-control-lg mt-2" name="nama_kuis"
            placeholder="Masukkan nama kuis anda" required/>
            <div class="dropdown mb-2 mt-2">
              <input id="nama-genre" type="hidden" name="nama_genre" value="">
              <button class="btn btn-lg btn-light dropdown-toggle" type="button" id="pilih-genre" data-bs-toggle="dropdown"
                aria-expanded="false">
                Sosial
              </button>
              <ul class="dropdown-menu" aria-labelledby="pilih-genre">
                <?php foreach($data as $genre){ ?>
                <li><a class="dropdown-item nama-nama-genre"><?=ucfirst($genre['nama_genre'])?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="modal-footer text-center text-lg-start d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary px-3">Buat</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- BUAT KUIS MODAL END-->


  <!-- UTILTY MODAL START-->
  <div class="modal fade" id="formModal2" aria-hidden="true" aria-labelledby="formModalLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div id="form-modal-2" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel2"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post">
          <div class="modal-body fs-4"></div>
          <div class="modal-footer text-center text-lg-start d-flex justify-content-between align-items-center"></div>
        </form>
      </div>
    </div>
  </div>
</div>