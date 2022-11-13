<div class="container-fluid">

    <!-- Page Heading -->
    <?php foreach ($station as $row) : ?>
        <h1 class="h3 mb-4 text-gray-800">Station <?php echo $row['station_id']; ?> <?php echo $row['zone']; ?> Zone - <?php echo $row['water']; ?> Ecosystem</h1>
    <?php endforeach; ?>
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
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Update Additional Parameter</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step">
                        <button type="button" disabled class="step-trigger" role="tab">
                            <span class="bs-stepper-circle  bg-primary">4</span>
                            <span class="bs-stepper-label">Result</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Species/Genus</th>
                                            <th>Family</th>
                                            <th>Kelimpahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($species as $row) : ?>
                                            <tr>
                                                <td><?php echo $row->species ?></td>
                                                <td><?php echo $row->family ?></td>
                                                <td><?php echo $row->abundance ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <form class="result" method="post" action="<?= base_url('Operator/Updateresult/updateResult'); ?>">
                                <div class="form-group">
                                    <label for="value">Value:</label>
                                    <input class="form-control col-sm-3" type="number" step="0.01" readonly id="value" name="value" value="<?php echo $result; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="conclusion">Conclusion:</label>
                                    <textarea class="form-control rounded-0 col-sm-10" id="conclusion" name="conclusion" rows="3" readonly><?php echo $conclusion; ?></textarea>
                                </div>
                                <a class="btn btn-secondary mt-4" style="float: left;" href="<?= base_url('Operator/Updateadd'); ?>"> Back</a>
                        </div>
                        <div class="col-sm-6">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Abiotik</th>
                                            <th>Kelimpahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($value as $row) : ?>
                                            <tr>
                                                <td>Temperature</td>
                                                <?php if ($row->temperature == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->temperature ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Salinity</td>
                                                <?php if ($row->salinity == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->salinity ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Dissolved Oxygen</td>
                                                <?php if ($row->do == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->do ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>pH</td>
                                                <?php if ($row->ph == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->ph ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Total Abundance</td>
                                                <td><?php echo $row->total_abundance ?></td>
                                            </tr>
                                            <tr>
                                                <td>Value of Indicator Taxa</td>
                                                <td><?php echo $row->taxa_indicator ?></td>
                                            </tr>
                                            <tr>
                                                <td>Number of Species</td>
                                                <td><?php echo $row->number_species ?></td>
                                            </tr>
                                            <tr>
                                                <td>Diversity</td>
                                                <?php if ($row->diversity == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->diversity ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Similarity</td>
                                                <?php if ($row->similarity == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->similarity ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Dominance</td>
                                                <?php if ($row->dominance == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->dominance ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Conductivity</td>
                                                <?php if ($row->conductivity == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->conductivity ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Ratio C/N</td>
                                                <?php if ($row->ratiocn == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->ratiocn ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Turbidity</td>
                                                <?php if ($row->turbidity == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->turbidity ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Sand</td>
                                                <?php if ($row->sand == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->sand ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Clay</td>
                                                <?php if ($row->clay == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->clay ?></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>Silt</td>
                                                <?php if ($row->silt == null) { ?>
                                                    <td>Normal</td>
                                                <?php } else { ?>
                                                    <td><?php echo $row->silt ?></td>
                                                <?php } ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3 form-group">
                                <label for="status">Status:</label>
                                <input type="text" id="status" class="form-control col-sm-5" name="status" value="<?php echo $status; ?>" readonly></input>
                            </div>
                            <div class="form-group">
                                <label for="recommendation">Recommendation:</label>
                                <textarea class="form-control rounded-0 col-sm-10" id="recommendation" name="recommendation" rows="3" readonly><?php echo $recommendation; ?></textarea>
                            </div>
                            <button class="btn btn-secondary mt-4" type="submit" value="save"><i class="far fa-save"></i> Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTable1').DataTable({
            "searching": false,
            "pageLength": 5
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTable2').DataTable({
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": false,
            "searching": false
        });
    });
</script>