<main>
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
                            <p>Apakah kamu yakin ingin menonaktifkan akun ini?
                            <p>
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
</main>



<!-- CODINGAN ASLI  -->
<!-- <main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12 chat-app">
                <div class="d-flex flex-row justify-content-between mb-3 chat-heading-container">
                    <div class="d-flex flex-row chat-heading">
                        <a class="d-flex" href="#">
                            <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle ml-0 mr-4 list-thumbnail align-self-center small">
                        </a>
                        <div class=" d-flex min-width-zero">
                            <div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                <div class="min-width-zero">
                                    <a href="#">
                                        <p class="list-item-heading mb-1 truncate ">Sarah Kortney</p>
                                    </a>
                                    <p class="mb-0 text-muted text-small">Last seen today 01:24</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="separator mb-5"></div>

                <div class="scroll">
                    <div class="scroll-content">
                        <div class="card d-inline-block mb-3 float-left mr-2">
                            <div class="position-absolute pt-1 pr-2 r-0">
                                <span class="text-extra-small text-muted">09:25</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row pb-2">
                                    <a class="d-flex" href="#">
                                        <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                    </a>
                                    <div class=" d-flex flex-grow-1 min-width-zero">
                                        <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                            <div class="min-width-zero">
                                                <p class="mb-0 truncate list-item-heading">Sarah Kortney</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="chat-text-left">
                                    <p class="mb-0 text-semi-muted">
                                        What do you think about our plans for this product launch?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="card d-inline-block mb-3 float-left mr-2">
                            <div class="position-absolute pt-1 pr-2 r-0">
                                <span class="text-extra-small text-muted">09:28</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row pb-2">
                                    <a class="d-flex" href="#">
                                        <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                    </a>
                                    <div class=" d-flex flex-grow-1 min-width-zero">
                                        <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                            <div class="min-width-zero">
                                                <p class="mb-0 truncate list-item-heading">Sarah Kortney</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="chat-text-left">
                                    <p class="mb-0 text-semi-muted">
                                        It looks to me like you have a lot planned before your deadline. I would
                                        suggest you push your deadline back so you have
                                        time to run a successful advertising campaign.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="card d-inline-block mb-3 float-left mr-2">
                            <div class="position-absolute pt-1 pr-2 r-0">
                                <span class="text-extra-small text-muted">09:30</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row pb-2">
                                    <a class="d-flex" href="#">
                                        <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                    </a>
                                    <div class="d-flex flex-grow-1 min-width-zero">
                                        <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                            <div class="min-width-zero">
                                                <p class="mb-0 truncate list-item-heading">Sarah Kortney</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="chat-text-left">
                                    <p class="mb-0 text-semi-muted">
                                        How do you think we should move forward with this project? As you know, we
                                        are
                                        expected to present it to our clients next
                                        week. </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="card d-inline-block mb-3 float-right  mr-2">
                            <div class="position-absolute pt-1 pr-2 r-0">
                                <span class="text-extra-small text-muted">09:41</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row pb-2">
                                    <a class="d-flex" href="#">
                                        <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                    </a>
                                    <div class="d-flex flex-grow-1 min-width-zero">
                                        <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                            <div class="min-width-zero">
                                                <p class="mb-0 list-item-heading truncate">Mimi Carreira</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="chat-text-left">
                                    <p class="mb-0 text-semi-muted">
                                        I would suggest you discuss this further with the advertising team.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="card d-inline-block mb-3 float-right  mr-2">
                            <div class="position-absolute pt-1 pr-2 r-0">
                                <span class="text-extra-small text-muted">09:41</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row pb-2">
                                    <a class="d-flex" href="#">
                                        <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                    </a>
                                    <div class="d-flex flex-grow-1 min-width-zero">
                                        <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                            <div class="min-width-zero">
                                                <p class="mb-0 list-item-heading truncate">Mimi Carreira</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="chat-text-left">
                                    <p class="mb-0 text-semi-muted">
                                        I am very busy at the moment and on top of everything, I forgot my umbrella
                                        today.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="card d-inline-block mb-3 float-right mr-2">
                            <div class="position-absolute pt-1 pr-2 r-0">
                                <span class="text-extra-small text-muted">09:41</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row pb-2">
                                    <a class="d-flex" href="#">
                                        <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                    </a>
                                    <div class="d-flex flex-grow-1 min-width-zero">
                                        <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                            <div class="min-width-zero">
                                                <p class="mb-0 list-item-heading truncate">Mimi Carreira</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="chat-text-left">
                                    <p class="mb-0 text-semi-muted">
                                        I am very busy at the moment and on top of everything, I forgot my umbrella
                                        today.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="app-menu">
        <ul class="nav nav-tabs card-header-tabs ml-0 mr-0 mb-1" role="tablist">
            <li class="nav-item w-50 text-center">
                <a class="nav-link active" id="first-tab" data-toggle="tab" href="#firstFull" role="tab" aria-selected="true">Messages</a>
            </li>
            <li class="nav-item w-50 text-center">
                <a class="nav-link" id="second-tab" data-toggle="tab" href="#secondFull" role="tab" aria-selected="false">Contacts</a>
            </li>
        </ul>

        <div class="p-4 h-100">
            <div class="form-group">
                <input type="text" class="form-control rounded" placeholder="Search">
            </div>
            <div class="tab-content h-100">
                <div class="tab-pane fade show active  h-100" id="firstFull" role="tabpanel" aria-labelledby="first-tab">

                    <div class="scroll">

                        <div class="d-flex flex-row mb-1 border-bottom pb-3 mb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class=" mb-0 truncate">Sarah Kortney</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small">14:20</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex flex-row mb-1 border-bottom pb-3 mb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-2.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class=" mb-0 truncate">Rasheeda Vaquera</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small">11:10</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-1 border-bottom pb-3 mb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-3.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class=" mb-0 truncate">Shelia Otterson</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small">09:50</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-1  pb-3 mb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class=" mb-0 truncate">Latarsha Gama</p>
                                        </a>
                                        <p class="mb-1 text-muted text-small">09:10</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade  h-100" id="secondFull" role="tabpanel" aria-labelledby="second-tab">
                    <div class="scroll">

                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Sarah Kortney</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-2.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Williemae Lagasse</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-3.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Tommy Nash</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Mayra Sibley</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-5.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Kathryn Mengel</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-2.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Williemae Lagasse</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-3.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Tommy Nash</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Mayra Sibley</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-3.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Tommy Nash</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Mayra Sibley</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-5.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Kathryn Mengel</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-2.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Williemae Lagasse</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-3.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Tommy Nash</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3 pb-3">
                            <a class="d-flex" href="#">
                                <img alt="Profile Picture" src="<?= base_url() ?>assets/img/profiles/l-4.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="mb-0 truncate">Mayra Sibley</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <a class="app-menu-button d-inline-block d-xl-none" href="#">
            <i class="simple-icon-options"></i>
        </a>
    </div>

    <div class="chat-input-container d-flex justify-content-between align-items-center">
        <input class="form-control flex-grow-1" type="text" placeholder="Say something...">
        <div>
            <button type="button" class="btn btn-outline-primary icon-button large">
                <i class="simple-icon-paper-clip"></i>
            </button>
            <button type="button" class="btn btn-primary icon-button large">
                <i class="simple-icon-arrow-right"></i>
            </button>

        </div>
    </div>
</main> -->