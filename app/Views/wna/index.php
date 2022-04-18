<?php echo view('Layouts/Top'); ?>
<?php echo view('Layouts/Front-end'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Penumpang WNA</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Data Penumpang WNA</li>
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

            <?php
            session()->getFlashdata('pesan');
            if (session()->getFlashdata('pesan')) {
                echo '  <div class="alert alert-success alert-dismissible" id="flash_data">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><i class="icon fas fa-exclamation-circle"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h6></div>';
            } ?>
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
                                    <th>Aksi</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach ($wna as $row) : ?>
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

                                        <td>

                                            <div class="nav-item dropdown">
                                                <a class="nav-link" data-toggle="dropdown" href="#">
                                                    <i class="far fa-caret-square-down"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <form action="<?= base_url('Passanger/wna/detail') . '/' . $row['id_passanger'] ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="Details">
                                                        <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-eye"></i>
                                                            Lihat
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="<?= base_url('Passanger/wna/update') . '/' . $row['id_passanger'] ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="Edit">
                                                        <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-edit"></i>
                                                            Ubah
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="<?= base_url('Passanger/wna/delete') . '/' . $row['id_passanger'] ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="Delete">
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Apakah anda yakin?');"><i class="nav-icon fas fa-trash-alt"></i>
                                                            Hapus
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
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
    <div class="card ml-3 mr-3 mb-1">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="well ml-4 col-6">
                <dl class="dl-horizontal">
                    <dt>Total Wna</dt>
                    <dd><?php echo $total ?> orang</dd>

                    <dt>Jumlah Laki-laki</dt>
                    <dd><?php echo $L ?> orang</dd>

                    <dt>Jumlah Perempuan</dt>
                    <dd><?php echo $P ?> orang</dd>

                </dl>
            </div>
        </div>
    </div>
</div>

<!-- /.content-wrapper -->



<?php echo view('Layouts/Bottom'); ?>