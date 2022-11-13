<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Input History</h1>
    <p class="mb-4"><a target="_blank" href="https://datatables.net"></a></p>

    <!-- /.container-fluid -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h3 class="mb-4 text-gray-800">Taxa Indicator</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Species</th>
                                    <th>Family</th>
                                    <th>Taxa Indicator</th>
                                    <th>Station ID </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($species as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->species ?></td>
                                        <td><?php echo $row->family ?></td>
                                        <td><?php echo $row->taxa_indicator ?></td>
                                        <td><?php echo $row->station_id ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-8">
                    <h3 class="mb-4 text-gray-800">Result History</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Station ID</th>
                                    <th>Value</th>
                                    <th>Geographical Zone</th>
                                    <th>Type of Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($station as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->station_id ?></td>
                                        <td><?php echo $row->result ?></td>
                                        <td><?php echo $row->zone ?></td>
                                        <td><?php echo $row->water ?></td>
                                        <td><button class="btn btn-danger" href="#" data-toggle="modal" data-target="#hasilModal<?= $row->id; ?>"><i class="fas fa-chart-bar"></i> Result</button>
                                            <a class="btn btn-secondary" href="<?= base_url('Operator/Data/update/' . $row->station_id); ?>"><i class="fas fa-edit"></i> Edit</a>
                                            <a class="btn btn-success" href="<?= base_url('Operator/Data/cetak/' . $row->station_id); ?>"><i class="fas fa-print"></i> Print</a>
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
</div>

<!-- Hasil Modal-->
<?php foreach ($station as $row) : ?>
    <div class="modal fade" id="hasilModal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="hasilModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hasilModal">Hasil</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Criteria : <?php echo $row->status; ?></p>
                    <label class="label-col-form" for="conclusion">Conclusion:</label>
                    <textarea class="form-control rounded-0" id="conclusion" rows="3" disabled><?php echo $row->conclusion; ?></textarea>
                    <label class="label-col-form" for="recommendation">Recommendation:</label>
                    <textarea class="form-control rounded-0" id="recommendation" rows="3" disabled><?php echo $row->recommendation; ?></textarea>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable1').DataTable({
            "pageLength": 5,
            "order": [
                [4, "desc"]
            ]
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable2').DataTable({
            "searching": false,
        });
    });
</script>