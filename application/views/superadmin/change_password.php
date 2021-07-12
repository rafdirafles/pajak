<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12">
          <div class="content-header">Change Password</div>
        </div>
      </div>
      <div class="row">
        <div class="flash-password" id="flash" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
      </div>
      <center>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Hello <?= $user['username']; ?></h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                  <p class="card-text">You can change your <b>password</b> here.</p>
                </div>
                <form action="<?= base_url('super_admin/change_password') ?>" method="post" class="form group pl-3 ">
                  <div class="form-body">
                    <h6 class="mt-3"><i class="ft-unlock mr-2"></i>Password</h6>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-2 col-3">
                            <label for="current_password" class="col-form-label">Current Password</label>
                          </div>
                          <div class="col-lg-10 col-9">
                            <input type="password" id="current_password" class="form-control" name="current_password">
                          </div>
                          <div class="col-lg-4 col-9">
                            <?= form_error('current_password', '<small class="text-danger">', '</small>') ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-2 col-3">
                            <label for="new_password1" class="col-form-label">New Password</label>
                          </div>
                          <div class="col-lg-10 col-9">
                            <input type="password" id="new_password1" class="form-control" name="new_password1">
                          </div>
                          <div class="col-lg-4 col-9">
                            <?= form_error('new_password1', '<small class="text-danger">', '</small>') ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-2 col-3">
                            <label for="new_password2" class="col-form-label">Repeat Password</label>
                          </div>
                          <div class="col-lg-10 col-9">
                            <input type="password" id="new_password2" class="form-control" name="new_password2">
                          </div>
                          <div class="col-lg-4 col-9">
                            <?= form_error('new_password2', '<small class="text-danger">', '</small>') ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary mr-1"><i class="ft-check mr-2"></i>Change</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </center>
    </div>



    <!-- Tutup content wrapper -->
  </div>
</div>
<!-- END : End Main Content-->