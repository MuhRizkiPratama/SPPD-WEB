<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['update_jabatan'])) {
        $id_jabatan = $_POST["id_jabatan"];
        $nama_jabatan = $_POST["nama_jabatan"];

        $update_jabatan = mysqli_query($database, "UPDATE jabatan SET nama_jabatan = '$nama_jabatan' WHERE id_jabatan = '$id_jabatan'");

        if ($update_jabatan) {
            $_SESSION['success'] = "Data jabatan berhasil diedit.";
            header("Location:../../pages/master_pegawai/jabatan.php");
        } else {
            $_SESSION['success'] = "Data jabatan gagal diedit.";
            header("Location:../../pages/master_pegawai/jabatan.php");
        }
    }
?>
