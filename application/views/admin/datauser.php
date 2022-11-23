<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data User</h1>

    <!-- /.container-fluid -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formTambah"><i class="fas fa-plus"></i> Tambah</button>
            </div>
            <div class="row mb-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Tipe Pengguna</th>
                                <th>Membership</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($member as $row) : ?>
                                <tr>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo $row->name ?></td>
                                    <td><?php echo $row->email ?></td>
                                    <td><?php echo $row->role ?></td>
                                    <td><?php echo $row->status ?></td>
                                    <?php if ($row->is_active == 1) { ?>
                                        <td><span class="badge badge-pill badge-success">Aktif</span></td>
                                    <?php } else { ?>
                                        <td><span class="badge badge-pill badge-danger">Tidak Aktif</span></td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($row->is_active == 1) { ?>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formDeactivate<?= $row->id; ?>"><i class="fas fa-lock"></i> Nonaktifkan</button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formActivate<?= $row->id; ?>"><i class="fas fa-lock-open"></i> Aktifkan</button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#formDelete<?= $row->id; ?>"><i class="far fa-trash-alt"></i> Hapus</button>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#formEdit<?= $row->id; ?>"><i class="fas fa-edit"></i> Edit</button>
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


<!-- Modal Add User -->
<form class="user" method="post" action="<?= base_url('Admin/Datauser/registration'); ?>">
    <div class="modal hide fade" id="formTambah" tabindex="-1" role="dialog" aria-labelledby="formTambah" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hasilModal">Form Tambah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="role" id="role">
                            <option selected disabled hidden>Pilih Tipe Pengguna</option>
                            <option value="1">Admin</option>
                            <option value="2">Member</option>
                            <option value="3">Operator</option>
                        </select>
                        <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group" id="membershipDiv">
                        <select class="form-control" name="membership" id="membership">
                            <option selected disabled hidden>Pilih Membership</option>
                            <option value="1">Percobaan</option>
                            <option value="2">Bulanan</option>
                            <option value="3">Tahunan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" value="Add">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php foreach ($member as $row) : ?>
    <!-- Modal Edit User-->
    <form class="user" method="post" action="<?= base_url('Admin/Datauser/edit'); ?>">
        <div class="modal fade" id="formEdit<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="formEdit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hasilModal">Form Edit</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $row->id; ?>" name="id" id="id" class="form-control">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $row->name; ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $row->email; ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="role" id="role">
                                <option selected disabled hidden>Pilih Tipe Pengguna</option>
                                <option value="1" <?php if ($row->role_id == 1) echo 'selected="selected"'; ?>>Admin</option>
                                <option value="2" <?php if ($row->role_id == 2) echo 'selected="selected"'; ?>>Member</option>
                                <option value="3" <?php if ($row->role_id == 3) echo 'selected="selected"'; ?>>Operator</option>
                            </select>
                            <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group" id="membershipDiv">
                            <select class="form-control" name="membership" id="membership">
                                <option selected disabled hidden>Choose Membership</option>
                                <option value="1" <?php if ($row->membership == 1) echo 'selected="selected"'; ?>>Percobaan</option>
                                <option value="2" <?php if ($row->membership == 2) echo 'selected="selected"'; ?>>Bulanan</option>
                                <option value="3" <?php if ($row->membership == 3) echo 'selected="selected"'; ?>>Tahunan</option>
                                <option value="3" <?php if ($row->membership == 4) echo 'selected="selected"'; ?>>Admin/Operator</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" value="Edit">Edit</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>

<?php foreach ($member as $row) : ?>
    <!-- Modal Delete User-->
    <form class="user" method="post" action="<?= base_url('Admin/Datauser/delete'); ?>">
        <div class="modal fade" id="formDelete<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="formDelete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hasilModal">Hapus?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $row->id; ?>" name="id" id="id" class="form-control">
                        <p>Apakah anda yakin menghapus data user ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" value="Delete">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>

<?php foreach ($member as $row) : ?>
    <!-- Modal Deactivate User-->
    <form class="user" method="post" action="<?= base_url('Admin/Datauser/deactivate'); ?>">
        <div class="modal fade" id="formDeactivate<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="formDelete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hasilModal">Nonaktifkan akun ini?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $row->id; ?>" name="id" id="id">
                        <input type="hidden" value="0" name="is_active" id="is_active">
                        <p>Apakah kamu yakin ingin menonaktifkan akun ini?<p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning" value="Nonactive">Nonaktifkan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>

<?php foreach ($member as $row) : ?>
    <!-- Modal Activate User-->
    <form class="user" method="post" action="<?= base_url('Admin/Datauser/activate'); ?>">
        <div class="modal fade" id="formActivate<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="formDelete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hasilModal">Aktivasi akun ini?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $row->id; ?>" name="id" id="id">
                        <input type="hidden" value="1" name="is_active" id="is_active">
                        <p>Apakah anda yakin untuk mengaktifkan data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" value="Activate">Aktivasi</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>


<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<script type="text/javascript">
    $("#role").change(function() {
        if ($(this).val() == "2") {
            $('#membershipDiv').show();
            $('#membership').attr('required', '');
            $('#membership').attr('data-error', 'This field is required');
        } else {
            $('#membershipDiv').hide();
            $('#membership').removeAttr('required');
            $('#membership').removeAttr('data-error');
        }
    });
    $("#role").trigger("change");
</script>