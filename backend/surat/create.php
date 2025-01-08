<?php
    require "../../config/connection.php";
    session_start();

    if(isset($_POST['create_surat'])){
        $id_pegawai = $_SESSION['pegawai']['id_pegawai'];
        $uang_saku = $_POST['uang_saku'];
        $lama_perjalanan = $_POST['lama_perjalanan'];
        $tujuan = $_POST['tujuan'];
        $tanggal_berangkat = $_POST['tanggal_berangkat'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $tugas = $_POST['tugas'];
        $penginapan_ls = $_POST['penginapan_ls'];
        $penginapan = $_POST['penginapan'];
        $jasa_tol = $_POST['jasa_tol'];
        $bbm = $_POST['bbm'];
        $biaya_lain = $_POST['biaya_lain'];

        $jumlah_uang_saku = $lama_perjalanan * $uang_saku;
        $total_biaya = $jumlah_uang_saku + $penginapan_ls + $penginapan + $jasa_tol + $bbm + $biaya_lain;

        $create_surat = mysqli_query($database, "INSERT INTO sppd (id_pegawai, lama_perjalanan, tujuan, tanggal_berangkat, tanggal_kembali, tugas, biaya_penginapan_ls, biaya_penginapan, biaya_tol, biaya_bbm, biaya_lain, total_biaya) VALUES ('$id_pegawai', '$lama_perjalanan', '$tujuan', '$tanggal_berangkat', '$tanggal_kembali', '$tugas', '$penginapan_ls', '$penginapan', '$jasa_tol', '$bbm', '$biaya_lain', '$total_biaya')");
        
        if($create_surat){
            $id_sppd = mysqli_insert_id($database);

            $create_riwayat = mysqli_query($database, "INSERT INTO riwayat_pengajuan (id_sppd) VALUES ('$id_sppd')");

            header("Location: ../../pages/surat/pengajuan.php");
        } else {
            echo "Pengajuan Surat Gagal Diajukan.";
        }
    }
?>