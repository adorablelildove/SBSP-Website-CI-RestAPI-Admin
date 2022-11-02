<body class="hold-transition login-page" style="background-image:url(assets/img/logo/2.png);">
  <div class="login-box">
    <div class="login-logo">
      <a href="" style="color:aliceblue;"><b>SBSP</b>Login</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Login untuk masuk ke sistem</p>

        <?= $this->session->flashdata('message'); ?>

        <form class="admin" action="<?= base_url('auth'); ?>" method="post">
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
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>

          <div class="row">
            <!-- <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div> -->
            <!-- /.col -->
            <div class="col">
              <button type="submit" class="mt-3 btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

        <!-- <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p> -->

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/template/dist/js/adminlte.min.js"></script>

</body>

</html>