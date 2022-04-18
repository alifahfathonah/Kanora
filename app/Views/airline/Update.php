<?php echo view('Layouts/Top'); ?>
<?php echo view('Layouts/Front-end'); ?>
<section class="content">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Maskapai</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                            <li class="breadcrumb-item active">Data Maskapai</li>
                        </ol>

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <hr>
        </div>
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <?php echo form_open('AirlineController/EditAction/' . $Update[0]['airline_id']); ?>
                <form action="" method="post" enctype="multipart/form-data">

                    <table class="table table-striped table-middle">
                        <tr>
                            <th width="20%">ID Vaksin</th>
                            <td width="1%">:</td>
                            <td><input type="text" class="form-control" name="airline_id" value="<?php echo $Update[0]['airline_id']; ?>" disabled></td>
                        </tr>
                        <tr>
                            <th>Jenis Vaksin</th>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="airlane_name" value="<?php echo $Update[0]['airlane_name']; ?>"></td>
                        </tr>



            </div>
        </div>

        </table>

        <button type="submit" class="btn btn-success">
            <i class="far fa-save"></i> Simpan
        </button>
        <button type="button" class="btn btn-danger" onclick="javascript:history.back()">
            <i class="fa fa-arrow-circle-left"></i> Batal
        </button>
        <input type="hidden" name="airline_id" value="<?php echo $Update[0]['airline_id']; ?>">
        </form>
        <?php echo form_close() ?>
    </div>
    </div>
    </div>

</section>
<?php echo view('layouts/bottom') ?>