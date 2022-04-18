<?php echo view('Layouts/Top'); ?>
<?php echo view('Layouts/Front-end'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Data Penumpang WNA</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Detail Data Penumpang WNA</li>
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                    <button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
                        <i class="fa fa-arrow-circle-left"></i> Kembali
                    </button>
                    <h1></h1>
                    <table class="table table-striped table-middle">

                        <tr>
                            <th width="20%">Nomor Passport</th>
                            <td width="1%">:</td>
                            <td><?php echo $Detail[0]['passport_number']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?php echo $Detail[0]['name']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>:</td>
                            <td><?php echo ($Detail[0]['birth_date'] != '0000-00-00') ? date('d-m-Y', strtotime($Detail[0]['birth_date'])) : ''  ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>:</td>
                            <td><?php echo $Detail[0]['gender']; ?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>:</td>
                            <td><?php echo $Detail[0]['role_type']; ?></td>
                        </tr>
                        <tr>
                            <th>Negara</th>
                            <td>:</td>
                            <td><?php echo $Detail[0]['country']; ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Penerbangan</th>
                            <td>:</td>
                            <td><?php echo $Detail[0]['flight_number']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Penerbangan</th>
                            <td>:</td>
                            <td><?php echo ($Detail[0]['flight_date'] != '0000-00-00') ? date('d-m-Y', strtotime($Detail[0]['flight_date'])) : ''  ?></td>
                        </tr>
                        <tr>
                            <th>Maskapai</th>
                            <td>:</td>
                            <td><?php echo $Detail[0]['airlane_name']; ?></td>
                        </tr>
                        <tr>
                            <th>visa</th>
                            <td>:</td>
                            <td><a href="<?= base_url('foto/' . $Detail[0]['visa']) ?>" class="preview" target="_blink"><img class="img-thumbnail" width="100px" height="100px" src="<?= base_url('foto/' . $Detail[0]['visa']) ?>"></a></td>
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>

<!-- /.content-wrapper -->



<?php echo view('Layouts/Bottom'); ?>