const BODY = document.querySelector('body');
const MODAL_BODY = document.querySelector('#form-modal-2 .modal-body');
const MODAL_TITLE = document.querySelector('#form-modal-2 .modal-title');
const MODAL_FOOTER = document.querySelector('#form-modal-2 .modal-footer');
const MODAL_FORM = document.querySelector('#form-modal-2 form')


//dropdown
BODY.addEventListener('click', function (e) {
if (e.target.id == 'tombol-hapus-akun') {
    MODAL_TITLE.innerText = 'Hapus Akun';
    MODAL_FORM.setAttribute('action','http://localhost/budakpintar/public/home/deleteAccount');
    if (MODAL_FOOTER.classList.contains('justify-content-center')){
      MODAL_FOOTER.classList.replace('justify-content-center','justify-content-between');
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
  if (e.target.id == 'tombol-ubah-sandi') {
    MODAL_TITLE.innerText = 'Ubah Sandi';
    MODAL_FORM.setAttribute('action','http://localhost/budakpintar/public/home/changePassword');
    if (MODAL_FOOTER.classList.contains('justify-content-between')){
      MODAL_FOOTER.classList.replace('justify-content-between','justify-content-center');
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
  if (e.target.id == 'tombol-keluar'){
    MODAL_TITLE.innerText = 'Keluar';
    MODAL_FORM.setAttribute('action','http://localhost/budakpintar/public/home/logout');
    if (MODAL_FOOTER.classList.contains('justify-content-between')){
      MODAL_FOOTER.classList.replace('justify-content-between','justify-content-center');
    }
    MODAL_BODY.innerHTML = `
      Apakah anda yakin?
    `;
    MODAL_FOOTER.innerHTML = `
    <button type="submit" class="btn btn-danger px-3">Keluar</button>
    `;
  }
  if (e.target.id == 'tombol-buat-kuis'){
    MODAL_TITLE.innerText = 'Buat Kuis';
    MODAL_FORM.setAttribute('action','http://localhost/budakpintar/public/create');
    if (MODAL_FOOTER.classList.contains('justify-content-between')){
      MODAL_FOOTER.classList.replace('justify-content-between','justify-content-center');
    }
    MODAL_BODY.innerHTML = `
    <input type="text" class="form-control form-control-lg mt-2" name="nama_kuis"
    placeholder="Masukkan nama kuis anda" required/>
    <input type="text" class="form-control form-control-lg mt-2" name="genre"
    placeholder="Masukkan genre kuis anda" required/>
    `;
    MODAL_FOOTER.innerHTML = `
    <button type="submit" class="btn btn-primary px-3">Buat</button>
    `;
  }

});
