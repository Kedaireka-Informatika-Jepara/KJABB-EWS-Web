<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SmartBiomon-2SWR</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/datatables/dataTables.bootstrap4.css'); ?>">
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Toast JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        <script type="text/javascript">
            <?php if ($this->session->flashdata('success')) { ?>

                toastr.success("<?php echo $this->session->flashdata('sukses'); ?>");

            <?php } else if ($this->session->flashdata('eror')) {  ?>

                toastr.error("<?php echo $this->session->flashdata('eror'); ?>");

            <?php } else if ($this->session->flashdata('peringatan')) {  ?>

                toastr.warning("<?php echo $this->session->flashdata('peringatan'); ?>");

            <?php } else if ($this->session->flashdata('info')) {  ?>

                toastr.info("<?php echo $this->session->flashdata('info'); ?>");

            <?php } ?>
        </script>