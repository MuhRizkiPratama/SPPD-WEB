<?php
    require "../../config/connection.php";

    session_start();

    if (isset($_POST['update_pegawai'])) {
        $id_pegawai = $_POST["id_pegawai"];
        $no_badge = $_POST['no_badge'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $uang_saku = $_POST['uang_saku'];

        $update_pegawai = mysqli_query($database, "UPDATE pegawai SET no_badge = '$no_badge', tanggal_lahir = '$tanggal_lahir', nama_pegawai = '$nama_pegawai', uang_saku = '$uang_saku' WHERE id_pegawai = '$id_pegawai'");

        if ($update_pegawai) {
            $_SESSION['success'] = "Data pegawai berhasil diedit.";
            header("Location:../../pages/master_pegawai/pegawai.php");
            exit();
        } else {
            $_SESSION['failed'] = "Data pegawai gagal diedit.";
            header("Location:../../pages/master_pegawai/pegawai.php");
            exit();
        }
    }
?>
