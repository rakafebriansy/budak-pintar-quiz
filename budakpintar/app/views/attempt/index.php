<?php
$nama_kuis = $data['nama_kuis'];
$nama_genre = $data['nama_genre'];
$kumpulan_soal = $data['kumpulan_soal'];

function cetakSoal($soal,$counter){
    switch($soal['tipe_soal']){
        case 'single':
            echo '
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jawaban[' . $counter . ']" id="jawabanA' . $counter . '"
                        value="a" />
                    <label class="form-check-label" for="jawabanA' . $counter . '">a. ' . $soal['opsi_a'] . '</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jawaban[' . $counter . ']" id="jawabanB' . $counter . '"
                        value="b" />
                    <label class="form-check-label" for="jawabanB' . $counter . '">b. ' . $soal['opsi_b'] . '</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jawaban[' . $counter . ']" id="jawabanC' . $counter . '"
                        value="c" />
                    <label class="form-check-label" for="jawabanC' . $counter . '">c. ' . $soal['opsi_c'] . '</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jawaban[' . $counter . ']" id="jawabanD' . $counter . '"
                        value="d" />
                    <label class="form-check-label" for="jawabanD' . $counter . '">d. ' . $soal['opsi_d'] . '</label>
                </div>';
                break;
        case 'multiple':
            echo '
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="jawaban[' . $counter . '][a]" id="jawabanA' . $counter . '"/>
                <label class="form-check-label" for="jawabanA' . $counter . '">a. ' . $soal['opsi_a'] . '1</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="jawaban[' . $counter . '][b]" id="jawabanB' . $counter . '"/>
                <label class="form-check-label" for="jawabanB' . $counter . '">b. ' . $soal['opsi_b'] . '1</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="jawaban[' . $counter . '][c]" id="jawabanC' . $counter . '"/>
                <label class="form-check-label" for="jawabanC' . $counter . '">c. ' . $soal['opsi_c'] . '1</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="jawaban[' . $counter . '][d]" id="jawabanD' . $counter . '"/>
                <label class="form-check-label" for="jawabanD' . $counter . '">d. ' . $soal['opsi_d'] . '1</label>
            </div>';
            break;

    }
}

?>

<body>
<div class="container">
  <nav class="navbar navbar-light bg-white fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?=BASEURL;?>/img/logo.png" alt="" height="40" class="d-inline-block align-text-center">
        <img src="<?=BASEURL;?>/img/name_brand.svg" alt="" height="20" class="d-inline-block align-text-center">
      </a>
      <div class="d-flex justify-content-start">
        <h3 class="text-info"><?=$nama_kuis?></h3>
      </div>
    </div>
  </nav>
  <div id="awal-soal1"></div>
    <br><br>

    <section class="mt-5">
        <?php
            $jumlah_soal = sizeof($kumpulan_soal);
            for($i=0;$i<$jumlah_soal;$i++) {
        ?>
        <div class="row mt-3">
            <div class="col-md-1 col-xl-1 d-flex justify-content-end align-items-start d-none d-md-flex" style="padding-left: 10px">
                <div class="deks-number d-none d-md-inline">
                    <h5><?= $i+1 ?></h5>
                </div>
            </div>
            <div class="col-md-8 col-xl-10">
                <div id="soal1">
                    <div class="card">
                        <div class="card-header"><?=ucfirst($nama_genre)?></div>
                        <div class="card-body">
                            <p id="awal-soal<?=$i+2?>" class="card-text">
                                <?= $kumpulan_soal[$i]['pertanyaan'];?>
                            </p>
                             <?php cetakSoal($kumpulan_soal[$i],$i+1) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-xl-1"></div>
        </div>
        <?php
            }
        ?>
    </section>
</div>
<div class="card position-fixed d-none d-md-block" style="top:96px; right:0; z-index:1050; width:10rem;">
    <div class="card-body">
        <h5 class="card-title text-center">Navigasi</h5>
        <div id="wadah-navigasi" class="row justify-content-start">
            <?php for($i=0;$i<$jumlah_soal;$i++){ ?>
                <div class="col-md-4 d-flex justify-content-center">
                <a href="#awal-soal<?=$i+1?>" style="text-decoration: none;">
                    <div class="tombol-navigasi border border-info rounded mt-3 d-flex justify-content-center" style="width: 30px; height:30px; cursor:pointer;">
                        <p class="d-block text-info"><?= $i+1;?></p>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>