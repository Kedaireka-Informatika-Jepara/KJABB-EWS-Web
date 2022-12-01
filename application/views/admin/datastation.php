<main>
    <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Station</h1>

<!-- /.container-fluid -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row mb-3">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Station ID</th>
                            <th>Value</th>
                            <th>Geographical Zone</th>
                            <th>Type of Water Ecosystem</th>
                            <th>Created by</th>
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
                                <td><?php echo $row->name ?></td>
                                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalHasil<?= $row->id; ?>"><i class="fas fa-chart-bar"></i> Result</button>
                                    <a class="btn btn-warning" href="<?= base_url('Admin/Datastation/parameter/' . $row->station_id . '/' . $row->user_id); ?>"><i class="far fa-eye"></i> Detail</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#formDelete<?= $row->id; ?>"><i class="far fa-trash-alt"></i> Delete</button>
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
<!-- Modal Hasil -->
<?php foreach ($station as $row) : ?>
<div class="modal fade" id="modalHasil<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHasil" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHasil">Hasil</h5>
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
<!-- Modal Delete Station-->
<?php foreach ($station as $row) : ?>
<form class="user" method="post" action="<?= base_url('Admin/Datastation/delete'); ?>">
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
                    <p>Are you sure want to delete this station?</p>
                    <input type="hidden" value="<?= $row->station_id; ?>" name="station_id" id="station_id" class="form-control">
                    <input type="hidden" value="<?= $row->user_id; ?>" name="user_id" id="station_id" class="form-control">
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
</main>