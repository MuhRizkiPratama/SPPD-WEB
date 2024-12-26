<?php

    require "../../config/database.php";
    $query = "SELECT * FROM Pegawai JOIN jabatan";
    $result = mysqli_query($database, $query);  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="mb-3">
            <label for="no_badge">No Badge:</label>
            <input type="number" name="no_badge" id="no_badge">
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir">
        </div>
        <div class="mb-3">
            <label for="role">Role:</label>
            <select name="role" id="role">
                <option disabled selected></option>
                <option value="pegawai">Pegawai</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap">
        </div>
        <div class="mb-3">
            <label for="uang_saku">Uang Saku:</label>
            <input type="number" name="uang_saku" id="uang_saku">
        </div>
    </form>
</body>
</html>