<!DOCTYPE html>
<html>
<head>
    <title>Tabel Data Mahasiswa ITS Mandiri</title>
    <style>
        body {
            background-image: url("BG02.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            color: #000;
            font-family: Arial, sans-serif;
            font-size: 16px;
            margin: 0;
            padding: 0;
        }
        .unduh {
            margin-top: 20px;
            margin-left: 90%;
            cursor: pointer;
        }
		.logo-container {
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        text-align: center;
        margin-bottom: 20px;
        }
        .logo {
            width: 100px;
        }

        h1 {
            color: #003366;
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.65);
        }

        table th,
        table td {
            padding: 8px;
            border: 1px solid #000;
        }
        .center{
            text-align: center;
        }
        .link-button {
            background-color: #0059ff;
            border-color: Black;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 7px;
            width: 500px;
        }
        .hapus {
            background-color: #0059ff;
            border-color: Black;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 7px;
            margin-top: 30px;
            margin-left: 343px;
            width: 50%;
        }
        
  </style>

</head>
<body>
    <button onclick="window.location.href='Download.php'" class="unduh">Download</button>
<div class="logo-container">
        <img class="logo" src="Logo.png" alt="ITS Mandiri Logo">
        <h1>Tabel Data Mahasiswa ITS Mandiri</h1>
    </div>


    <?php
    // Konfigurasi koneksi ke MySQL
    $host = "localhost"; // Host database
    $username = "root"; // Username database
    $password = ""; // Password database
    $database = "db_rpl"; // Nama database

    // Koneksi ke MySQL
    $koneksi = mysqli_connect($host, $username, $password, $database);

    // Cek koneksi ke MySQL
    if (mysqli_connect_errno()) {
        echo "Koneksi gagal: " . mysqli_connect_error();
    }

    // Memeriksa apakah data dikirim melalui metode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form_input.html
        $Nim = $_POST["Nim"];
        $Nama = $_POST["Nama"];
        $Tempat_Lahir = $_POST["Tempat_Lahir"];
        $Tanggal_Lahir = $_POST["Tanggal_Lahir"];
        $Telp = $_POST["Telp"];
        $Email = $_POST["Email"];
    
        // Query untuk menyimpan data ke database
        $query = "INSERT INTO mahasiswa (Nim, Nama, Tempat_Lahir, Tanggal_Lahir, Telp, Email) VALUES ('$Nim', '$Nama', '$Tempat_Lahir', '$Tanggal_Lahir', '$Telp', '$Email')";
    
        // Eksekusi query
        $result = mysqli_query($koneksi, $query);
    
        // Cek hasil eksekusi query
        if ($result) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($koneksi);
        }
    }

    // Query untuk menampilkan data mahasiswa
    $sql = "SELECT Nim, Nama, `Tempat_Lahir`, `Tanggal_Lahir`, Telp, Email FROM mahasiswa";

    // Eksekusi query
    $result = mysqli_query($koneksi, $sql);

    // Cetak hasil query dalam bentuk tabel
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Nim</th><th>Nama</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>Telp</th><th>Email</th><th colspan='2'>Aksi</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . (isset($row["Nim"]) ? $row["Nim"] : "") . "</td>";
            echo "<td>" . (isset($row["Nama"]) ? $row["Nama"] : "") . "</td>";
            echo "<td>" . (isset($row["Tempat_Lahir"]) ? $row["Tempat_Lahir"] : "") . "</td>";
            echo "<td>" . (isset($row["Tanggal_Lahir"]) ? $row["Tanggal_Lahir"] : "") . "</td>";
            echo "<td>" . (isset($row["Telp"]) ? $row["Telp"] : "") . "</td>";
            echo "<td>" . (isset($row["Email"]) ? $row["Email"] : "") . "</td>";
            echo "<td><a href='?kode=$row[Nim]'> Hapus </a> </td>";
            echo "<td><a href='Edit.php?kode=$row[Nim]'> Edit </a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    if(isset($_GET['kode'])){
        mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE Nim='$_GET[kode]'");
        echo "Data telah terhapus";
        echo "<meta http-equiv=refresh content=2;URL='Output.php'>";
    }
    // Tutup koneksi
    mysqli_close($koneksi);

    ?>
    <div class="center">
    <button onclick="window.location.href='Beranda.php'" class="link-button">Kembali</button>
    </div>
    
</body>
</html>