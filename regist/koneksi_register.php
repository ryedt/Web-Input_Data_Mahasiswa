<?php
$host = "localhost"; // Host database
$username ="root"; // Username database
$password = ""; // Password database
$database = "mylogin"; // Nama database

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>