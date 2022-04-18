<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="assets/img/KKP.png" style="width:60px; height:auto; position:absolute;">
    <img src="assets/img/soetta.jpg" style="width:auto; height:60px; position:absolute; margin-left:85%;">
    <table width="100%">

        <tr>
            <td align="center">
                <span style="line-height:1.6; font-weight:bold;">
                    KANTOR KARANTINA PELABUHAN<br />BANDAR UDARA INTERNATIONAL SOEKARNO-HATTA<br />TERMINAL 3
                </span>

            </td>
        </tr>
    </table>
    <p align="center" style="font-size: 9pt;">Bandara Soekarno Hatta, Jl. P2, Pajang, Benda, Pajang, Benda, Kota Tangerang, Banten 15126</p>
    <hr />
    <h4 align="center">BUKTI PENDAFTARAN / <i>Proof of Registration</i></h4>


    <table class=" table table-striped table-middle" cellpadding="4">

        <tr>
            <th width="20%">Passport Number</th>

            <td width="20%">:</td>

            <td><?php echo $print[0]['passport_number']; ?></td>
        </tr>
        <br>
        <tr>
            <th>Name</th>
            <td>:</td>
            <td><?php echo $print[0]['name']; ?></td>
        </tr>
        <br>
        <tr>
            <th>Birth Date</th>
            <td>:</td>
            <td><?php echo ($print[0]['birth_date'] != '0000-00-00') ? date('d-m-Y', strtotime($print[0]['birth_date'])) : '' ?></td>
        </tr>
        <br>
        <tr>
            <th>Gender</th>
            <td>:</td>
            <td><?php echo $print[0]['gender']; ?></td>
        </tr>
        <br>
        <tr>
            <th>Country</th>
            <td>:</td>
            <td><?php echo $print[0]['country']; ?></td>
        </tr>
        <br>
        <tr>
            <th>Flight Number</th>
            <td>:</td>
            <td><?php echo $print[0]['flight_number']; ?></td>
        </tr>
        <br>
        <tr>
            <th>Flight Date</th>
            <td>:</td>
            <td><?php echo ($print[0]['flight_date'] != '0000-00-00') ? date('d-m-Y', strtotime($print[0]['flight_date'])) : '' ?></td>
        </tr>
        <br>
        <tr>
            <th>Airlines</th>
            <td>:</td>
            <td><?php echo $print[0]['airlane_name']; ?></td>
        </tr>
        <br>
        <tr>
            <th>Visa</th>
            <td>:</td>
            <td><img width="70px" height="70px" src="<?= 'foto/' . $print[0]['visa'] ?>"></td>
        </tr>

    </table>
    <br />
    <br />
    <br />

</body>

</html>