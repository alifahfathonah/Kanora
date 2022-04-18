<?php echo view('Layouts/Top'); ?>
<?php echo view('Layouts/Front-end'); ?>
<!-- Content Wrapper. Contains page content -->
<style>
    .file-upload {
        background-color: #ffffff;
        width: 600px;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #1FB264;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #1FB264;
        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }
</style>
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
                    <?php echo form_open_multipart('WniController/EditAction/' . $Update[0]['id_passanger']); ?>

                    <form action="" method="post" enctype="multipart/form-data">

                        <table class="table table-striped table-middle">
                            <tr>
                                <th width="20%">Nomor Passport</th>
                                <td width="1%">:</td>
                                <td><input type="text" class="form-control" name="passport_number" value="<?php echo $Update[0]['passport_number']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td><input type="text" class="form-control" name="name" value="<?php echo $Update[0]['name']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>:</td>
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="birth_date" value="<?php echo $Update[0]['birth_date']; ?>">
                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>:</td>
                                <td>
                                    <select class="form-control select2bs4" name="role_id" data-placeholder="Select a your citizenship status" name="role_id" required>
                                        <option value="<?php echo $Update[0]['role_id'] ?>" selected><?php echo $Update[0]['role_type'] ?></option>
                                        <?php foreach ($role as $row) : ?>
                                            <option value="<?= $row['role_id'] ?>"><?= $row['role_type'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Negara</th>
                                <td>:</td>
                                <td>
                                    <div class="input-group mb-3">

                                        <input type="text" class="form-control" name="country" value="<?php echo $Update[0]['country']; ?>">
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Penerbangan</th>
                                <td>:</td>
                                <td>
                                    <div class="input-group mb-3">

                                        <input type="text" class="form-control" name="flight_number" value="<?php echo $Update[0]['flight_number']; ?>">
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Penerbangan</th>
                                <td>:</td>
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="flight_date" value="<?php echo $Update[0]['flight_date']; ?>">
                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <th>Maskapai</th>
                                <td>:</td>
                                <td>
                                    <select class="form-control select2bs4" data-placeholder="Select a your citizenship status" name="airline_id" required>
                                        <option value="<?php echo $Update[0]['airline_id'] ?>" selected><?php echo $Update[0]['airlane_name'] ?></option>
                                        <?php foreach ($airline as $row) : ?>
                                            <option value="<?= $row['airline_id'] ?>"><?= $row['airlane_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                            </tr>



                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>:</td>
                                <td>
                                    <?php
                                    if ($Update[0]['gender'] == 'Male') {
                                    ?>

                                        <div class="radio">
                                            <label class="radio"><input type="radio" name="gender" value="Male" checked="checked"> Laki - laki</label>
                                        </div>
                                        <div class="radio">
                                            <label class="radio"><input type="radio" name="gender" value="Female"> Perempuan</label>
                                        </div>
                                    <?php } else {
                                    ?>
                                        <div class="radio">
                                            <label class="radio"><input type="radio" name="gender" value="Male"> Laki - laki</label>
                                        </div>
                                        <div class="radio">
                                            <label class="radio"><input type="radio" name="gender" value="Female" checked="checked"> Perempuan</label>
                                        </div>
                                    <?php
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Visa</th>
                                <td>:</td>
                                <td>
                                    <div class="file-upload">
                                        <div class="drag-text">
                                            <h5>Gambar Saat ini</h5>
                                        </div>
                                        <div class="file-upload-content1">
                                            <center><img class="file-upload-image1" width="100px" height="100px" src="<?php echo base_url('foto/' . $Update[0]['visa']) ?>" alt="your image" /></center>
                                            <div class="image-title-wrap1">
                                                <center> <button type="button" onclick="removeUpload1()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button></center>
                                            </div>
                                        </div>
                                        <div class="image-upload-wrap">

                                            <input class="file-upload-input" type="file" name="visa" onchange="readURL(this);" accept="image/*" />
                                            <div class="drag-text">
                                                <h3>Drag and drop a Image</h3>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" width="100px" height="100px" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                </div>
                </table>

                <button type="submit" class="btn btn-success">
                    <i class="far fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-danger" onclick="javascript:history.back()">
                    <i class="fa fa-arrow-circle-left"></i> Batal
                </button>
                <input type="hidden" name="id_passanger" value="<?php echo $Update[0]['id_passanger']; ?>">
                </form>
                <?php echo form_close() ?>
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>

<!-- /.content-wrapper -->



<?php echo view('Layouts/Bottom'); ?>