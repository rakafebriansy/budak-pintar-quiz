<?php

$nama_pengguna = $_SESSION['nama_pengguna'];
$alamat_email = $_SESSION['alamat_email'];
$id_pengguna = $_SESSION['id_pengguna'];
$gambar = '';
$tampilan_gambar = 'user.png';
if (isset($_SESSION['gambar_profil'])) {
  $gambar = $_SESSION['gambar_profil'];
}
if ($gambar != '') {
  $tampilan_gambar = $gambar;
}

$db_genre = $data['genre'];
$db_kuis = $data['kuis'];
$banyak_pagination = $data['banyak_pagination'];


?>

<div class="container">
  <div class="confetti-container"></div>
  <nav class="navbar navbar-light fixed-top bg-white">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?= BASEURL; ?>/img/logo.png" alt="" height="40" class="d-inline-block align-text-center">
        <img src="<?= BASEURL; ?>/img/name_brand.svg" alt="" height="20" class="d-inline-block align-text-center">
      </a>
      <div class="dropdown justify-content-start align-items-center text-center">
        <div class="container"></div>
        <label for="tombol-profil">
          <img src="<?= BASEURL; ?>/img/profile/<?= $tampilan_gambar ?>" width="40" alt="">
        </label>
        <a id="dropdownMenuButton1" name="dropdownMenuButton1" class="btn ms-1 fs-5 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?= ucfirst($nama_pengguna); ?></a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" id="tombol-profil" name="tombol-profil" data-bs-toggle="modal" data-bs-target="#formModal1">Ubah Profil</a></li>
          <li><a class="dropdown-item" id="tombol-ubah-sandi" name="tombol-ubah-sandi" data-bs-toggle="modal" data-bs-target="#formModal2">Ubah Sandi</a></li>
          <li><a class="dropdown-item" id="tombol-keluar" name="tombol-keluar" data-bs-toggle="modal" data-bs-target="#formModal2">Keluar</a></li>
        </ul>
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
        <img src="<?= BASEURL; ?>/img/hero.png" alt="" class="img-fluid">
      </div>
    </div>
  </section>
  <br>
  <div id="category-linked"></div><br>
  <section id="search" class="mt-5 mb-3">
    <h2 class="">Temukan kuis yang kamu suka!</h2>
    <div class="d-flex mt-4">
      <input id="kata-kunci" class="form-control me-2" type="search" placeholder="Masukkan kata kunci" aria-label="Cari">
      <button id="tombol-urut" class="btn btn-outline-success fw-bold descending" type="button" style="padding-right:1rem; padding-left:1rem;">↓</button>
    </div>
  </section>

  <section id="category">
    <div id="hasil-cari" class="row ">
      <nav aria-label="Page navigation example">
        <input type="hidden" value="1" id="halaman-sekarang">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $banyak_pagination; $i++) { ?>
            <?php if($i == 1){ ?>
              <li class="page-item"><a class="page-link halaman-ke bg-primary text-white" role="button" type="button"><?= $i; ?></a></li>
              <?php } else {?>
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
          <div class="card">
            <div class="card-header">
              <?= ucfirst($nama_genre); ?>
            </div>
            <div class="card-body">
              <input type="hidden" name="attempt" value="<?= $kuis['id_kuis'] ?>">
              <h5 class="card-title"><?= ucfirst($kuis['nama_kuis']); ?></h5>
              <p class="card-text"><?= ucfirst($kuis['deksripsi_kuis']); ?></p>
              <div class="d-flex justify-content-between">
                <button value="<?= $kuis['id_kuis'] ?>" id="tombol-mulai" type="button" class="btn btn-primary" data-bs-target="#formModal2" data-bs-toggle="modal" data-bs-dismiss="modal">Mulai</button>
                <button type="button" id="tombol-peringkat" class="btn btn-outline-warning px-2" data-bs-toggle="modal" data-bs-target="#formModal2">🏆</button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

  <!-- EDIT PROFILE MODAL -->
  <div class="modal fade" id="formModal1" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div id="form-modal-1" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel">Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= BASEURL ?>/home/editProfile" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="container d-flex justify-content-center">
              <img src="<?= BASEURL ?>/img/profile/<?= $tampilan_gambar ?>" width="100" alt="" class="img-thumbnail">
            </div>
            <input type="hidden" name="gambar_default" value="<?= $gambar ?>">
            <label for="nama_pengguna" class="mt-4">Nama Pengguna</label>
            <input type="text" class="form-control form-control-lg mt-2" name="nama_pengguna" value="<?= ucfirst($nama_pengguna) ?>" placeholder="Masukkan nama pengguna" required />
            <label for="alamat_email" class="mt-3">Email</label>
            <input type="email" class="form-control form-control-lg mt-2" name="alamat_email" value="<?= $alamat_email ?>" placeholder="Masukkan alamat email yang valid" required />
            <label for="gambar_profil" class="mt-3">Foto Profil</label>
            <input type="file" name="gambar_profil" class="form-control form-control-lg mt-2">
          </div>
          <div class="modal-footer text-center text-lg-start d-flex justify-content-between align-items-center">
            <button id="tombol-hapus-akun" type="button" class="btn btn-danger text-white" data-bs-target="#formModal2" data-bs-toggle="modal" data-bs-dismiss="modal" style="padding-left: 1rem; padding-right: 1rem;">Hapus
              Akun</button>
            <button type="submit" class="btn btn-primary" style="padding-left: 1rem; padding-right: 1rem;">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- POP UP -->
  <div class="popup" id="resultPopup">
    <div class="popup-content">
      <img src="<?= BASEURL ?>/img/bg.png" alt="bg" style="
            position: absolute;
            height: 239px;
            width: 393px;
            margin-left: -190px;
            z-index: -1;
          " />
      <h3 class="fw-bold" style="margin-left: 20px; margin-bottom: 50px;">Your Final Score</h3>
      <div class="bintang">
        <div class="star-group">
          <input type="radio" class="star" id="two" name="star_rating" disabled/>
          <input type="radio" class="star" id="three" name="star_rating" disabled/>
          <input type="radio" class="star" id="four" name="star_rating" disabled/>
        </div>
      </div>
      <!-- <div class="btn btn-light border border-2 border-black pe-5 ps-5 pb-4 position-absolute top-50 start-50 rounded-5" style="
            margin-left: -50px;
            margin-top: 47px;
            padding-bottom: 20px;
            z-index: -1;
            padding-left: 10px;
          ">
          </div> -->
      <div class="row mt-2 justify-content-center" style="padding: 5px; border-color: #95a2e9">
        <div class="btn btn-light col-md-3 text-end d-flex justify-content-around">
          <img src="<?= BASEURL ?>/img/bedge.png" alt="lencana" class="d-inline-block" style="height: 30px; width: 30px; margin-top: 2px; margin-left:5px;" />
          <h4 class="pt-1 fw-bold d-inline-block" style="margin-left: -15px">
            <span id="score" class="">0</span>
          </h4>
        </div>
      </div>
      <div class="container text-center mt-2">
        <button type="button" id="closeBtn" class="btn btn-secondary" aria-label="Close">
          Kembali
        </button>
      </div>
    </div>
  </div>

  <!-- BUAT KUIS MODAL -->
  <div class="modal fade" id="formModal3" aria-hidden="true" aria-labelledby="formModalLabel3" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div id="form-modal-3" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel3">Buat Kuis</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= BASEURL ?>/create" method="post">
          <div class="modal-body fs-4">
            <input type="hidden" value="on" name="buat">
            <input type="text" class="form-control form-control-lg mt-2" name="nama_kuis" placeholder="Masukkan nama kuis anda" maxlength="40" required />
            <input type="text" class="form-control form-control-lg mt-2" name="deskripsi_kuis" placeholder="Masukkan deskripsi kuis anda" maxlength="150" required />
            <div class="dropdown mb-2 mt-2">
              <input id="nama-genre" type="hidden" name="nama_genre" value="<?= $db_genre[0]['nama_genre'] ?>">
              <button class="btn btn-lg btn-light dropdown-toggle" type="button" id="pilih-genre" data-bs-toggle="dropdown" aria-expanded="false">
                <?= ucfirst($db_genre[0]['nama_genre']); ?>
              </button>
              <ul class="dropdown-menu" aria-labelledby="pilih-genre">
                <?php foreach ($db_genre as $genre) { ?>
                  <li><a class="dropdown-item nama-nama-genre"><?= ucfirst($genre['nama_genre']) ?></a></li>
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

  <!-- UTILTY MODAL -->
  <div class="modal fade" id="formModal2" aria-hidden="true" aria-labelledby="formModalLabel2" tabindex="-1">
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
<?php

if (isset($data['total_skor'])) {
  $totalskor = $data['total_skor'];
  echo '
    <script>const submitBtn = document.getElementById("submitBtn");
const resultPopup = document.getElementById("resultPopup");
const closeBtn = document.getElementById("closeBtn");
const scoreSpan = document.getElementById("score");
const starTwo = document.getElementById("two");
const starThree = document.getElementById("three");
const starFour = document.getElementById("four");

let confettiAnimationInterval;
function stopConfetti() {
  const confettiContainer = document.querySelector(".confetti-container");
  confettiContainer.innerHTML = "";
}

function createConfetti() {
  const confettiContainer = document.querySelector(".confetti-container");
  const confettiElement = document.createElement("div");
  confettiElement.classList.add("confetti");
  confettiContainer.appendChild(confettiElement);

  // Set the animation duration and delay dynamically
  const animationDuration = Math.random() * 3 + 2; // Random duration between 2 and 5 seconds
  const animationDelay = Math.random() * 2; // Random delay between 0 and 2 seconds
  confettiElement.style.animationDuration = `${animationDuration}s`;
  confettiElement.style.animationDelay = `${animationDelay}s`;
}

function animateScore(targetScore) {
  let currentScore = 0;
  const animationDuration = 100000; // Animation duration in milliseconds
  const interval = 30; // Interval between each animation step
  const increment = Math.ceil(targetScore / (animationDuration / interval));

  const scoreAnimation = setInterval(() => {
    currentScore += increment;
    if (currentScore >= targetScore) {
      clearInterval(scoreAnimation);
      currentScore = targetScore;
    }
    scoreSpan.textContent = currentScore;

    // Automatically check stars based on score
    if (currentScore >= 50) {
      starTwo.checked = true;
    }
    if (currentScore >= 75) {
      starThree.checked = true;
    }
    if (currentScore >= 100) {
      starFour.checked = true;
    }
  }, interval);
}
  for (let i = 0; i < 10; i++) {
    createConfetti();
  }
  const targetScore = ' . $totalskor  . ';
  animateScore(targetScore);

  resultPopup.style.display = "block";

closeBtn.addEventListener("click", function () {
  resultPopup.style.display = "none";
  starTwo.checked = false;
  starThree.checked = false;
  starFour.checked = false;
  stopConfetti();
  clearInterval(confettiAnimationInterval);
});

    </script>
    ';
}

?>