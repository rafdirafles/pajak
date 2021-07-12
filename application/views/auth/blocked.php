<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">
    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <!--Error page starts-->
                <section id="error" class="auth-height">
                    <div class="container-fluid">
                        <div class="row full-height-vh">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="<?= base_url('assets/') ?>img/gallery/error.png" alt="" class="img-fluid error-img mt-2" height="300" width="400">
                                        <h1 class="mt-4 text-danger">403 - Access Forbidden!</h1>
                                        <div class="w-75 error-text mx-auto mt-4">
                                            <p>The page you are looking for is unavailable for you.</p>
                                            <?php $role_id = $this->session->userdata('role_id'); ?>
                                        </div>
                                        <a class="btn btn-warning my-2" href="<?php if ($role_id == "1") : ?><?= base_url('super_admin') ?>">
                                        <?php elseif ($role_id == "2") : ?><?= base_url('admin') ?>">
                                        <?php elseif ($role_id == "3") : ?><?= base_url('pusat') ?>">
                                        <?php elseif ($role_id == "4") : ?><?= base_url('cabang') ?>">
                                        <?php endif; ?>
                                        Back To Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Error page ends-->

            </div>
        </div>
        <!-- END : End Main Content-->
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
