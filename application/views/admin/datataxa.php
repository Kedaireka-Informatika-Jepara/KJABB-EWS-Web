<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Family Biotic</h1>
    <p class="mb-4"><a target="_blank" href="https://datatables.net"></a></p>

    <!-- /.container-fluid -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formTambah"><i class="fas fa-plus"></i> Add</button>
            </div>
            <div class="row mb-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Family</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($family as $row) : ?>
                                <tr>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo $row->family ?></td>
                                    <td><?php echo $row->bobot ?></td>
                                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#formDelete<?= $row->id; ?>"><i class="far fa-trash-alt"></i> Delete</button>
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
<!-- Modal Add Data -->
<form class="user" method="post" action="<?= base_url('Admin/Datataxa/add'); ?>">
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
                        <input type="text" class="form-control" id="family" name="family" placeholder="Family">
                        <?= form_error('family', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="bobot" name="bobot" placeholder="Bobot" step="0.01">
                        <?= form_error('bobot', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" value="Add">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php foreach ($family as $row) : ?>
    <!-- Modal Edit User-->
    <form class="user" method="post" action="<?= base_url('Admin/Datataxa/edit'); ?>">
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
                            <input type="text" class="form-control" id="family" name="family" placeholder="Family" value="<?= $row->family; ?>">
                            <?= form_error('family', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="bobot" name="bobot" placeholder="Bobot" step="0.01" value="<?= $row->bobot; ?>">
                            <?= form_error('bobot', '<small class="text-danger">', '</small>'); ?>
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

<?php foreach ($family as $row) : ?>
    <!-- Modal Delete User-->
    <form class="user" method="post" action="<?= base_url('Admin/Datataxa/delete'); ?>">
        <div class="modal fade" id="formDelete<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="formDelete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hasilModal">Delete?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $row->id; ?>" name="id" id="id" class="form-control">
                        <p>Are you sure want to delete this data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" value="Delete">Delete</button>
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