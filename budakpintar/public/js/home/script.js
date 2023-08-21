const BODY = document.querySelector('body');
const MODAL_BODY = document.querySelector('#form-modal-2 .modal-body');
const MODAL_TITLE = document.querySelector('#form-modal-2 .modal-title');
const MODAL_FOOTER = document.querySelector('#form-modal-2 .modal-footer');
const MODAL_FORM = document.querySelector('#form-modal-2 form');

BODY.addEventListener('click', function (e) {
  if (e.target.id == 'tombol-hapus-akun') {
    MODAL_TITLE.innerText = 'Hapus Akun';
    MODAL_FORM.setAttribute('action', 'http://localhost/budakpintar/public/home/deleteAccount');
    if (MODAL_FOOTER.classList.contains('justify-content-center')) {
      MODAL_FOOTER.classList.replace('justify-content-center', 'justify-content-between');
    }
    MODAL_BODY.innerHTML = `
    Apakah anda yakin untuk menghapus akun anda?
    `;
    MODAL_FOOTER.innerHTML = `
    <button type="button" class="btn btn-outline-secondary" data-bs-target="#formModal1" data-bs-toggle="modal"
            data-bs-dismiss="modal" style="padding-left: 1rem; padding-right: 1rem;">Kembali ke Profil</button>
    <button type="submit" class="btn btn-danger" style="padding-left: 1rem; padding-right: 1rem;">Hapus</button>
    `;
  }
  if (e.target.id == "tombol-mulai") {
    MODAL_TITLE.innerText = 'Mulai Kuis';
    MODAL_FORM.setAttribute('action', 'http://localhost/budakpintar/public/attempt');
    if (MODAL_FOOTER.classList.contains('justify-content-between')) {
      MODAL_FOOTER.classList.replace('justify-content-between', 'justify-content-center');
    }
    MODAL_BODY.innerHTML = `
    <input type="hidden" name="attempt" value="${e.target.value}">
    Apakah anda yakin untuk memulai kuis ini?
    `;
    MODAL_FOOTER.innerHTML = `
    <button type="submit" class="btn btn-lg btn-primary">Mulai</button>
    `;
  }
  if (e.target.id == 'tombol-ubah-sandi') {
    MODAL_TITLE.innerText = 'Ubah Sandi';
    MODAL_FORM.setAttribute('action', 'http://localhost/budakpintar/public/home/changePassword');
    if (MODAL_FOOTER.classList.contains('justify-content-between')) {
      MODAL_FOOTER.classList.replace('justify-content-between', 'justify-content-center');
    }
    MODAL_BODY.innerHTML = `
        <input type="password" class="form-control form-control-lg mt-2" name="kata_sandi_lama"
        placeholder="Masukkan kata sandi lama" required/>
        <input type="password" class="form-control form-control-lg mt-2" name="kata_sandi_baru"
        placeholder="Masukkan kata sandi baru" required/>
    `;
    MODAL_FOOTER.innerHTML = `
    <button type="submit" class="btn btn-primary px-3">Simpan</button>
    `;
  }
  if (e.target.id == 'tombol-keluar') {
    MODAL_TITLE.innerText = 'Keluar';
    MODAL_FORM.setAttribute('action', 'http://localhost/budakpintar/public/home/logout');
    if (MODAL_FOOTER.classList.contains('justify-content-between')) {
      MODAL_FOOTER.classList.replace('justify-content-between', 'justify-content-center');
    }
    MODAL_BODY.innerHTML = `
      Apakah anda yakin?
    `;
    MODAL_FOOTER.innerHTML = `
    <button type="submit" class="btn btn-danger px-3">Keluar</button>
    `;
  }
  if (e.target.classList.contains('nama-nama-genre')) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.querySelector('#pilih-genre').innerText = (e.target.innerText);
        document.querySelector('#nama-genre').setAttribute('value', e.target.innerText.toLowerCase());
      }
    };
    xhr.open('GET', 'http://localhost/budakpintar/public/home', true);
    xhr.send();
  }

});

$('body').on('click', function (e) {
  if ($(e.target).hasClass('halaman-ke')) {
    const KATA_KUNCI = $('#kata-kunci').val();
    const HALAMAN_AKTIF = $(e.target).text();
    $.ajax({
      url: 'http://localhost/budakpintar/public/home/searching',
      data: {
        kata_kunci: KATA_KUNCI,
        halaman_aktif: HALAMAN_AKTIF
      },
      method: 'post',
      success: function (data) {
        $('#hasil-cari').html(data);
      }
    });
  }
  if ($(e.target).attr('id') == 'halaman-prev') {
    const KATA_KUNCI = $('#kata-kunci').val();
    const HALAMAN_AKTIF = parseInt($('#halaman-sekarang').val()) - 1;
    console.log(HALAMAN_AKTIF)
    $.ajax({
      url: 'http://localhost/budakpintar/public/home/searching',
      data: {
        kata_kunci: KATA_KUNCI,
        halaman_aktif: HALAMAN_AKTIF
      },
      method: 'post',
      success: function (data) {
        $('#hasil-cari').html(data);
      }
    });
  }
  if ($(e.target).attr('id') == 'halaman-next') {
    const KATA_KUNCI = $('#kata-kunci').val();
    const HALAMAN_AKTIF = parseInt($('#halaman-sekarang').val()) + 1;
    console.log(HALAMAN_AKTIF);
    $.ajax({
      url: 'http://localhost/budakpintar/public/home/searching',
      data: {
        kata_kunci: KATA_KUNCI,
        halaman_aktif: HALAMAN_AKTIF
      },
      method: 'post',
      success: function (data) {
        $('#hasil-cari').html(data);
      }
    });
  }
});

$('#kata-kunci').on('keyup', function () {
  const KATA_KUNCI = $(this).val();
  $.ajax({
    url: 'http://localhost/budakpintar/public/home/searching',
    data: { kata_kunci: KATA_KUNCI },
    method: 'post',
    success: function (data) {
      $('#hasil-cari').html(data);
    }
  });
});

$('#tombol-urut').on('click', function () {
  const KATA_KUNCI = $('#kata-kunci').val();
  const HALAMAN_AKTIF = parseInt($('#halaman-sekarang').val());
  if ($(this).hasClass('descending')) {
    $.ajax({
      url: 'http://localhost/budakpintar/public/home/searching',
      data: {
        kata_kunci: KATA_KUNCI,
        halaman_aktif: HALAMAN_AKTIF,
        urut_berdasar: 'DESC'
      },
      method: 'post',
      success: function (data) {
        $('#hasil-cari').html(data);
      }
    });
    $(this).text('↑');
    $(this).addClass('ascending').removeClass('descending');
  } else if ($(this).hasClass('ascending')) {
    $.ajax({
      url: 'http://localhost/budakpintar/public/home/searching',
      data: {
        kata_kunci: KATA_KUNCI,
        halaman_aktif: HALAMAN_AKTIF,
        urut_berdasar: 'ASC'
      },
      method: 'post',
      success: function (data) {
        $('#hasil-cari').html(data);
      }
    });
    $(this).text('↓')
    $(this).addClass('descending').removeClass('ascending');
  }
});

$('body').on('click',function(e){
  console.log(e.target);
  if($(e.target).hasClass('tombol-peringkat')){
    $.ajax({
      url: 'http://localhost/budakpintar/public/home/showLeaderboard',
      method: 'post',
      data:{
        id_kuis: $(e.target).val()
      },
      success: function(data){
        $('#leaderboard').html(data);
      }
    });
  }
});