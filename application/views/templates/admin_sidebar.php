<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color:#D63819" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Admin/Datauser'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-fish"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SmartBiomon-2SWR</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <div class="sidebar-heading">
        Admin
    </div>


    <!-- Nav Item - Admin -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/Datauser'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pengguna</span></a>
    </li>

    <!-- Nav Item - Admin -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/Datapayment'); ?>">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Data Pembayaran</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <div class="sidebar-heading">
        Operator
    </div>

    <!-- Nav Item - Admin -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/Dataweight'); ?>">
            <i class="fas fa-fw fa-weight-hanging"></i>
            <span>Data Bobot</span></a>
    </li>

    <!-- Nav Item - Admin -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/Datataxa'); ?>">
            <i class="fas fa-fw fa-bacterium"></i>
            <span>Data Keluarga Biotik</span></a>
    </li>

    <!-- Nav Item - Jaringan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/Datastation'); ?>">
            <i class="fas fa-fw fa-flask"></i>
            <span>Data Lingkungan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <div class="sidebar-heading">
        Member
    </div>

    <!-- Nav Item - Admin -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/Station'); ?>">
            <i class="fas fa-fw fa-pencil-alt"></i>
            <span>Input Data</span></a>
    </li>


    <!-- Nav Item - Jaringan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/Data'); ?>">
            <i class="fas fa-fw fa-database"></i>
            <span>Histori Pengisian</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->