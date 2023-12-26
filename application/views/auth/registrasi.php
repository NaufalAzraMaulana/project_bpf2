<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Buat Akun</h2>
                    <form method="POST" class="register-form" id="register-form"
                        action="<?= base_url('auth/do_register'); ?>">
                        <div class="form-group">
                            <label for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="nama" value="<?= set_value('nama'); ?>" id="nama" placeholder="Nama Lengkap" />
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" value="<?= set_value('email'); ?>" id="email" placeholder="Alamat Email" />
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" value="<?= set_value('password'); ?>" id="password" placeholder="Password" />
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="re_pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" value="<?= set_value('re_pass'); ?>" id="re_pass" placeholder="Ulangi Password" />
                            <?= form_error('re_pass', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="<?= base_url('asset_login/'); ?>registration/images/signup-image.jpg"
                            alt="sing up image">
                    </figure>
                    <a href="<?= base_url('Auth'); ?>" class="signup-image-link">Sudah memiliki akun? Login</a>
                </div>
            </div>
        </div>
    </section>
</div>