<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color:#3A91BA" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Member/Station'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-fish"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SmartBiomon-2SWR</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <div class="sidebar-heading">
        Member
    </div>


    <!-- Nav Item - Admin -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Member/Station'); ?>">
            <i class="fas fa-fw fa-pencil-alt"></i>
            <span>Input Data</span></a>
    </li>


    <!-- Nav Item - Jaringan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Member/Data'); ?>">
            <i class="fas fa-fw fa-database"></i>
            <span>Input History</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->