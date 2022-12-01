<main>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Data Pembayaran</h1>

        <!-- /.container-fluid -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Bukti</th>
                                    <th>Tanggal/Waktu</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($payment as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->user_email ?></td>
                                        <td><img width="50px" src="<?= base_url(); ?>bukti/<?php echo $row->bukti; ?>" data-toggle="modal" data-target="#imageModal<?= $row->id; ?>"></td>
                                        <td><?php echo $row->datetime ?></td>
                                        <?php if ($row->status == 1) { ?>
                                            <td><span class="badge badge-pill badge-success">Terkonfirmasi</span></td>
                                        <?php } else { ?>
                                            <td><span class="badge badge-pill badge-danger">Belum Terkonfirmasi</span></td>
                                        <?php } ?>
                                        <td>
                                            <?php if ($row->status == 1) { ?>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formUnconfirm<?= $row->id; ?>"><i class="fas fa-times"></i> Batalkan</button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formConfirm<?= $row->id; ?>"><i class="fas fa-check"></i> Konfirmasi</button>
                                            <?php } ?>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#formDelete<?= $row->id; ?>"><i class="far fa-trash-alt"></i> Hapus</button>
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


    <?php foreach ($payment as $row) : ?>
        <!-- Modal Delete Payment-->
        <form class="user" method="post" action="<?= base_url('Admin/Datapayment/delete'); ?>">
            <div class="modal fade" id="formDelete<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="formDelete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hasilModal">Hapus?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?= $row->id; ?>" name="id" id="id" class="form-control">
                            <input type="hidden" value="<?= $row->bukti; ?>" name="bukti" id="bukti">
                            <p>Apakah anda yakin untuk menghapus data pembayaran ini?
                            <p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" value="Delete">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endforeach; ?>

    <?php foreach ($payment as $row) : ?>
        <!-- Modal Unconfirm Payment-->
        <form class="user" method="post" action="<?= base_url('Admin/Datapayment/unconfirm'); ?>">
            <div class="modal fade" id="formUnconfirm<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="formDelete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hasilModal">Batalkan pembayaran ini?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?= $row->id; ?>" name="id" id="id">
                            <input type="hidden" value="0" name="status" id="status">
                            <p>Apakah anda yakin untuk membatalkan pembayaran ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning" value="Unconfirm">Batalkan Konfirmasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endforeach; ?>

    <?php foreach ($payment as $row) : ?>
        <!-- Modal Confirm Payment-->
        <form class="user" method="post" action="<?= base_url('Admin/Datapayment/confirm'); ?>">
            <div class="modal fade" id="formConfirm<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="formDelete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hasilModal">Konfirmasi pembayaran ini?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?= $row->id; ?>" name="id" id="id">
                            <input type="hidden" value="1" name="status" id="status">
                            <p>Apakah anda yakin untuk mengonfirmasi data pembayaran ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" value="Confirm">Konfirmasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endforeach; ?>

    <?php foreach ($payment as $row) : ?>
        <!-- Modal -->
        <div class="modal fade" id="imageModal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img width="100%" src="<?= base_url(); ?>bukti/<?php echo $row->bukti; ?>">
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</main>