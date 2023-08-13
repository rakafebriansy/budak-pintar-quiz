<?php 
$nama_kuis = $data['nama_kuis'];

?>

<form action="<?=BASEURL?>/create/createQuiz" method="post">
  <div class="container ">
    <nav class="navbar navbar-light fixed-top bg-white">
      <div class="container d-flex justify-content-center px-4">
        <div class="col-md-6 d-flex justify-content-between align-items-center">
          <a class="navbar-brand" href="#">
            <img src="<?=BASEURL?>/img/logo.png" alt="" height="40"
              class="d-inline-block align-text-center">
            <img src="<?=BASEURL?>/img/name_brand.svg" alt="" height="20"
              class="d-inline-block align-text-center">
          </a>
          <!-- SEND -->
          
          <div class="buttons">
            <button type="submit" name="tombol-batal" class="btn btn-danger me-2" data-bs-toggle="modal"
              data-bs-target="#formModal1"
              style="padding-right: 1rem !important; padding-left: 1rem !important;">Batal</button>
            <button type="submit" name="tombol-kirim" class="btn btn-outline-primary" data-bs-toggle="modal"
              data-bs-target="#formModal1"
              style="padding-right: 1rem !important; padding-left: 1rem !important;">Kirim</button>
          </div>
        </div>
      </div>
    </nav>
    <br><br><br>
    <div class="text-center">
      <input type="hidden" name="nama_kuis" value="<?=$nama_kuis?>">
      <input type="hidden" name="genre" value="<?=$data['genre']?>">
      <h3 class="text-info"><?=$nama_kuis?></h3>
    </div>
    <div id="after-body" class="container d-flex justify-content-center">
      <div id="template-body" class="col-md-6">
        <hr>
        <!-- TAMBAH SOAL -->

        <!-- TAMBAH SOAL -->
      </div>
    </div>
    <div class="container d-flex justify-content-center">
      <div class="col-md-6 d-flex justify-content-end">
        <div class="dropdown mb-5">
          <button class="btn btn-primary dropdown-toggle" type="button" id="tambah" data-bs-toggle="dropdown"
            aria-expanded="false">
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



</html>