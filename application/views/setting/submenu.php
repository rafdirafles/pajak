<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper"><div class="row">
<div class="col-12">
<div class="content-header"><?= $title  ?></div>
<p class="content-sub-header mb-1">You can add edit and delete <b>sub-menu</b> in this page</p>
</div>
</div>
<!--Hoverable Rows Starts-->
<section id="hoverable-rows">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> SUB MENU </h4>
          <div class="row">
            <div class="flash-submenu" data-flashsubmenu="<?= $this->session->flashdata('message'); ?>"></div>
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
            <button href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewSubmenuModal">Add new sub menu</button>
              <table class="table table-hover m-0">
                <thead>
                  <tr>
                    <th scope="col" style="padding-right: 1rem;padding-left: 1rem;">#</th>
                    <th scope="col" style="padding-right: 1rem;padding-left: 1rem;">Title</th>
                    <th scope="col" style="padding-right: 1rem;padding-left: 1rem;">Menu Parent</th>
                    <th scope="col" style="padding-right: 1rem;padding-left: 1rem;">Link</th>
                    <th scope="col" style="padding-right: 1rem;padding-left: 1rem;">Icon</th>
                    <th scope="col" style="padding-right: 1rem;padding-left: 1rem;">Active</th>
                    <th scope="col" style="padding-right: 1rem;padding-left: 1rem;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach ($submenu as $sm) : ?>
                  <tr>
                    <td style="padding-right: 1rem;padding-left: 1rem;"><?=  $i++; ?></td>
                    <td style="padding-right: 1rem;padding-left: 1rem;"><?=  $sm['title']?></td>
                    <td style="padding-right: 1rem;padding-left: 1rem;"><?=  $sm['menu']?></td>
                    <td style="padding-right: 1rem;padding-left: 1rem;"><?=  $sm['link']?></td>
                    <td style="padding-right: 1rem;padding-left: 1rem;"><?=  $sm['icon']?></td>
                    <td style="padding-right: 1rem;padding-left: 1rem;"><?=  $sm['is_active']?></td>
                    <td style="padding-right: 1rem;padding-left: 1rem;">
                      <a href="" class="success p-0" data-toggle="modal" data-target="#Editsubmenu<?= $sm['id']; ?>"><i class="ft-edit-2 font-medium-3 mr-2"></i></a>
                      <a href=" <?= base_url('setting/hapusSubmenu/') ?><?= $sm['id']; ?>" class="tombol-hapus-submenu danger p-0"><i class="ft-x-circle font-medium-3"></i></a>
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
</section>
<!--Hoverable rows Ends-->
</div>
</div>
<!-- END : End Main Content-->

<!-- Modalbox Add new submenu-->
<div class="modal fade text-left" id="NewSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="NewSubmenuModalLabel8"
    aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title" id="NewSubmenuModalLabel8"><i class="ft-plus-square mr-2"></i>Add new sub menu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
        </button>
      </div>
      <form class="" action="<?= base_url('setting/submenu'); ?>" method="post">
        <div class="modal-body">
          <label for="title">Title:</label>
          <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Input sub menu title" required >
          </div>
          <div class="form-group">
            <label for="menu">Menu Parent:</label>
            <select class="form-control" name="menu_id" id="menu_id" required>
              <option>Select Menu</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= str_replace('_', ' ', $m['menu']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="link">link:</label>
            <input type="text" class="form-control" id="link" name="link" placeholder="Input sub menu link with format (parent_menu/title)" required >
          </div>
          <div class="form-group">
            <label for="icon">icon:</label>
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Input Icon name ex.folder-open" required >
          </div>
          <div class="form-group">
            <input type="checkbox" value="1" name="is_active" id="is_active" aria-label="Checkbox for following text input" for="is_active" checked> Active ?
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
<?php foreach ($submenu as $sm) : ?>
<div class="modal fade text-left" id="Editsubmenu<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditsubmenuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title" id="EditsubmenuLabel"><i class="ft-edit-2 mr-2"></i>Edit Sub menu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
        </button>
      </div>
      <form class="" action="<?= base_url('setting/editSubmenu'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id" id="id" value="<?= $sm['id']; ?>">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>" required>
          </div>
          <div class="form-group">
            <label for="menu">Menu Parent:</label>
            <select class="form-control" name="menu_id" id="menu_id">
              <?php foreach ($menu as $m) : ?>
                <?php if( $m['id'] == $sm['menu_id']) : ?>
                  <option value="<?= $m['id']; ?>" selected><?= str_replace('_', ' ', $m['menu']); ?></option>
                <?php else : ?>
                  <option value="<?= $m['id']; ?>"><?= str_replace('_', ' ', $m['menu']); ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="link">link:</label>
            <input type="text" class="form-control" id="link" name="link" value="<?= $sm['link']; ?>" required>
          </div>
          <div class="form-group">
            <label for="icon">icon:</label>
            <?php  $data = explode("-",$sm['icon']) ?>
            <input type="text" class="form-control" id="icon" name="icon" value="<?= $data[2]; ?>" required>
          </div>
          <div class="form-group">
            <input type="checkbox" value="1" name="is_active" id="is_active" aria-label="Checkbox for following text input" for="is_active" checked> Active ?
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
