<style>
    .nav>li>a:focus,
    .nav>li>a:hover {
        background-color: #eee;
    }
</style>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-4">Welcome to SmartBiomon-2SWR</h1>
                                    <h1 class="h4 text-gray-900 mb-4">Ecologycal Assessment for Water Ecosystem Using Macrobenthic Assemblages</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('Login'); ?>">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </form>
                                <div class="container">
                                    <div class="row justify-content-center pt-3">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link" href="<?= base_url('homepage'); ?>">Homepage</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?= base_url('login/registration'); ?>">Registration</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?= base_url('login/payment'); ?>">Payment</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>