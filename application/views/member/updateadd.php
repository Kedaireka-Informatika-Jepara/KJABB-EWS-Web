<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Additional Parameter</h1>
    <p class="mb-4"><a target="_blank" href="https://datatables.net"></a></p>

    <!-- /.container-fluid -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step">
                        <button type="button" class="step-trigger" role="tab">
                            <span class="bs-stepper-circle">1</span>
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
                            <span class="bs-stepper-circle bg-primary">3</span>
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
                        <div class="col-sm-3">
                            <h6 class="font-weight-bold text-primary">Index Biotic</h6>
                            <form class="additionalparameter" method="post" id="formAdd" action="<?= base_url('Member/Updateadd/updateIndexAdditional'); ?>">
                                <?php foreach ($value_input as $row) : ?>
                                    <div class="form-group">
                                        <label class="col-form-label" for="similarity">Similarity(J):</label>
                                        <input type="number" class="form-control" id="similarity" name="similarity" min="0" max="1" step="0.01" value="<?= $row->similarity ?>">
                                        <label class="col-form-label" for="dominance">Dominance(C):</label>
                                        <input type="number" class="form-control" id="dominance" name="dominance" min="0" max="1" step="0.01" value="<?= $row->dominance ?>">
                                        <label class="col-form-label" for="diversity">Diversity(H'):</label>
                                        <input type="number" class="form-control" id="diversity" name="diversity" min="0" max="4" step="0.01" value="<?= $row->diversity ?>">
                                        <label class="col-form-label" for="totalabundance">Total Abundance:</label>
                                        <input type="number" class="form-control" id="totalabundance" name="totalabundance" value="<?php echo $totalabundance; ?>" disabled>
                                        <label class="col-form-label" for="nospecies">Number of Species:</label>
                                        <input type="number" class="form-control" id="nospecies" name="nospecies" value="<?php echo $nospecies; ?>" disabled>
                                        <label class="col-form-label" for="valuetaxa">Value of Indicator Taxa</label>
                                        <input type="number" class="form-control" id="valuetaxa" name="valuetaxa" value="<?php echo $taxa_indicator; ?>" disabled>
                                    </div>
                        </div>
                        <div class="col-sm-3 ml-3">
                            <h6 class="font-weight-bold text-primary">Additional Abiotic</h6>
                            <div class="form-group">
                                <label class="col-form-label" for="conductivity">Conductivity(S):</label>
                                <input type="number" class="form-control" id="conductivity" name="conductivity" min="0" step="0.01" value="<?= $row->conductivity ?>">
                                <label class="col-form-label" for="ratio">Ration C/N:</label>
                                <input type="number" class="form-control" id="ratiocn" name="ratiocn" min="0" step="0.01" value="<?= $row->ratiocn ?>">
                                <label class="col-form-label" for="turbidty">Turbidity(ntu):</label>
                                <input type="number" class="form-control" id="turbidity" name="turbidity" min="0" step="0.01" value="<?= $row->turbidity ?>">
                            </div>
                            <br>
                            <p>Substrate/Sediment Composition</p>
                            <div class="form-group">
                                <label class="col-form-label" for="sand">Sand(%):</label>
                                <input type="number" class="form-control" id="sand" name="sand" min="0" max="100" step="0.01" value="<?= $row->sand ?>">
                                <label class="col-form-label" for="clay">Clay(%):</label>
                                <input type="number" class="form-control" id="clay" name="clay" min="0" max="20" step="0.01" value="<?= $row->clay ?>">
                                <label class="col-form-label" for="silt">Silt(%):</label>
                                <input type="number" class="form-control" id="silt" name="silt" min="0" max="100" step="0.01" value="<?= $row->silt ?>">
                            </div>
                        <?php endforeach; ?>
                        <a class="btn btn-secondary" style="float: left;" href="<?= base_url('Member/Updatemain'); ?>">Back</a>
                        <button type="submit" style="float: right;" class="btn btn-secondary"><i class="fas fa-calculator"></i> Count</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>