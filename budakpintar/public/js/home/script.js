const DAFTAR_BTN = document.querySelector('#tombol-daftar');
const MASUK_BTN = document.querySelector('#tombol-masuk');
const MODAL_BODY = document.querySelector('.modal-body');
const MODAL_TITLE = document.querySelector('.modal-title');
const MODAL_FOOTER = document.querySelector('.modal-footer');
const MODAL_FORM = document.querySelector('.modal-content>form');

MASUK_BTN.addEventListener('click',function(){
    MODAL_TITLE.innerText = 'Sign in';
    MODAL_FORM.setAttribute('action','http://localhost/budakpintar/public/home/login');
    MODAL_BODY.innerHTML = `
<input type="hidden" name="id" id="id">
    <!-- Username input -->
    <div class="form-outline mb-4 mt-3">
        <input type="text" id="signin-username" class="form-control form-control-lg" name="nama_pengguna"
            placeholder="Masukkan nama pengguna" required/>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-2">
        <input type="password" id="signin-password" class="form-control form-control-lg" name="kata_sandi"
            placeholder="Masukkan kata sandi" required/>
    </div>
`
    MODAL_FOOTER.classList = 'modal-footer text-center text-lg-start d-flex justify-content-between align-items-center'
    MODAL_FOOTER.innerHTML = `
        <button type="submit" class="btn btn-primary"
            style="padding-left: 2rem; padding-right: 2rem;">Masuk</button>
        <a href="#"
            class="text-body small fw-bold">Lupa kata sandi?</a>`
});
DAFTAR_BTN.addEventListener('click',function(){

    MODAL_TITLE.innerText = 'Sign up';
    MODAL_FORM.setAttribute('action','http://localhost/budakpintar/public/home/register');
    MODAL_BODY.innerHTML = `                    
    

    <!-- Username input -->
    <div class="form-outline mb-4 mt-3">
        <input type="text" id="signup-username" class="form-control form-control-lg" name="nama_pengguna"
            placeholder="Masukkan nama pengguna" required/>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4 mt-3">
        <input type="email" id="signup-email" class="form-control form-control-lg" name="alamat_email"
            placeholder="Masukkan alamat email yang valid" required/>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-2">
        <input type="password" id="signup-password" class="form-control form-control-lg" name="kata_sandi"
            placeholder="Masukkan kata sandi" required/>
    </div>
`
MODAL_FOOTER.classList = 'modal-footer text-center text-lg-star d-flex justify-content-start align-items-center'
MODAL_FOOTER.innerHTML = `
<button type="submit" class="btn btn-primary"
    style="padding-left: 2rem; padding-right: 2rem;">Daftar</button>
`
});