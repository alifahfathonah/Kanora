<?php echo view('Layouts/Rt'); ?>
<center>
    <div class="logo mt-3">
        <p class="align-center"><img src="<?= base_url('assets/img/KKP.png') ?>" style="width: 100px; height: 90px;"></p>
        <a href="#" style="color: black;">
            <h3>KANTOR KARANTINA PELABUHAN</h3>
        </a>
        <h5 style="color: black;">Bandar Udara International Soekarno-Hatta</h5>
    </div>
</center>
<!-- Main content -->
<div class="container mt-2">

    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Please Input Your Passport Number To Get Your Data</b></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="card-body">
                        <?php
                        session()->getFlashdata('tambah');
                        if (session()->getFlashdata('tambah')) {
                            echo '  <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><i class="icon fas fa-exclamation-circle"></i>';
                            echo session()->getFlashdata('tambah');
                            echo '</h6></div>';
                        }
                        ?>


                        <h5 class="text-center display-6">Nomor Passport /<i> Passport Number</i></h5>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="<?php echo base_url('Registration/validation') ?>" enctype="multipart/form-data">
                                    <div class="input-group">
                                        <input type="search" name="passport_number" class="form-control form-control-lg" placeholder="Type your Passport Number here">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-lg btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed table-hover" width="100%">
                                <thead>

                                    <tr class="bg-info" style="color:white; font-size:10pt;">

                                        <th>Passport Number</th>
                                        <th>Name</th>
                                        <th>Birth Date</th>
                                        <!-- <th>Lahir</th> -->
                                        <th>Country</th>
                                        <th>Visa</th>
                                        <th>Aksi</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    <?php foreach ($data_passanger as $row) : ?>
                                        <tr>
                                            <td><?= $row['passport_number'] ?></td>
                                            <td><?= $row['name'] ?></td>

                                            <td><?= ($row['birth_date'] != '0000-00-00') ? date('d-m-Y', strtotime($row['birth_date'])) : '' ?></td>
                                            <td><?= $row['country'] ?></td>

                                            <td><a href="<?= base_url('foto/' . $row['visa']) ?>" class="preview" target="_blink"><img class="img-thumbnail" width="100px" height="100px" src="<?= base_url('foto/' . $row['visa']) ?>"></a></td>



                                            <td>
                                                <form action="<?= base_url('Registration/print/') . '/' . $row['passport_number'] ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="Cetak">
                                                    <button type="submit" class="btn"><i class="nav-icon fas fa-download"></i>

                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    <?php endforeach ?>





                                </tbody>
                            </table>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- /.card -->
<?php echo view('Layouts/Rb'); ?>