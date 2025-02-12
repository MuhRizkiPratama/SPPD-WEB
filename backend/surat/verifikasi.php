<?php
    require "../../config/connection.php";
    session_start();

    if(isset($_POST['disetujui'])){
        $id_verifikator = $_SESSION['id_admin'];
        $id_riwayat = $_POST['id_riwayat'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];

        $verifikasi_disetujui = mysqli_query($database, "UPDATE riwayat_pengajuan SET id_verifikator = '$id_verifikator', status_pengajuan = '$status', keterangan = '$keterangan' WHERE id_riwayat = '$id_riwayat'");

        if($verifikasi_disetujui){
            $tanggal = date('Y-m-d H:i:s');
            $bulan = date('n', strtotime($tanggal));
            $tahun = date('Y', strtotime($tanggal));

            $romawi_bulan = [1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'];
            $angka_romawi = $romawi_bulan[$bulan];

            $jumlah_surat = mysqli_query($database, "SELECT COUNT(*) as total FROM sppd_terverifikasi");
            $data = mysqli_fetch_assoc($jumlah_surat);
            $no = $data['total'] + 1;

            $no_surat = "$no/SPPD/KIKC/$angka_romawi/$tahun";

            $insert_surat_terverifikasi = mysqli_query($database, "INSERT INTO sppd_terverifikasi (id_pengajuan, no_surat) SELECT id_pengajuan, '$no_surat' FROM riwayat_pengajuan WHERE id_riwayat = '$id_riwayat'");
            header('Location: ../../pages/manajemen_surat/riwayat_pengajuan_admin.php');
            exit();
        }
    }
    
    if(isset($_POST['ditolak'])){
        $id_riwayat = $_POST['id_riwayat'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];

        $verifikasi_ditolak = mysqli_query($database, "UPDATE riwayat_pengajuan SET id_verifikator = '$id_verifikator', status_pengajuan = '$status', keterangan = '$keterangan' WHERE id_riwayat = '$id_riwayat'");

        if($verifikasi_ditolak){
            header('Location: ../../pages/manajemen_surat/riwayat_pengajuan_admin.php');
            exit();
        }
    }
?>