const DAFTAR_BTN = document.querySelector('#tombol-daftar');
const MASUK_BTN = document.querySelector('#tombol-masuk');
const MODAL_BODY = document.querySelector('.modal-body');
const MODAL_TITLE = document.querySelector('.modal-header>.modal-title');
const MODAL_FOOTER = document.querySelector('.modal-footer');
const MODAL_FORM = document.querySelector('.modal-content>form');


//login
MASUK_BTN.addEventListener('click',function(){
    MODAL_TITLE.innerText = 'Sign in';
    MODAL_FORM.setAttribute('action','http://localhost/budakpintar/public/landing/login');
    if (MODAL_FOOTER.classList.contains('justify-content-center')){
        MODAL_FOOTER.classList.replace('justify-content-center','justify-content-between');
      }
    MODAL_BODY.innerHTML = `
    <input type="hidden" name="id" id="id">
    <div class="form-outline mb-4 mt-3">
        <input type="text" id="signin-username" class="form-control form-control-lg" name="nama_pengguna"
            placeholder="Masukkan nama pengguna" required/>
    </div>

    <div class="form-outline mb-2">
        <input type="password" id="signin-password" class="form-control form-control-lg" name="kata_sandi"
            placeholder="Masukkan kata sandi" required/>
    </div>
`;
    MODAL_FOOTER.innerHTML = `
        <a href="#" class="text-body small fw-bold">Lupa kata sandi?</a>
        <button type="submit" class="btn btn-primary" style="padding-left: 1rem; padding-right: 1rem;">Masuk</button>
        `;
});


//register
DAFTAR_BTN.addEventListener('click',function(){

    MODAL_TITLE.innerText = 'Sign up';
    MODAL_FORM.setAttribute('action','http://localhost/budakpintar/public/landing/register');
    if (MODAL_FOOTER.classList.contains('justify-content-between')){
        MODAL_FOOTER.classList.replace('justify-content-between','justify-content-center');
      }
    MODAL_BODY.innerHTML = `                    
    
    <div class="form-outline mb-4 mt-3">
        <input type="text" id="signup-username" class="form-control form-control-lg" name="nama_pengguna"
            placeholder="Masukkan nama pengguna" required/>
    </div>

    <div class="form-outline mb-4 mt-3">
        <input type="email" id="signup-email" class="form-control form-control-lg" name="alamat_email"
            placeholder="Masukkan alamat email yang valid" required/>
    </div>

    <div class="form-outline mb-2">
        <input type="password" id="signup-password" class="form-control form-control-lg" name="kata_sandi"
            placeholder="Masukkan kata sandi" required/>
    </div>
`;
MODAL_FOOTER.innerHTML = `
<button type="submit" class="btn btn-primary px-3">Daftar</button>
`;
});