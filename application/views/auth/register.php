<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row ml-3 justify-content-md-center">

                <body class="hold-transition register-page">
                    <div class="register-box">
                        <div class="register-logo">
                            <a href=""><b>Kelola</b>User</a>
                        </div>

                        <div class="card">
                            <div class="card-body register-card-body">
                                <p class="login-box-msg">Register akun</p>

                                <form class="admin" action="<?= base_url('auth/register'); ?>" method="post">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                                    <div class="input-group mt-3">
                                        <input type="password" class="form-control" placeholder="Password" id="password1" name="password1">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="input-group mt-3">
                                        <input type="password" class="form-control" placeholder="Konfirmasi password" id="konf_pass" name="konf_pass">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col">
                                            <button type="submit" class="mt-3 btn btn-primary btn-block">Register</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>


                            </div>
                            <!-- /.form-box -->
                        </div><!-- /.card -->
                    </div>
                    <!-- /.register-box -->
                </body>
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content-header -->
</div>
<!-- /.content-wrapper -->