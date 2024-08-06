<?php

include "koneksi.php";
$sql= mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE Nim='$_GET[kode]'");
$data= mysqli_fetch_array($sql);

?>

    <style>
        body {
            background-image: url("BG02.jpg");
            background-size: cover;
            color: #000;
            font-family: Cambria, sans-serif;
            font-size: 16px;
            margin: 0;
            padding: 0;
        }
        form {
            background-color: rgba(255, 255, 255, 0.75);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 30px auto;
            max-width: 375px;
            padding: 40px;
        }
        
        h1 {
            color: #000000;
            font-size: 28px;
            margin-bottom: 20px;
            margin-top: 50px;
            text-align: center;
        }
    
        input[type="text"]{
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
            padding: 8px;
            width: 100%;
            background-color: #f8f8f8;
            color: #000;
        }
        input[type="date"] {
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
            padding: 8px;
            width: 100%;
            background-color: #f8f8f8;
            color: #000;
        }
        input[type="submit"] {
            background-color: #1885f1;
            border: none;
            border-radius: 7px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
            margin-top: 30px;
            width: 103%;
        }

    </style>

<body>
    <h1>Edit Data Mahasiswa</h1>
<form action="" method="post">
    <table>
        <tr>
            <td width="110"> Nim </td>
            <td> <input type="text" name="Nim" value="<?php echo $data['Nim'];?>"></td>
        </tr>
        <tr>
            <td> Nama </td>
            <td> <input type="text" name="Nama" value="<?php echo $data['Nama'];?>"></td>
        </tr>
        <tr>
            <td> Tempat Lahir </td>
            <td> <input type="text" name="Tempat_Lahir" value="<?php echo $data['Tempat_Lahir'];?>"></td>
        </tr>
        <tr>
            <td> Tanggal Lahir </td>
            <td> <input type="date" name="Tanggal_Lahir" value="<?php echo $data['Tanggal_Lahir'];?>"></td>
        </tr>
        <tr>
            <td> Telp </td>
            <td> <input type="text" name="Telp" value="<?php echo $data['Telp'];?>"></td>
        </tr>
        <tr>
            <td> Email </td>
            <td> <input type="text" name="Email" value="<?php echo $data['Email'];?>"></td>
        </tr>
        <tr>
            <td> </td>
            <td> <input type="submit" value="Simpan" name="proses"></td>
        </tr>
    </table>
</form>
</body>

<?php
include "koneksi.php";
if(isset($_POST['proses'])){
    mysqli_query($koneksi, "update mahasiswa set 
    Nama ='$_POST[Nama]',
    Tempat_Lahir ='$_POST[Tempat_Lahir]',
    Tanggal_Lahir ='$_POST[Tanggal_Lahir]',
    Telp ='$_POST[Telp]',
    Email ='$_POST[Email]'
    WHERE Nim = '$_GET[kode]'");

    echo "Data berhasil diedit!";
    echo "<meta http-equiv=refresh content=1;URL='Output.php'>";
}
?>