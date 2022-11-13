<div class="container-fluid">

    <!-- Page Heading -->
    <?php foreach ($station as $row) : ?>
        <h1 class="h3 mb-4 text-gray-800">Station <?php echo $row['station_id']; ?> <?php echo $row['zone']; ?> Zone - <?php echo $row['water']; ?> Ecosystem</h1>
    <?php endforeach; ?>
    <p class="mb-4"><a target="_blank" href="https://datatables.net"></a></p>

    <!-- /.container-fluid -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-3">
                <a href="<?= base_url('Operator/Datastation'); ?>">&lt;&lt;Back</a>
            </div>
            <div class="row mb-3">
                <div class="col-sm-6">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Species/Genus</th>
                                    <th>Family</th>
                                    <th>Abundance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($species as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->species ?></td>
                                        <td><?php echo $row->family ?></td>
                                        <td><?php echo $row->abundance ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
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