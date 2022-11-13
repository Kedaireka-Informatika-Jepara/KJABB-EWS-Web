<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Input Main Parameter</h1>
    <p class="mb-4"><a target="_blank" href="https://datatables.net"></a></p>

    <!-- /.container-fluid -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step">
                        <button type="button" disabled class="step-trigger" role="tab">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Input Station</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step">
                        <button type="button" class="step-trigger" role="tab">
                            <span class="bs-stepper-circle bg-primary">2</span>
                            <span class="bs-stepper-label">Input Main Parameter</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step">
                        <button type="button" disabled class="step-trigger" role="tab">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Input Additional Parameter</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step">
                        <button type="button" disabled class="step-trigger" role="tab">
                            <span class="bs-stepper-circle">4</span>
                            <span class="bs-stepper-label">Result</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <div class="row mb-3">
                        <div class="col-sm">
                            <h6 class="font-weight-bold text-primary">Biotik</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Species/Genus</th>
                                            <th>Family</th>
                                            <th>Abundance</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($species as $row) : ?>
                                            <tr>
                                                <td><?php echo $row->species ?></td>
                                                <td><?php echo $row->family ?></td>
                                                <td><?php echo $row->abundance ?></td>
                                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#formDelete<?= $row->id; ?>"><i class="far fa-trash-alt"></i> Delete</button></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row ml-2">
                                <form class="makrobenthic" method="post" action="<?= base_url('Member/Mainparameter/addSpecies'); ?>">
                                    <div class="form-group">
                                        <label class="col-form-label" for="species_genus">Species/Genus:</label>
                                        <input type="text" class="form-control" id="species_genus" name="species_genus">
                                        <?= form_error('species_genus', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="family">Family:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="family" id="family">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="buttonShow">Show</button>
                                                <button class="btn btn-outline-secondary" type="button" id="buttonHide">Hide</button>
                                            </div>
                                        </div>
                                        <?= form_error('family', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="abundance">Abundance:</label>
                                        <input type="number" class="form-control" id="abundance" name="abundance" min="0">
                                        <?= form_error('abundance', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-success" value="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm">
                            <h6 class="font-weight-bold text-primary ml-2">Abiotik</h6>
                            <div class="row ml-2">
                                <form class="mainparameter" method="post" action="<?= base_url('Member/Mainparameter/addMainAbiotic') ?>">
                                    <div class="form-group">
                                        <label class="col-form-label" for="temperature">Temperature(&#8451;):</label>
                                        <input type="number" class="form-control" id="temperature" name="temperature" min="0" max="100" step="0.01">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="salinity">Salinity:</label>
                                        <input type="number" class="form-control" id="salinity" name="salinity" min="0" step="0.01">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="do">DO(mg/L):</label>
                                        <input type="number" class="form-control" id="do" name="do" min="0" max="13" step="0.01">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="ph">pH:</label>
                                        <input type="number" class="form-control" id="ph" name="ph" min="0" max="14" step="0.01">
                                    </div>
                                    <a class="btn btn-secondary mt-4" style="float: left;" href="<?= base_url('Member/Station'); ?>">Back</a>
                                    <button type="submit" class="btn btn-secondary mt-4" style="float: right;">Next</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($species as $row) : ?>
    <!-- Modal Delete User-->
    <form class="user" method="post" action="<?= base_url('Member/Mainparameter/deleteSpecies'); ?>">
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
                        <p>Are you sure want to delete this species?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" value="Delete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>
<script>
    $("#buttonHide").hide();
    $("#buttonShow").click(function() {
        $("#buttonHide").show();
        $("#buttonShow").hide();
        $("#family").replaceWith('<select class="form-control" name="family" id="family">' +
            '<?php foreach ($family_dd as $row) : ?>' +
            '<option value=<?= $row->family; ?>><?php echo $row->family; ?></option>' +
            '<?php endforeach; ?>' +
            '</select>');
    });
    $("#buttonHide").click(function() {
        $("#buttonHide").hide();
        $("#buttonShow").show();
        $("#family").replaceWith('<input type="text" class="form-control" name="family" id="family">');
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "searching": false,
            "pageLength": 5
        });
    });
</script>