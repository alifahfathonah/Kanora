<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico') ?>" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background-image:url(<?php echo base_url('assets/img/background.jpg') ?>);background-size:cover;">
    <div class="login-box">
        <div class="login-logo">
            <a href="" style="color: #FFF;"><b>Admin&nbsp;KKP</b><br>
                <p style="font-size: 12pt;">Bandar Udara International Soekarno-Hatta</p>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="card opacity-25">
            <div class="card-body login-card-body opacity-25">
                <p class="login-box-msg">Sign in to start your session</p>
                <?php
                session()->getFlashdata('errors');
                if (session()->getFlashdata('pesan')) {
                    echo '  <div class="alert alert-danger alert-dismissible" id="flash_data">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><i class="icon fas fa-exclamation-circle"></i>';
                    echo session()->getFlashdata('pesan');
                    echo '</h6></div>';
                }  ?>
                <form action="<?php echo base_url('Auth/cek_login') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo view('Layouts/Rb'); ?>