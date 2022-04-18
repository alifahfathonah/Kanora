<?php echo view('Layouts/Top'); ?>
<?php echo view('Layouts/Front-end'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Penumpang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Laporan Data Penumpang</li>
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr>
        <form action="<?php echo base_url('ReportController/getData')  . '/' . $first_date . '/' . $end_date ?>  " method="POST" enctype="multipart/form-data">
            <div class="row ml-2">
                <div class="col-lg-3">
                    <input type="date" name="first_date" class="form-control">
                </div>
                <div class="col-lg-3">
                    <input type="date" name="end_date" class="form-control">
                </div>
                <div class="col-lg-3">

                    <button type="submit" name="show" class="btn btn-info">Tampil</button>

                </div>

                <div class="col-lg-3">
                    <a href="<?= base_url('ReportController/print') . '/' . $first_date . '/' . $end_date ?>" target="_blank" class="btn btn-outline btn-primary ml-5">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                </div>
            </div>
        </form>



    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->


            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-hover" id="example1">
                            <thead>
                                <tr class="bg-primary" style="color:white; font-size:10pt;">
                                    <th>No</th>
                                    <th>No Passport</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <!-- <th>Lahir</th> -->
                                    <th>Tanggal Lahir</th>
                                    <th>No Flight</th>
                                    <th>Tanggal Penerbangan</th>
                                    <th>Maskapai</th>
                                    <th>Negara</th>
                                    <th>Visa</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach ($data_passanger as $row) : ?>
                                    <tr>
                                        <td><?php echo $nomor++ ?>.</td>
                                        <td><?= $row['passport_number'] ?></td>
                                        <td><?= $row['name'] ?></td>

                                        <td><?= $row['gender'] ?></td>
                                        <td><?= ($row['birth_date'] != '0000-00-00') ? date('d-m-Y', strtotime($row['birth_date'])) : '' ?></td>
                                        <td><?= $row['flight_number'] ?></td>
                                        <td><?= ($row['flight_date'] != '0000-00-00') ? date('d-m-Y', strtotime($row['flight_date'])) : '' ?></td>

                                        <td><?= $row['airlane_name'] ?></td>
                                        <td><?= $row['country'] ?></td>
                                        <td><a href="<?= base_url('foto/' . $row['visa']) ?>" class="preview" target="_blink"><img class="img-thumbnail" width="100px" height="100px" src="<?= base_url('foto/' . $row['visa']) ?>"></a></td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <br><br>
</div>

<!-- /.content-wrapper -->



<?php echo view('Layouts/Bottom'); ?>