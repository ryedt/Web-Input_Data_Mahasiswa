<?php
require_once('koneksi_register.php');

// Mendapatkan data yang dikirim melalui form login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menghindari SQL Injection dengan menggunakan prepared statement
    $stmt = $conn->prepare("SELECT * FROM register WHERE Username = ? AND Password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login berhasil, arahkan pengguna ke halaman beranda
        header('Location: beranda.php');
        exit();
    } else {
        // Login gagal, tampilkan pesan error
        $error = 'Username atau password salah.';
    }

    $stmt->close();
} else {
    $error = '';
}

$conn->close();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Login Gagal</title>
        <link rel="stylesheet" href="style.css">
    </head>
<style>
    .link-button {
            background-color: #752BEA;
            border-color: Black;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 7px;
            margin-left: 37%;
    }
    </style>
    <body>
        <div class="container">
            <h1>maaf!</h1>
            <?php if (isset($error)) : ?>
                <p><?php echo $error; ?></p>
            <?php endif; ?>
            <button onclick="window.location.href='Masuk.php'" class="link-button">Kembali</button>
        </div>
    </body>
</html>