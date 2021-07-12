<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">
    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <!--Forgot Password Starts-->
                <section id="forgot-password" class="auth-height">
                    <div class="row full-height-vh m-0 d-flex align-items-center justify-content-center">
                        <div class="col-md-7 col-12">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="card-body auth-img">
                                        <div class="row m-0">
                                            <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
                                                <img src="<?= base_url('assets/') ?>img/gallery/login.png" alt="" class="img-fluid" width="260" height="230">
                                            </div>
                                            <div class="col-lg-6 col-md-12 px-4 py-3">
                                                <h4 class="mb-2 card-title">Change Password</h4>
                                                <p class="login-box-msg" style="padding-bottom:0px;">Type your new password for :</p>
                                                <p class="login-box-msg" style="padding-bottom:0px;"><?= $this->session->userdata('reset_email') ?></p>
                                                <form action="<?= base_url('auth/changepassword'); ?>" method="post">
                                                    <div class="input-group pt-1">
                                                        <input type="password" name="password1" id="password1" class="form-control" placeholder="Masukkan Password baru">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-fw fa-lock"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group pt-3">
                                                        <input class="form-control" type="password" id="password2" name="password2" placeholder="Masukkan ulang password baru">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-fw fa-lock"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                                                    <div class="d-flex flex-sm-row flex-column justify-content-between pt-3">
                                                        <button type="submit" class="btn btn-primary ml-sm-1">Change Password</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Forgot Password Ends-->

            </div>
        </div>
        <!-- END : End Main Content-->
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
