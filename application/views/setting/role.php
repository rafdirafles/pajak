<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper"><div class="row">
<div class="col-12">
<div class="content-header"><?= $title  ?></div>
<p class="content-sub-header mb-1">You can add edit and delete <b>role</b> in this page</p>
</div>
</div>
<!--Hoverable Rows Starts-->
<section id="hoverable-rows">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">ROLE USER</h4>
          <div class="row">
            <div class="flash-role" data-flashrole="<?= $this->session->flashdata('message'); ?>"></div>
            <?php
              $message = $this->session->flashdata('message');
              if (isset($message)) {
                  $this->session->unset_userdata('message');
              }
            ?>
          </div>
        </div>
        <div class="card-content">
          <div class="card-body">
            <button href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalNewRole">Add new role</button>
            <div class="table-responsive">
              <table class="table table-hover m-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role ID</th>
                    <th scope="col">Role Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach ($role as $r) : ?>
                  <tr>
                    <td><?=  $i++; ?></td>
                    <td><?=  $r['role_id']?></td>
                    <td><?=  $r['role_name']?></td>
                    <td>
                      <a href="<?= base_url('setting/roleaccess/') . $r['role_id'] ?>" class="warning p-0"><i class="ft-sliders font-medium-3 mr-2 "></i></a>
                      <a href="" class="success p-0" data-toggle="modal" data-target="#EditRole<?= $r['id']; ?>"><i class="ft-edit-2 font-medium-3 mr-2"></i></a>
                      <a href=" <?= base_url('setting/hapusRole/') ?><?= $r['id']; ?>" class="tombol-hapus-role danger p-0"><i class="ft-x-circle font-medium-3"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Hoverable rows Ends-->
</div>
</div>
<!-- END : End Main Content-->

<!-- Modalbox Add new role-->
<div class="modal fade text-left" id="ModalNewRole" tabindex="-1" role="dialog" aria-labelledby="ModalNewRoleLabel8"
    aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title" id="ModalNewRoleLabel8"><i class="ft-plus-square mr-2"></i>Add new role</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
        </button>
      </div>
      <form class="" action="<?= base_url('setting/role'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Role id: </label>
            <input type="text" class="form-control" id="role_id" name="role_id" placeholder="Input role id" required>
          </div>
          <div class="form-group">
            <label>Role name: </label>
            <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Input role name" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-light-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<?php foreach ($role as $r) : ?>
<div class="modal fade text-left" id="EditRole<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditRoleLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title" id="EditRoleLabel"><i class="ft-edit-2 mr-2"></i>Edit Role</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
        </button>
      </div>
      <form class="" action="<?= base_url('setting/editRole'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
          <label>Role id: </label>
            <input type="hidden" name="id" id="id" value="<?= $r['id']; ?>">
            <input type="text" class="form-control" name="role_id" id="role_id" value="<?= $r['role_id']; ?>" required>
          </div>
          <div class="form-group">
          <label>Role name: </label>
            <input type="text" class="form-control" id="role_name" name="role_name" value="<?= $r['role_name'] ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-light-success" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
