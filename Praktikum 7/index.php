<?php 
    if(isset($_POST["submit"])){
        $nilai_akhir = $_POST["tugas"]*0.4 + $_POST["uts"]*0.3 + $_POST["uas"]*0.3;

        if ($nilai_akhir>=80) {
            $keterangan = "Anda Dinyatakan Lulus Dengan Predikat A";
        }elseif ($nilai_akhir>=70) {
            $keterangan = "Anda Dinyatakan Lulus Dengan Predikat B";
        }else {
            $keterangan = "Anda Dinyatakan Lulus Dengan Predikat C";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Akhir Mahasiswa</title>
</head>
<body>
    <h2>Input Nilai Mahasiswa</h2>
    <form action="" method="post">
        <table  border = "0" cellpadding="10">
            <tr>
                <td><label for="nama">Nama </label></td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td><input type="text" name="nim" id="nim"></td>
            </tr>
            <tr>
                <td><label for="tugas">Nilai Tugas</label></td>
                <td><input type="number" name="tugas" id="tugas"></td>
            </tr>
            <tr>
                <td><label for="uts">Nilai UTS</label></td>
                <td><input type="number" name="uts" id="uts"></td>
            </tr>
            <tr>
                <td><label for="uas">Nilai UAS</label></td>
                <td><input type="number" name="uas" id="uas"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
    <br><hr>
    <?php if(isset($nilai_akhir)){ ?>   
        <h2>Nilai Akhir Mahasiswa</h2>
        <table  border = "0" cellpadding="10">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $_POST["nama"]; ?></td>
            </tr>
            <tr>
                <td>Nilai Tugas</td>
                <td>:</td>
                <td><?= $_POST["tugas"]; ?></td>
            </tr>
            <tr>
                <td>Nilai UTS</td>
                <td>:</td>
                <td><?= $_POST["uts"]; ?></td>
            </tr>
            <tr>
                <td>Nilai UAS</td>
                <td>:</td>
                <td><?= $_POST["uas"]; ?></td>
            </tr>
            <tr>
                <td>Nilai Akhir</td>
                <td>:</td>
                <td><?= $nilai_akhir; ?></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><?= $keterangan; ?></td>
            </tr>
            <tr>
                <td><a href=""><button>Clear</button></a></td>
            </tr>
        </table>
    <?php } ?>
</body>
</html>
