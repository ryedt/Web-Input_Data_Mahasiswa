<?php
require_once('koneksi.php');

if ((isset($_POST['key'])) && ($_POST['key'] == "api")) {
    $loginUsername = $_POST['username'];
    $password = $_POST['password'];

    $LoginRS__query = sprintf(
        "SELECT userid, username, password FROM user WHERE username=%s AND password=%s",
        app($koneksi, $loginUsername, "text"),
        app($koneksi, $password, "text")
    );
    $LoginRS = mysqli_query($koneksi, $LoginRS__query) or die(mysqli_error($koneksi));
    $row_rs_LoginRS = mysqli_fetch_assoc($LoginRS);
    $loginFoundUser = mysqli_num_rows($LoginRS);

    if ($loginFoundUser) {
        $response['kode'] = 1;
        $response['pesan'] = "sukses";
        $response['halaman'] = "Dasboard";

        $response['data'] = array();
        $no = 1;
        foreach ($LoginRS as $row_rs_LoginRS) {
            $Data['id'] = $row_rs_LoginRS['userid'];
            $Data['username'] = $row_rs_LoginRS['username'];
            $Data['password'] = $row_rs_LoginRS['password'];
            array_push($response['data'], $Data);
            $no++;
        }
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "gagal";
        $response['halaman'] = "Login";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}
