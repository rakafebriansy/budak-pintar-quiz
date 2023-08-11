const BODY = document.querySelector('body');
const UBAHSANDI_BTN = document.querySelector('#tombol-ubah-sandi');
const HAPUSAKUN_BTN = document.querySelector('#tombol-hapus-akun');
const MODAL_BODY = document.querySelector('#form-modal-2 .modal-body');
const MODAL_TITLE = document.querySelector('#form-modal-2 .modal-title');
const MODAL_FOOTER = document.querySelector('#form-modal-2 .modal-footer');
const MODAL_FORM = document.querySelector('#form-modal-2 form')

BODY.addEventListener('click', function (e) {
if (e.target == HAPUSAKUN_BTN) {
    MODAL_TITLE.innerText = 'Hapus Akun';
    MODAL_FORM.setAttribute('action','http://localhost/budakpintar/public/logged/deleteAccount');
    MODAL_BODY.innerHTML = `
    Apakah anda yakin untuk menghapus akun anda?
    `;
    MODAL_FOOTER.innerHTML = `
    <button type="button" class="btn btn-outline-secondary" data-bs-target="#formModal1" data-bs-toggle="modal"
            data-bs-dismiss="modal" style="padding-left: 1rem; padding-right: 1rem;">Kembali ke Profil</button>
    <button type="submit" class="btn btn-danger" style="padding-left: 1rem; padding-right: 1rem;">Hapus</button>
    `;
    }
  if (e.target == UBAHSANDI_BTN) {
    MODAL_TITLE.innerText = 'Ubah Sandi';
    MODAL_FORM.setAttribute('action','http://localhost/budakpintar/public/logged/changePassword');
    MODAL_BODY.innerHTML = `
        <input type="password" class="form-control form-control-lg mt-2" name="kata_sandi_lama"
        placeholder="Masukkan kata sandi lama" required/>
        <input type="password" class="form-control form-control-lg mt-2" name="kata_sandi_baru"
        placeholder="Masukkan kata sandi baru" required/>
    `;
    MODAL_FOOTER.innerHTML = `
    <button type="submit" class="btn btn-primary">Simpan</button>
    `;
  }
});
