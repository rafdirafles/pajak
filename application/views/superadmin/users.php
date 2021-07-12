<div class="main-panel">
    <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="content-header"><?= $title ?></div>
                </div>
            </div>
            <section id="file-export">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Users</h4>
                            </div>
                            <div class="row">
                                <div class="flash-datausers" data-flashdatausers="<?= $this->session->flashdata('message'); ?>"></div>
                                <?php
                                $message = $this->session->flashdata('message');
                                if (isset($message)) {
                                    $this->session->unset_userdata('message');
                                }
                                ?>
                            </div>
                            <div class="card-content ">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-10">
                                            <p>Anda dapat menambahkan data user di halaman ini.</p>
                                        </div>
                                        <div class="col-2">
                                            <button href="" class="btn btn-secondary mb-1" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#ModalNewUser">Tambah User</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped tabel_export_users">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Cabang</th>
                                                    <th>Role</th>
                                                    <th>Is Active</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data_pegawai as $dp) : ?>
                                                    <tr>
                                                        <td><?= $dp['nik'] ?></td>
                                                        <td><?= $dp['name'] ?></td>
                                                        <td><?= $dp['email'] ?></td>
                                                        <td><?= $dp['branch_name'] ?> </td>
                                                        <td><?= $dp['role_name'] ?> </td>
                                                        <td>
                                                            <div class="form-check" style="padding-left:2.25rem;">
                                                                <input class="form-check-active" type="checkbox" <?= check_active($dp['username']); ?> data-user="<?= $dp['username']; ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="" class="success p-0" data-toggle="modal" data-target="#EditMenu<?= $alat['id']; ?>"><i class="ft-edit-2 font-medium-3 mr-2"></i></a>
                                                            <a href=" <?= base_url('admin/hapusAlat/') ?><?= $alat['id']; ?>" class="tombol-hapus danger p-0"><i class="ft-x-circle font-medium-3"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Nik</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Cabang</th>
                                                    <th>Role</th>
                                                    <th>Is Active</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- File export table -->

    <!-- Modalbox Add new menu-->
    <div class="modal fade text-left" id="ModalNewUser" tabindex="-1" role="dialog" aria-labelledby="ModalNewUserLabel8" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h4 class="modal-title" id="ModalNewUserLabel8"><i class="ft-user-plus mr-2"></i>Tambah User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                    </button>
                </div>
                <form class="" action="<?= base_url('super_admin/tambah_user'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NIK:</label>
                            <input type="number" class="form-control" id="nik" name="nik" placeholder="Input nik" value="<?= set_value('nik'); ?>">
                            <?= form_error('nik', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>NAMA:</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Input nama" value="<?= set_value('nama'); ?>">
                            <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>USERNAME:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Input username" value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>EMAIL:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Input email" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>PASSWORD: </label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Input password">
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>Role :</label>
                            <select class="select2 form-control" name="role" id="role" data-live-search="true">
                                <option value="">Pilih Role</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                                <option value="3">Kantor Pusat</option>
                                <option value="4">Cabang</option>
                            </select>
                            <?= form_error('role', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>Cabang :</label>
                            <select class="select2 form-control" name="branch_id" id="branch_id" data-live-search="true">
                                <option value="">Pilih Cabang</option>
                                <?php foreach ($mst_branch as $row) : ?>
                                    <option value="<?= $row['branch_id']; ?>"><?= $row['branch_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('branch_id', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-light-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END : Modalbox Add new menu-->