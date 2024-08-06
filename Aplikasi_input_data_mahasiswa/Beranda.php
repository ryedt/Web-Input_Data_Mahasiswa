<html>
<head>
<title>Beranda</title>
<style>
html {
    font-family: "Lucida Sans”;
}
* {
    box-sizing: border-box; 
}
body {
            background-image: url("giphy.gif");
            background-size: cover;
        }
form {
    background-color: rgba(0,0,0,.7);
    box-shadow: 0 0 10px rgba(255,255,255,.3);
    border-radius: 20px;
    margin: 100px auto;
    max-width: 650px;
    padding: 40px;
}
 
.kiri {
width: 25%;
float: left;
padding-right: 15px;
padding-top: 15px;
padding-bottom: 15px;
border: none;
    text-decoration: none;
}
.menu{
    border: none;
    text-decoration: none;
}
.konten {
color: #90caf9;
margin-top: 20px;
width: 75%;
float: right;
padding: 15px;
}
 
.header {
    background-color: #752BEA;
    color: #ffffff;
    padding: 15px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 3px rgba(0,0,0,20);
}
.menu ul {
    border: none;
    text-decoration: none;
    font-size: 20px;
    margin: 0;
    padding: 0;
}
.menu li {
    border: none;
    text-decoration: none;
    padding: 8px;
    margin-bottom: 7px;
    background-color :#752BEA;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,20);
}
.menu li:hover{
    background-color :#9a5bff
}

.footer{
    font-size: 16px;
    cursor: pointer;
    color: white;
    margin: bottom;
    clear: both;
    background-color: #752BEA;
    padding: 10px;
    text-align: center; 
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 3px rgba(0,0,0,20);
}
</style>
</head>
<body>
<?php if (isset($error)) : ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
<form>
    <div class="header">
    <h1><center>APLIKASI MAHASISWA ITS MANDIRI</center></h1>
    </div>
 
<div class="kiri">
<div class="menu">
<ul>
<a href='Input.html'><li>Input Data</li></a>
<a href='Output.php'><li>Laporan Data Mahasiswa</li></a>
<a href='masuk.php'><li>Keluar</li></a>
</ul>
</div>
</div>
 
<div class="konten">
<h1>Selamat Datang</h1>
<p>Ini adalah aplikasi sederhana untuk input data Mahasiswa</p>
</div>
 
<div class="footer">

</div>
</form>
</body>
</html>