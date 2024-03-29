<?php

$db_genre = $data['genre'];
$db_kuis = $data['kuis'];
$banyak_pagination = $data['banyak_pagination'];

?>

<div class="container">
  <nav class="navbar navbar-light bg-white fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?= BASEURL; ?>/img/logo.png" alt="" height="40" class="d-inline-block align-text-center">
        <img src="<?= BASEURL; ?>/img/name_brand.svg" alt="" height="20" class="d-inline-block align-text-center">
      </a>
      <div class="d-flex justify-content-start">
        <button type="button" id="tombol-daftar" class="btn btn-outline-primary me-2 d-inline-block" data-bs-toggle="modal" data-bs-target="#formModal1">Daftar</button>
        <button type="button" id="tombol-masuk" class="btn btn-primary text-white me-2 d-inline-block" data-bs-toggle="modal" data-bs-target="#formModal1">Masuk</button>
      </div>
    </div>
  </nav>

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
        <div>
          <a href="#category-linked" role="button" class="btn btn-primary btn-lg d-inline-block me-3 mt-3 px-3">Jelajahi Kuis</a>
          <button type="button" class="btn btn-outline-primary btn-lg d-inline-block mt-3 px-4 tombol-mulai">Buat Kuis</button>
        </div>
      </div>
      <div class="col-md-6 mt-5">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
              <img src="<?= BASEURL; ?>/img/hero.jpg" alt="" class="img-fluid">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="<?= BASEURL; ?>/img/math.jpeg" alt="" class="img-fluid">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="<?= BASEURL; ?>/img/statistika.jpeg" alt="" class="img-fluid">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <br><br><br>
  <div id="category-linked"></div><br><br>

  <section id="search" class="mt-5 mb-3">
    <h2 class="">Temukan kuis yang kamu suka!</h2>
    <form class="d-flex mt-4">
      <input id="kata-kunci" class="form-control me-2" type="search" placeholder="Masukkan kata kunci" aria-label="Cari">
      <button id="tombol-urut" class="btn btn-outline-success fw-bold descending" type="button" style="padding-right:1rem; padding-left:1rem;">↓</button>
    </form>
  </section>

  <section id="category">
    <div id="hasil-cari" class="row ">
      <nav aria-label="Page navigation example">
        <input type="hidden" value="1" id="halaman-sekarang">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $banyak_pagination; $i++) { ?>
            <?php if ($i == 1) { ?>
              <li class="page-item"><a class="page-link halaman-ke bg-primary text-white" role="button" type="button"><?= $i; ?></a></li>
            <?php } else { ?>
              <li class="page-item"><a class="page-link halaman-ke" role="button" type="button"><?= $i; ?></a></li>
            <?php } ?>
          <?php } ?>
          <li class="page-item">
            <a class="page-link" id="halaman-next" role="button" type="button" aria-label="Next">
              &raquo;
            </a>
          </li>
        </ul>
      </nav>
      <?php foreach ($db_kuis as $kuis) {
        $id_genre = $kuis['genre_id_genre'];
        $nama_genre;
        foreach ($db_genre as $genre) {
          if ($genre['id_genre'] == $id_genre) {
            $nama_genre = $genre['nama_genre'];
          }
        }
      ?>
        <div class="col-md-4">
          <div class="card mb-3">
            <div class="card-header bg-primary text-white">
              <?= ucfirst($nama_genre); ?>
            </div>
            <div class="card-body" style="min-height:190px;">
              <input type="hidden" name="attempt" value="<?= $kuis['id_kuis'] ?>">
              <h5 class="card-title"><?= ucfirst($kuis['nama_kuis']); ?></h5>
              <p class="card-text"><?= ucfirst($kuis['deksripsi_kuis']); ?></p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <button type="button" class="btn btn-primary tombol-mulai" data-bs-toggle="modal" data-bs-target="#formModal1">Mulai</button>
              <button type="button" class="btn btn-outline-warning tombol-mulai px-2" data-bs-toggle="modal" data-bs-target="#formModal1">🏆</button>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

  <!-- UTILITY MODAL 1-->
  <div class="modal fade" id="formModal1" tabindex="-1" aria-labelledby="formModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div id="form-modal-1" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel1">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post">
          <div class="modal-body">

          </div>
          <div class="modal-footer text-center text-lg-start d-flex justify-content-between align-items-center">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- UTILITY MODAL 2-->
  <div class="modal fade" id="formModal2" tabindex="-1" aria-labelledby="formModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div id="form-modal-2" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel2">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post">
          <div class="modal-body"></div>
          <div class="modal-footer text-center text-lg-start d-flex justify-content-between align-items-center">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>