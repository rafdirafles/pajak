<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper"><div class="row">
<div class="col-12">
<div class="content-header"><?= $title  ?></div>
<p class="content-sub-header mb-1">You can add edit and delete <b>menu</b> in this page</p>
</div>
</div>
<!--Hoverable Rows Starts-->
<section id="hoverable-rows">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">MAIN MENU</h4>
          <div class="row">
            <div class="flash-menu" data-flashmenu="<?= $this->session->flashdata('message'); ?>"></div>
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
            <button href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalNewMenu">Add new menu</button>
            <div class="table-responsive">
              <table class="table table-hover m-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach ($menu as $m) : ?>
                  <tr>
                    <td><?=  $i++; ?></td>
                    <td><?=  $m['menu']?></td>
                    <td><?=  $m['icons']?></td>
                    <td>
                      <a href="" class="success p-0" data-toggle="modal" data-target="#EditMenu<?= $m['id']; ?>"><i class="ft-edit-2 font-medium-3 mr-2"></i></a>
                      <a href=" <?= base_url('setting/hapusMenu/') ?><?= $m['id']; ?>" class="tombol-hapus danger p-0"><i class="ft-x-circle font-medium-3"></i></a>
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

<!-- Modalbox Add new menu-->
<div class="modal fade text-left" id="ModalNewMenu" tabindex="-1" role="dialog" aria-labelledby="ModalNewMenuLabel8"
    aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title" id="ModalNewMenuLabel8"><i class="ft-plus-square mr-2"></i>Add new menu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
        </button>
      </div>
      <form class="" action="<?= base_url('setting/menu'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Menu name: </label>
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Input menu name ex.menu_pelanggan" required>
          </div>
          <div class="form-group">
             <label>icon: </label>
             <input type="text" class="form-control" id="icon" name="icon" placeholder="Input icon name ex.headphones" required>
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
<?php foreach ($menu as $m) : ?>
<div class="modal fade text-left" id="EditMenu<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditMenuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title" id="EditMenuLabel"><i class="ft-edit-2 mr-2"></i>Edit Menu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
        </button>
      </div>
      <form class="" action="<?= base_url('setting/editMenu'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id" id="id" value="<?= $m['id']; ?>">
            <label>Menu name: </label>
            <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu']; ?>" required>
          </div>
          <div class="form-group">
             <label>icon: </label>
             <?php $data = explode("-",$m['icons']) ?>
             <input type="text" class="form-control" id="icon" name="icon" value="<?= $data[1]; ?>" required>
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
