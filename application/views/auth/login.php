<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">
    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <!--Login Page Starts-->
                <section id="login" class="auth-height">
                    <div class="row full-height-vh m-0">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="card-body auth-img">
                                        <div class="row m-0">
                                            <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
                                                <img src="<?= base_url('assets/') ?>img/gallery/login.png" alt="" class="img-fluid" width="300" height="230">
                                            </div>
                                            <div class="col-lg-6 col-12 px-4 py-3">
                                                <center>
                                                    <img style="width: 40%;" src="<?= base_url('assets/') ?>img/logos/nts.png" />
                                                </center>
                                                <hr>
                                                <p>Welcome, please login to continue.</p>
                                                <?= $this->session->flashdata('message'); ?>
                                                <form action="<?= base_url('auth') ?>" method="post">
                                                    <div class="input-group">
                                                        <input type="text" autofocus name="username" id="username" class="form-control" placeholder="Input Username atau Email" value="<?= set_value('username'); ?>">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-fw fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                                    <div class="input-group mt-2">
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="Input Password">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-fw fa fa-lock"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                                    <div class="d-sm-flex justify-content-between mb-3 font-small-2 pt-1">
                                                        <a href="<?= base_url(); ?>auth/forgotpassword"> <b>Forgot Password ?</b></a>
                                                    </div>
                                                    <center>
                                                        <button type="submit" class="btn btn-primary btn-block mb-sm-1">L O G I N</button>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Login Page Ends-->
            </div>
        </div>
        <!-- END : End Main Content-->
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->