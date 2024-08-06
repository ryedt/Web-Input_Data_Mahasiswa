<!DOCTYPE html>
<html>

<head>
    <title>Profil Mahasiswa</title>
    <style>
        /* CSS untuk memperindah tampilan */
        body {
            text-align: center;
        }

        .profil-container {
            width: 500px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f8f8f8;
        }

        .profil-image {
            max-width: 100%;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <h1>Profil Mahasiswa</h1>
    <div class="profil-container">
        <h2>MUHAMMAD TEDY RAMADAN</h2>
        <p>NIM : 220110018</p>
        <p>Jurusan : Ilmu Komputer 2020</p>
        <img class="profil-image" src="<?= base_url('uploads/IMG20220802183317.jpg'); ?>" alt="Foto Profil">
    </div>
</body>

</html>