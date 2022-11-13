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
    <h1 class="h3 mb-4 text-gray-800">Data Weights: Additional Abiotic</h1>
    <p class="mb-4"><a target="_blank" href="https://datatables.net"></a></p>

    <!-- /.container-fluid -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-3">
                <form class="redirect form-inline" method="post" action="<?= base_url('Admin/Dataweight/redirect'); ?>">
                    <div class="form-group">
                        <label class="col-form-label" for="redirect">Type of Parameters:</label>
                        <select name="redirect" id="redirect" class="form-control ml-2 mr-sm-2">
                            <option value="index">Index Biotic</option>
                            <option value="main">Main Abiotic</option>
                            <option value="add" selected>Additional Abiotic</option>
                        </select>
                        <button type="submit" class="btn btn-light mx-auto ml-2" value="redirect">Detail</button>
                    </div>
                </form>
            </div>
            <div class="row mb-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formTambah"><i class="fas fa-plus"></i> Add</button>
            </div>
            <div class="row mb-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Nilai Awal</th>
                                <th>Nilai Akhir</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($biotic as $row) : ?>
                                <tr>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo $row->name ?></td>
                                    <td><?php echo $row->nilai_awal ?></td>
                                    <td><?php echo $row->nilai_akhir ?></td>
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
<form class="user" method="post" action="<?= base_url('Admin/Dataadd/add'); ?>">
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
                        <select class="form-control" name="name" id="name">
                            <option selected disabled hidden>Choose Parameter</option>
                            <option value="Clay">Clay</option>
                            <option value="Conductivity">Conductivity</option>
                            <option value="Kekeruhan">Kekeruhan</option>
                            <option value="Ratio CN">Ration CN</option>
                            <option value="Sand">Sand</option>
                            <option value="Silt">Silt</option>
                            <option value="Turbidity">Turbidity</option>
                        </select>
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="nilai_awal" name="nilai_awal" placeholder="Nilai Awal" step="0.01">
                        <?= form_error('nilai_awal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="nilai_akhir" name="nilai_akhir" placeholder="Nilai Akhir" step="0.01">
                        <?= form_error('nilai_akhir', '<small class="text-danger">', '</small>'); ?>
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

<?php foreach ($biotic as $row) : ?>
    <!-- Modal Edit User-->
    <form class="user" method="post" action="<?= base_url('Admin/Dataadd/edit'); ?>">
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
                            <select class="form-control" name="name" id="name">
                                <option selected disabled hidden>Choose Parameter</option>
                                <option value="Clay" <?php if ($row->name == 'Clay') echo 'selected="selected"'; ?>>Clay</option>
                                <option value="Conductivity" <?php if ($row->name == 'Conductivity') echo 'selected="selected"'; ?>>Conductivity</option>
                                <option value="Kekeruhan" <?php if ($row->name == 'Kekeruhan') echo 'selected="selected"'; ?>>Kekeruhan</option>
                                <option value="Ratio CN" <?php if ($row->name == 'Ration CN') echo 'selected="selected"'; ?>>Ration CN</option>
                                <option value="Sand" <?php if ($row->name == 'Sand') echo 'selected="selected"'; ?>>Sand</option>
                                <option value="Silt" <?php if ($row->name == 'Silt') echo 'selected="selected"'; ?>>Silt</option>
                                <option value="Turbidity" <?php if ($row->name == 'Turbidity') echo 'selected="selected"'; ?>>Turbidity</option>
                            </select>
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="nilai_awal" name="nilai_awal" step="0.01" value="<?= $row->nilai_awal; ?>">
                            <?= form_error('nilai_awal', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="nilai_akhir" name="nilai_akhir" step="0.01" value="<?= $row->nilai_akhir; ?>">
                            <?= form_error('nilai_akhir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="bobot" name="bobot" step="0.01" value="<?= $row->bobot; ?>">
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

<?php foreach ($biotic as $row) : ?>
    <!-- Modal Delete User-->
    <form class="user" method="post" action="<?= base_url('Admin/Dataadd/delete'); ?>">
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