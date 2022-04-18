<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Print</title>
</head>
<style>
    table {

        border-collapse: collapse;
    }
</style>

<body>
    <img src="assets/img/KKP.png" style="width:60px; height:auto; position:absolute;">
    <img src="assets/img/soetta.jpg" style="width:auto; height:60px; position:absolute; margin-left:88%;">
    <table width="100%">
        <tr>
            <td align="center">
                <span style="line-height:1.6; font-weight:bold;">
                    KANTOR KARANTINA PELABUHAN<br />BANDAR UDARA INTERNATIONAL SOEKARNO-HATTA<br />TERMINAL 3
                </span>
            </td>
        </tr>
    </table>

    <hr />

    <h4 align="center">Data Penumpang <?php echo date('F Y') ?></h4>
    <table width="100%" border="2" cellpadding="0">
        <thead>
            <tr>
                <th>No</th>
                <th>No Passport</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <!-- <th>Lahir</th> -->
                <th>Tanggal Lahir</th>
                <th>No Penerbangan</th>
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
                    <td align="center"><?php echo $nomor++ ?>.</td>
                    <td align="center"><?= $row['passport_number'] ?></td>
                    <td align="center"><?= $row['name'] ?></td>

                    <td align="center"><?= $row['gender'] ?></td>
                    <td align="center"><?= ($row['birth_date'] != '0000-00-00') ? date('d-m-Y', strtotime($row['birth_date'])) : '' ?></td>
                    <td align="center"><?= $row['flight_number'] ?></td>
                    <td align="center"><?= ($row['flight_date'] != '0000-00-00') ? date('d-m-Y', strtotime($row['flight_date'])) : '' ?></td>

                    <td align="center"><?= $row['airlane_name'] ?></td>
                    <td align="center"><?= $row['country'] ?></td>
                    <td align="center"><img width="70px" height="70px" src="<?= 'foto/' . $row['visa'] ?>"></td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>