<?php
$nama_kuis = $data['nama_kuis'];

?>

<form action="<?= BASEURL ?>/create/createQuiz" method="post" enctype="multipart/form-data">
  <div class="container">
    <nav class="navbar navbar-light fixed-top bg-white">
      <div class="container d-flex justify-content-center px-4">
        <div class="col-md-8 d-flex justify-content-between align-items-center">
          <a class="navbar-brand" href="#">
            <img src="<?= BASEURL ?>/img/logo.png" alt="" height="40" class="d-inline-block align-text-center">
            <img src="<?= BASEURL ?>/img/name_brand.svg" alt="" height="20" class="d-inline-block align-text-center">
          </a>
          <!-- SEND -->

          <div class="buttons">
            <button type="button" id="tombol-keluar" class="btn btn-danger" data-bs-target="#formModal2" data-bs-toggle="modal" data-bs-dismiss="modal">Keluar</button>
            <button type="submit" name="tombol-kirim" class="btn btn-primary" style="padding-right: 1rem !important; padding-left: 1rem !important;">Kirim</button>
          </div>
        </div>
      </div>
    </nav>
    <br><br><br>
    <div class="text-center">
      <input type="hidden" name="nama_kuis" value="<?= $nama_kuis ?>">
      <input type="hidden" name="nama_genre" value="<?= $data['nama_genre'] ?>">
      <input type="hidden" name="deskripsi_kuis" value="<?= $data['deskripsi_kuis'] ?>">
      <h1 class="text-info text-center"><?= $nama_kuis ?></h1>
    </div>
    <div id="after-body" class="container d-flex justify-content-center">
      <div id="template-body" class="col-md-8">
        <hr>
        <!-- TAMBAH SOAL -->
      </div>
    </div>
    <div class="container d-flex justify-content-center">
      <div class="col-md-8 d-flex justify-content-between align-items-start">
        <button type="button" id="tombol-hapus" class="btn btn-outline-danger btn-sm">Hapus</button>
        <div class="dropdown mb-5 ms-3">
          <button class="btn btn-outline-primary dropdown-toggle  btn-sm" type="button" id="tambah" data-bs-toggle="dropdown" aria-expanded="false">
            Tambah Soal
          </button>
          <ul class="dropdown-menu" aria-labelledby="tambah">
            <li><a id="tambah-soal-single" class="dropdown-item">Single</a></li>
            <li><a id="tambah-soal-multiple" class="dropdown-item">Multiple</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="modal fade" id="formModal2" aria-hidden="true" aria-labelledby="formModalLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div id="form-modal-2" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel2">Keluar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-4">
        <p>Apakah anda yakin?</p>
      </div>
      <form action="<?= BASEURL ?>/public">
        <div class="modal-footer text-center text-lg-start d-flex justify-content-center align-items-center">
          <button type="submit" class="btn btn-danger">Keluar</button>
        </div>
      </form>
    </div>
  </div>
</div>

</html>