const BODY = document.querySelector('body');
const MODAL_BODY = document.querySelector('#form-modal-2 .modal-body');
const MODAL_TITLE = document.querySelector('#form-modal-2 .modal-title');
const MODAL_FOOTER = document.querySelector('#form-modal-2 .modal-footer');
const MODAL_FORM = document.querySelector('#form-jawaban');
const KIRIM_BTN = document.querySelector('#tombol-kirim');
const KELUAR_BTN = document.querySelector('#tombol-keluar');

KIRIM_BTN.addEventListener('click', ()=> {
    MODAL_TITLE.innerText = 'Kirim';
    MODAL_FORM.setAttribute('action', 'http://localhost/budakpintar/public/attempt/evaluation');
    MODAL_FOOTER.innerHTML = `
<button type="submit" class="btn btn-primary">Kirim</button>
`;
});
KELUAR_BTN.addEventListener('click', ()=> {
    MODAL_TITLE.innerText = 'Keluar';
    MODAL_FORM.setAttribute('action', 'http://localhost/budakpintar/public/home');
    MODAL_FOOTER.innerHTML = `
<button type="submit" class="btn btn-danger">Keluar</button>
`;
});