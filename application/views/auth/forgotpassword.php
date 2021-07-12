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
                                                <h4 class="mb-2 card-title">Recover Password</h4>
                                                <p class="card-text mb-3">Please enter your email address and we'll send you link to reset your password.</p>
                                                <?= $this->session->flashdata('message'); ?>
                                                <form action="<?= base_url('auth/forgotPassword'); ?>" method="post">
                                                    <div class="input-group ">
                                                        <input class="form-control" type="text" id="email" name="email" placeholder="Masukkan email anda" value="<?= set_value('email'); ?>">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-fw fa-envelope"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                                    <div class="d-flex flex-sm-row flex-column justify-content-between pt-3">
                                                        <button type="submit" class="btn btn-primary mb-2 mb-sm-0">Recover</button>
                                                        <a href="<?php echo base_url('auth'); ?>" class="btn bg-light-primary ml-sm-1">Back To Login</a>
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
