

<div class="container">
  <!-- NAVBAR START -->
  <nav class="navbar navbar-light bg-white fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?=BASEURL;?>/img/logo.png" alt="" height="40" class="d-inline-block align-text-center">
        <img src="<?=BASEURL;?>/img/name_brand.svg" alt="" height="20" class="d-inline-block align-text-center">
      </a>
    <!-- LOGIN -->
      <div class="d-flex justify-content-start">
        <button type="button" id="tombol-daftar" class="btn btn-outline-primary me-2 d-inline-block btn-sm" data-bs-toggle="modal" data-bs-target="#formModal1">Daftar</button>
        <button type="button" id="tombol-masuk" class="btn btn-primary text-white me-2 d-inline-block btn-sm" data-bs-toggle="modal" data-bs-target="#formModal1">Masuk</button>
      </div>
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
            <button type="button" class="btn btn-primary btn-lg w-75">Jelajahi Kuis</button>
          </div>
        </div>
        <div class="row">
          <div class="col-8 col-md-7">
            <button type="button" class="btn btn-outline-primary btn-lg w-75">Buat Kuis</button>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <img src="<?=BASEURL;?>/img/hero.png" alt="" class="img-fluid">
      </div>
    </div>
  </section>
  <!-- HERO END -->
  <br><br><br>
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