
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="<?=BASEURL?>/img/welcome.jpeg" class="img-fluid" alt="Hero image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form>
                        <div
                            class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-3">
                            <p class="lead fw-normal fs-3 mb-0 me-3">Sign in</p>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-3">
                            <input type="email" id="signin-email" class="form-control form-control-lg"
                                placeholder="Masukkan alamat email yang valid" />
                            <!-- <label class="form-label" for="signin-email">Email address</label> -->
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3 mb-4">
                            <input type="password" id="signin-password" class="form-control form-control-lg"
                                placeholder="Masukkan kata sandi" />
                            <!-- <label class="form-label" for="signin-password">Password</label> -->
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <!-- <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div> -->
                            <a href="#!" class="text-body">Lupa kata sandi?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="button" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Masuk</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Belum memiliki akun? <a href="<?=BASEURL?>/logging/signup/"
                                    class="link-danger">Daftar</a></p>
                        </div>

                    </form>
                </div>
            </div>

        