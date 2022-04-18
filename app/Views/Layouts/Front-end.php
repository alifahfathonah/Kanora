<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php echo base_url('assets/img/KKP.png') ?>" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-cyan navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link text-white" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-circle"></i> <?= session()->get('email'); ?>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?php echo base_url('dist/img/avatar5.png') ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    <?= session()->get('name'); ?>

                                </h3>
                                <p class="text-sm">Super Admin</p>
                                <p class="text-sm text-success"><i class="fas fa-circle mr-1"></i> Active</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('Auth/logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php if (session()->get('name') == 'admin') { ?>
        <aside class="main-sidebar sidebar-light-lightblue elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link bg-cyan">
                <img src="<?php echo base_url('assets/img/KKP.png') ?>" alt="Logo" class="brand-image img-circle elevation-3 border border-warning" style="opacity: .8">
                <b class="brand-text font-weight ml-2">K A N O R A</b>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('dist/img/avatar5.png') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->get('name'); ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?php echo base_url('/Dashboard') ?>" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dashboard') {
                                                                                                echo "active";
                                                                                            } ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>

                        </li>
                        <li class="nav-item menu ">
                            <a href="#" class="nav-link mt-2 <?php if (current_url(true)->getSegment('2') == 'Passanger') {
                                                                    echo "active";
                                                                } ?>">
                                <i class="nav-icon far fa-clipboard"></i>
                                <p>
                                    Data Penumpang
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Passanger/wna') ?>" class="nav-link <?php if (current_url(true)->getSegment('3') == 'wna') {
                                                                                                    echo "active";
                                                                                                } ?>">
                                        <i class="fas fa-circle text-sm text-info nav-icon"></i>
                                        <p>Data WNA</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Passanger/wni') ?>" class="nav-link <?php if (current_url(true)->getSegment('3') == 'wni') {
                                                                                                    echo "active";
                                                                                                } ?>">
                                        <i class="fas fa-circle text-sm text-info nav-icon"></i>
                                        <p>Data WNI</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/Airlines') ?>" class="nav-link mt-2 <?php if (current_url(true)->getSegment('2') == 'Airlines') {
                                                                                            echo "active";
                                                                                        } ?>">
                                <i class="nav-icon far fa-list-alt"></i>
                                <p>
                                    Data Maskapai
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/Report') ?>" class="nav-link mt-2 <?php if (current_url(true)->getSegment('2') == 'Report') {
                                                                                            echo "active";
                                                                                        } else {
                                                                                            if (current_url(true)->getSegment('2') == 'ReportController') {
                                                                                                echo "active";
                                                                                            }
                                                                                        } ?>">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Laporan Data
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Auth/logout') ?>" class="nav-link bg-danger mt-5">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Keluar
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
            <?php } ?>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- ./wrapper -->