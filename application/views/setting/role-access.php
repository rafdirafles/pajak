<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper"><div class="row">
<div class="col-12">
<div class="content-header" style="display:none;"><?= $title  ?></div>
<div class="content-header"><?= $title2  ?></div>
<p class="content-sub-header mb-1">You can add edit and delete <b>role</b> in this page</p>
</div>
</div>
<!--Hoverable Rows Starts-->
<section id="hoverable-rows">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">EDIT ACCESS</h4>
          <div class="row">
            <div class="flash-roleaccess" data-flashroleaccess="<?= $this->session->flashdata('message'); ?>"></div>
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
            <div class="table-responsive">
              <h5>Role : <?= $role['role_name'] ?></h5>
              <table class="table table-hover m-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Access</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach ($menu as $m) : ?>
                  <tr>
                    <td><?=  $i++; ?></td>
                    <td><?=  $m['menu']?></td>
                    <td>
                      <div class="form-check" style="padding-left:2.25rem;">
                        <input class="form-check-input" type="checkbox" <?= check_access($role['role_id'], $m['id']); ?>
                        data-role="<?= $role['role_id']; ?>" data-menu="<?= $m['id']; ?>">
                      </div>
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
