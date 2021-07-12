<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12">
          <div class="content-header">My Profile</div>
        </div>
      </div>
      <div class="row">
        <div class="flash-profile" id="flash" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
      </div>
      <center>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Hello <?= $user['name']; ?></h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                  <p class="card-text">You can change your <b>fullname</b> and <b>photo</b> here but not your <b>username branch</b> and <b>email</b>.</p>
                </div>
                <?= form_open_multipart('super_admin/edit_profile'); ?>
                <div class="form-body">
                  <h6 class="mt-3"><i class="ft-eye mr-2"></i>About User</h6>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">
                          <label for="name" class="col-form-label">Full Name</label>
                        </div>
                        <div class="col-lg-10 col-9">
                          <input type="text" id="name" class="form-control" name="name" value="<?= $user['name']; ?>">
                        </div>
                        <div class="col-lg-6 col-9">
                          <?= form_error('name', '<small class="text-danger" style="padding-left:2rem;">', '</small>') ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">
                          <label for="cabang" class="col-form-label">Cabang</label>
                        </div>
                        <div class="col-lg-10 col-9">
                          <input type="text" id="cabang" class="form-control" name="cabang" value="<?= $cabang['branch_name']; ?>" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">
                          <label for="image" class="col-form-label">Photo</label>
                        </div>
                        <div class="col-lg-2 col-3">
                          <img src="<?= base_url('assets/dist/img/profile/') . $user['image']; ?>" alt="" class="img-thumbnail">
                        </div>
                        <div class="col-lg-6 col-9">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- batas atas bawah -->
                  <h6 class="mt-2"><i class="ft-info mr-2"></i>Access Info </h6>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">
                          <label for="user_id" class="col-form-label">Username</label>
                        </div>
                        <div class="col-lg-10 col-9">
                          <input type="text" id="user_id" class="form-control" name="user_id" value="<?= $user['username']; ?>" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-3">
                          <label for="email" class="col-form-label">Email</label>
                        </div>
                        <div class="col-lg-10 col-9">
                          <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <button type="submit" class="btn btn-primary mr-1"><i class="ft-check mr-2"></i>Update</button>
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