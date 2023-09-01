const MODAL_BODY1 = document.querySelector('#form-modal-1 .modal-body');
const MODAL_TITLE1 = document.querySelector('#form-modal-1 .modal-header>.modal-title');
const MODAL_FOOTER1 = document.querySelector('#form-modal-1 .modal-footer');
const MODAL_FORM1 = document.querySelector('#form-modal-1 form');
const MODAL_BODY2 = document.querySelector('#form-modal-2 .modal-body');
const MODAL_TITLE2 = document.querySelector('#form-modal-2 .modal-header>.modal-title');
const MODAL_FOOTER2 = document.querySelector('#form-modal-2 .modal-footer');
const MODAL_FORM2 = document.querySelector('#form-modal-2 form');
const BODY = document.querySelector('body');


BODY.addEventListener('click', function (e) {

    if (e.target.id == 'tombol-daftar') {
        MODAL_TITLE1.innerText = 'Sign up';
        MODAL_FORM1.setAttribute('action', 'http://localhost/budakpintar/public/landing/register');
        if (MODAL_FOOTER1.classList.contains('justify-content-between')) {
            MODAL_FOOTER1.classList.replace('justify-content-between', 'justify-content-center');
        }
        MODAL_BODY1.innerHTML = `                    
        
        <div class="form-outline mb-4 mt-3">
            <input type="text" class="form-control form-control-lg" name="nama_pengguna"
                placeholder="Masukkan nama pengguna" required/>
        </div>
    
        <div class="form-outline mb-4 mt-3">
            <input type="email" class="form-control form-control-lg" name="alamat_email"
                placeholder="Masukkan alamat email yang valid" required/>
        </div>
    
        <div class="form-outline mb-2">
            <input type="password" class="form-control form-control-lg" name="kata_sandi"
                placeholder="Masukkan kata sandi" required/>
        </div>
    `;
        MODAL_FOOTER1.innerHTML = `
    <button type="submit" class="btn btn-primary px-3">Daftar</button>
    `;
    }
    if (e.target.id == 'tombol-masuk') {
        MODAL_TITLE1.innerText = 'Sign in';
        MODAL_FORM1.setAttribute('action', 'http://localhost/budakpintar/public/landing/login');
        if (MODAL_FOOTER1.classList.contains('justify-content-center')) {
            MODAL_FOOTER1.classList.replace('justify-content-center', 'justify-content-between');
        }
        MODAL_BODY1.innerHTML = `
        <input type="hidden" name="id" id="id">
        <div class="form-outline mb-4 mt-3">
            <input type="text" class="form-control form-control-lg" name="nama_pengguna"
                placeholder="Masukkan nama pengguna" required/>
        </div>
    
        <div class="form-outline mb-2">
            <input type="password" class="form-control form-control-lg" name="kata_sandi"
                placeholder="Masukkan kata sandi" required/>
        </div>
    `;
        MODAL_FOOTER1.innerHTML = `
            <a class="lupa-kata-sandi btn small fw-bold" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#formModal2"><u class="lupa-kata-sandi">Lupa kata sandi?</u></a>
            <button type="submit" class="btn btn-primary" style="padding-left: 1rem; padding-right: 1rem;">Masuk</button>
            `;
    }
    if (e.target.classList.contains('tombol-mulai')) {
        document.getElementById('tombol-masuk').click();
    }
    if (e.target.classList.contains('lupa-kata-sandi')) {
        MODAL_TITLE2.innerText = 'Lupa kata sandi';
        MODAL_FORM2.setAttribute('action', 'http://localhost/budakpintar/public/landing/forgotPassword');
        if (MODAL_FOOTER2.classList.contains('justify-content-between')) {
            MODAL_FOOTER2.classList.replace('justify-content-between', 'justify-content-center');
        }
        MODAL_BODY2.innerHTML = `
        <input type="hidden" name="id" id="id">
        <p class="fs-4">Kami akan mengirimkan kata sandi baru ke alamat email anda.</p>
        <div class="form-outline mb-3">
        <input type="text" class="form-control form-control-lg" name="nama_pengguna"
            placeholder="Masukkan nama pengguna anda" required/>
    </div>
    `;
        MODAL_FOOTER2.innerHTML = `
            <button type="submit" class="btn btn-primary" style="padding-left: 1rem; padding-right: 1rem;">Kirim</button>
            `;
    }
});

$('#kata-kunci').on('keyup', function () {
    const value = $(this).val();
    $.ajax({
        url: 'http://localhost/budakpintar/public/home/searching',
        data: { kata_kunci: value },
        method: 'post',
        success: function (data) {
            $('#hasil-cari').html(data);
        }
    });
});

$('#tombol-urut').on('click', function () {
    const value = $('#kata-kunci').val();
    const HALAMAN_AKTIF = parseInt($('#halaman-sekarang').val());
    if ($(this).hasClass('descending')) {
        $.ajax({
            url: 'http://localhost/budakpintar/public/home/searching',
            data: {
                kata_kunci: value,
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
                kata_kunci: value,
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
$('body').on('click', function (e) {
    if ($(e.target).hasClass('halaman-ke')) {
        var order;
        if ($('#tombol-urut').hasClass('descending')) {
            order = 'ASC';
        } else if ($('#tombol-urut').hasClass('ascending')) {
            order = 'DESC';
        }
        const KATA_KUNCI = $('#kata-kunci').val();
        const HALAMAN_AKTIF = $(e.target).text();
        $.ajax({
            url: 'http://localhost/budakpintar/public/home/searching',
            data: {
                kata_kunci: KATA_KUNCI,
                halaman_aktif: HALAMAN_AKTIF,
                urut_berdasar: order
            },
            method: 'post',
            success: function (data) {
                $('#hasil-cari').html(data);
            }
        });
    }
    if ($(e.target).attr('id') == 'halaman-prev') {
        var order;
        if ($('#tombol-urut').hasClass('descending')) {
            order = 'ASC';
        } else if ($('#tombol-urut').hasClass('ascending')) {
            order = 'DESC';
        }
        const KATA_KUNCI = $('#kata-kunci').val();
        const HALAMAN_AKTIF = parseInt($('#halaman-sekarang').val()) - 1;
        console.log(HALAMAN_AKTIF)
        $.ajax({
            url: 'http://localhost/budakpintar/public/home/searching',
            data: {
                kata_kunci: KATA_KUNCI,
                halaman_aktif: HALAMAN_AKTIF,
                urut_berdasar: order
            },
            method: 'post',
            success: function (data) {
                $('#hasil-cari').html(data);
            }
        });
    }
    if ($(e.target).attr('id') == 'halaman-next') {
        var order;
        if ($('#tombol-urut').hasClass('descending')) {
            order = 'ASC';
        } else if ($('#tombol-urut').hasClass('ascending')) {
            order = 'DESC';
        }
        const KATA_KUNCI = $('#kata-kunci').val();
        const HALAMAN_AKTIF = parseInt($('#halaman-sekarang').val()) + 1;
        console.log(HALAMAN_AKTIF);
        $.ajax({
            url: 'http://localhost/budakpintar/public/home/searching',
            data: {
                kata_kunci: KATA_KUNCI,
                halaman_aktif: HALAMAN_AKTIF,
                urut_berdasar: order
            },
            method: 'post',
            success: function (data) {
                $('#hasil-cari').html(data);
            }
        });
    }
});