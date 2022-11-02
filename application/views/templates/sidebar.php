<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>homeadmin" class="brand-link">
        <img src="<?= base_url() ?>assets/img/logo/logosbsp1.png" alt="SBSP Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <!-- <span class="brand-text font-weight-light">SBSP</span> -->
        <span class="brand-text font-weight-light"><?= $admin['username'] ?></span>
    </a>

    <!-- Sidebar -->

    <!-- Sidebar Menu -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>produk" class="nav-link active">
                                <i class="fas fa-shopping-cart"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>auth/register" class="nav-link active">
                                <i class="fas fa-users"></i>
                                <p>Kelola User</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>