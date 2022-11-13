<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Station</h1>

    <!-- /.container-fluid -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step">
                        <button type="button" class="step-trigger" role="tab">
                            <span class="bs-stepper-circle bg-primary">1</span>
                            <span class="bs-stepper-label">Update Station</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step">
                        <button type="button" disabled class="step-trigger" role="tab">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Update Main Parameter</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step">
                        <button type="button" disabled class="step-trigger" role="tab">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Update Additional Parameter</span>
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
                        <div class="col-3 d-flex justify-content-center">
                            <form class="station" method="post" action="<?= base_url('Admin/Updatestation/updatestation'); ?>">
                                <?php foreach ($station as $row) : ?>
                                    <div class="form-group">
                                        <label class="col-form-label" for="geographical_zone">Geographical Zone:</label>
                                        <select class="form-control" id="geographical_zone" name="geographical_zone">
                                            <option selected disabled hidden>Choose Geographical Zone</option>
                                            <option value="1" <?php if ($row->geographical_zone == 1) echo 'selected="selected"'; ?>>Tropical</option>
                                            <option value="2" <?php if ($row->geographical_zone == 2) echo 'selected="selected"'; ?>>Temperate</option>
                                        </select>
                                        <?= form_error('geographical_zone', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="type_water">Type of Water Ecosystem</label>
                                        <select class="form-control" id="type_water" name="type_water">
                                            <option selected disabled hidden>Choose Water Ecosystem</option>
                                            <option value="1" <?php if ($row->type_water == 1) echo 'selected="selected"'; ?>>Marine Water</option>
                                            <option value="2" <?php if ($row->type_water == 2) echo 'selected="selected"'; ?>>Fresh Water</option>
                                            <option value="3" <?php if ($row->type_water == 3) echo 'selected="selected"'; ?>>Estuarine Water</option>
                                        </select>
                                        <?= form_error('type_water', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="station_id">Station ID:</label>
                                        <input type="text" class="form-control" id="station_id" name="station_id" value="<?= $row->station_id; ?>" readonly>
                                        <?= form_error('station_id', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                <?php endforeach; ?>
                                <button type="submit" class="btn btn-success" value="Proceed">Proceed</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>