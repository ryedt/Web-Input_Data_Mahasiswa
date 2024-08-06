<?php
require_once('koneksi_register.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah username sudah digunakan
    $checkQuery = "SELECT * FROM user WHERE username = '$username'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Jika username sudah digunakan, tampilkan pesan error
        $error = 'Username sudah digunakan. Silakan gunakan username lain.';
    } else {
        // Jika username belum digunakan, simpan data ke database
        $insertQuery = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        $insertResult = $conn->query($insertQuery);

        if ($insertResult) {
            // Registrasi berhasil, redirect pengguna ke halaman login
            header('Location: regist.html');
            exit();
        } else {
            // Jika gagal menyimpan data, tampilkan pesan error
            $error = 'Gagal melakukan registrasi. Silakan coba lagi.';
        }
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Register</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            
            th, td {
                text-align: left;
                padding: 8px;
            }
            
            th {
                background-color: #f2f2f2;
            }
            
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>
            <h2>Data Registrasi</h2>
            <table>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
                <?php
                $dataQuery = "SELECT * FROM register";
                $dataResult = $conn->query($dataQuery);

                while ($row = $dataResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['Username'] . '</td>';
                    echo '<td>' . $row['Email'] . '</td>';
                    echo '<td>' . $row['Password'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        
    </body>
</html>