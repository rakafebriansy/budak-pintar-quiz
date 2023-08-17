const BODY = document.querySelector('body');
const MODAL_BODY = document.querySelector('#form-modal-2 .modal-body');
const MODAL_TITLE = document.querySelector('#form-modal-2 .modal-title');
const MODAL_FOOTER = document.querySelector('#form-modal-2 .modal-footer');
const MODAL_FORM = document.querySelector('#form-jawaban');

BODY.addEventListener('click', function(e){
    if (e.target.classList.contains('tombol-kirim')){
        MODAL_TITLE.innerText = 'Kirim';
        MODAL_FORM.setAttribute('action', 'http://localhost/budakpintar/public/attempt/evaluation');
        MODAL_FOOTER.innerHTML = `
    <button type="submit" class="btn btn-primary">Kirim</button>
    `;
    }
    if (e.target.classList.contains('tombol-keluar')){
        MODAL_TITLE.innerText = 'Keluar';
        MODAL_FORM.setAttribute('action', 'http://localhost/budakpintar/public/home');
        MODAL_FOOTER.innerHTML = `
    <button type="submit" class="btn btn-danger">Keluar</button>
    `;
    }
});