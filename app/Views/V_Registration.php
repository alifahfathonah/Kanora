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
                    <h3 class="card-title"><b>Registration form</b></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="Registration/insertData" enctype="multipart/form-data">
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

                        <div class="form-group">
                            <small><label for="exampleInputEmail1">Nomor Passport / <i>Passport Number</i></label></small>
                            <input type="text" class="form-control" name="passport_number" placeholder="Your Passport Number" autocomplete="hidden" required>
                        </div>
                        <div class="form-line">
                            <small><label>Status Warga Negara / <i>Citizenship Status</i></label></small>
                            <select class="form-control select2bs4" name="role_id" data-placeholder="Select a your citizenship status" style="width: 100%;" required>
                                <option selected disabled></option>
                                <?php foreach ($role as $row) : ?>
                                    <option value="<?= $row['role_id'] ?>"><?= $row['role_type'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class=" form-group">
                            <small><label for="exampleInputEmail1">Nama Lengkap / <i>Full Name</i></label></small>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Your Full Name" required>
                        </div>
                        <div class="form-group">
                            <small><label>Tanggal Lahir / <i>Birth Date</i></label></small>

                            <input type="date" name="birth_date" class="form-control" required />

                        </div>
                        <div class="form-group">
                            <small><label>Jenis Kelamin / <i>Gender</i></label></small><br>
                            <div class="icheck-primary d-inline">
                                <input type="radio" value="Male" id="radioPrimary1" name="gender" checked>
                                <label for="radioPrimary1">Male
                                </label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" value="Female" id="radioPrimary2" name="gender">
                                <label for="radioPrimary2">Female
                                </label>
                            </div>
                        </div>
                        <div class=" form-group">
                            <small><label for="exampleInputEmail1">Negara / <i>Country</i></label></small>
                            <input type="text" class="form-control" name="country" placeholder="Country" required>
                        </div>
                        <div class="form-group">
                            <small><label>Tanggal Penerbangan / <i>Flight Date</i></label></small>

                            <input type="date" name="flight_date" class="form-control" required />

                        </div>
                        <div class=" form-group">
                            <small><label for="exampleInputEmail1">Nomor Penerbangan / <i>Flight Number</i></label></small>
                            <input type="text" class="form-control" name="flight_number" placeholder="Your Flight Number" required>
                        </div>
                        <div class="form-line">
                            <small><label>Maskapai / <i>Airlines</i></label></small>
                            <select class="form-control select2bs4" name="airline_id" data-placeholder="Select airlines" style="width: 100%;" required>
                                <option selected disabled></option>
                                <?php foreach ($airline as $row) : ?>
                                    <option value="<?= $row['airline_id'] ?>"><?= $row['airlane_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <small><label for="exampleInputFile">Unggah Visa / <i>Upload Visa</i></label></small>
                            <div class="input-group">
                                <div class="file-upload">
                                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )" accept="image/*">Add Image</button>

                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" type='file' name="visa" onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Drag and drop a Image</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <center><button type="submit" class="btn btn-primary" style="width: 50%; font-family:Verdana, Geneva, 'Tahoma', sans-serif;">SAVE</button></center>
                            <a href="<?= base_url('Registration/validation')  ?>">

                                <h6 style="color:black; margin-top:20px; text-align:center;"><i class="fas fa-download text-md"> Unduh bukti pendaftaran / <i>download proof of registration</i></i></h6>
                            </a>
                            <br>
                            <br>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- /.card -->
<?php echo view('Layouts/Rb'); ?>