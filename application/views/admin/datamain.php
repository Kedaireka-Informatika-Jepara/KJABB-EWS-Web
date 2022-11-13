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
    <h1 class="h3 mb-4 text-gray-800">Data Weights: Main Abiotic</h1>
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
                            <option value="main" selected>Main Abiotic</option>
                            <option value="add">Additional Abiotic</option>
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
                                <th>Geographical Zone</th>
                                <th>Type of Water</th>
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
                                    <td><?php echo $row->zone ?></td>
                                    <td><?php echo $row->water ?></td>
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
<form class="user" method="post" action="<?= base_url('Admin/Datamain/add'); ?>">
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
                            <option value="DO">DO</option>
                            <option value="PH">PH</option>
                            <option value="Salinity">Salinity</option>
                            <option value="Temperature">Temperature</option>
                        </select>
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="geographical_zone" name="geographical_zone">
                            <option selected disabled hidden>Choose geographical zone</option>
                            <option value="1">Tropical</option>
                            <option value="2">Temperate</option>
                            <option value="3">-</option>
                        </select>
                        <?= form_error('geographical_zone', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="type_water" name="type_water">
                            <option selected disabled hidden>Choose type of water ecosystem</option>
                            <option value="1">Marine Water</option>
                            <option value="2">Fresh Water</option>
                            <option value="3">Estuarine Water</option>
                            <option value="4">-</option>
                        </select>
                        <?= form_error('type_water', '<small class="text-danger">', '</small>'); ?>
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
    <form class="user" method="post" action="<?= base_url('Admin/Datamain/edit'); ?>">
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
                                <option value="DO" <?php if ($row->name == 'DO') echo 'selected="selected"'; ?>>DO</option>
                                <option value="PH" <?php if ($row->name == 'PH') echo 'selected="selected"'; ?>>PH</option>
                                <option value="Salinity" <?php if ($row->name == 'Salinity') echo 'selected="selected"'; ?>>Salinity</option>
                                <option value="Temperature" <?php if ($row->name == 'Temperature') echo 'selected="selected"'; ?>>Temperature</option>
                            </select>
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="geographical_zone" name="geographical_zone">
                                <option selected disabled hidden>Choose geographical zone</option>
                                <option value="1" <?php if ($row->geographical_zone == 1) echo 'selected="selected"'; ?>>Tropical</option>
                                <option value="2" <?php if ($row->geographical_zone == 2) echo 'selected="selected"'; ?>>Temperate</option>
                                <option value="3" <?php if ($row->geographical_zone == 3) echo 'selected="selected"'; ?>>-</option>
                            </select>
                            <?= form_error('geographical_zone', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="type_water" name="type_water">
                                <option selected disabled hidden>Choose type of water ecosystem</option>
                                <option value="1" <?php if ($row->type_water == 1) echo 'selected="selected"'; ?>>Marine Water</option>
                                <option value="2" <?php if ($row->type_water == 2) echo 'selected="selected"'; ?>>Fresh Water</option>
                                <option value="3" <?php if ($row->type_water == 3) echo 'selected="selected"'; ?>>Estuarine Water</option>
                                <option value="4" <?php if ($row->type_water == 4) echo 'selected="selected"'; ?>>-</option>
                            </select>
                            <?= form_error('type_water', '<small class="text-danger">', '</small>'); ?>
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
    <form class="user" method="post" action="<?= base_url('Admin/Datamain/delete'); ?>">
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