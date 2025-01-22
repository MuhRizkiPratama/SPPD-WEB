<?php
    require "../../config/connection.php";
    session_start();

    if(isset($_POST['create_surat'])){
        $id_pegawai = $_SESSION['detail_pegawai']['id_pegawai'];
        $uang_saku = $_POST['uang_saku'];
        $jumlah_hari = $_POST['jumlah_hari'];
        $jumlah_malam = $_POST['jumlah_malam'];
        $tujuan = $_POST['tujuan'];
        $pemberi_perintah = $_POST['pemberi_perintah'];
        $tanggal_berangkat = $_POST['tanggal_berangkat'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $tugas = $_POST['tugas'];
        $laporan = $_POST['laporan_perjalanan'];
        $biaya_penginapan_ls = $_POST['biaya_penginapan_ls'];
        $biaya_penginapan = $_POST['biaya_penginapan'];
        $biaya_tol = $_POST['biaya_tol'];
        $biaya_bahan_bakar = $_POST['biaya_bahan_bakar'];
        $biaya_lain = $_POST['biaya_lain'];

        $jumlah_uang_saku = $jumlah_hari * $uang_saku;
        $total_biaya = $jumlah_uang_saku + $biaya_penginapan_ls + $biaya_penginapan + $biaya_tol + $biaya_bahan_bakar + $biaya_lain;

        $create_surat = mysqli_query($database, "INSERT INTO pengajuan_sppd (id_pegawai, tujuan, pemberi_perintah, jumlah_hari, jumlah_malam, tanggal_berangkat, tanggal_kembali, tugas, laporan_perjalanan, biaya_penginapan_ls, biaya_penginapan, biaya_tol, biaya_bahan_bakar, biaya_lain, total_biaya) VALUES ('$id_pegawai', '$tujuan', '$pemberi_perintah', '$jumlah_hari', '$jumlah_malam', '$tanggal_berangkat', '$tanggal_kembali', '$tugas', '$laporan', '$biaya_penginapan_ls', '$biaya_penginapan', '$biaya_tol', '$biaya_bahan_bakar', '$biaya_lain', '$total_biaya')");
        
        if($create_surat){
            $id_pengajuan = mysqli_insert_id($database);

            $create_riwayat = mysqli_query($database, "INSERT INTO riwayat_pengajuan (id_pengajuan) VALUES ('$id_pengajuan')");

            header("Location: ../../pages/manajemen_surat/pengajuan.php");
        } else {
            echo "Pengajuan Surat Gagal Diajukan.";
        }
    }
?>