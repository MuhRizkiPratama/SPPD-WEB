<?php
    require "../../config/connection.php";

    if(isset($_POST['disetujui'])){
        $id_pengajuan = $_POST['id_pengajuan'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];

        $verifikasi_disetujui = mysqli_query($database, "UPDATE riwayat_pengajuan SET status_pengajuan = '$status', keterangan = '$keterangan' WHERE id = '$id_pengajuan'");

        if($verifikasi_disetujui){

            $tanggal = date('Y-m-d H:i:s');
            $bulan = date('n', strtotime($tanggal));
            $tahun = date('Y', strtotime($tanggal));

            $romawi_bulan = [1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'];
            $angka_romawi = $romawi_bulan[$bulan];

            $no = 1;

            $no_surat = "$no/SPPD/KIKC/$angka_romawi/$tahun";

            $insert_pengelolaan_sppd = mysqli_query($database, "INSERT INTO pengelolaan_sppd (id_sppd, no_surat) SELECT id_sppd, '$no_surat' FROM riwayat_pengajuan WHERE id = '$id_pengajuan'");
            header('Location: ../../pages/surat/riwayat.php');
        }
    }

    if(isset($_POST['ditolak'])){
        $id_pengajuan = $_POST['id_pengajuan'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];

        $verifikasi_ditolak = mysqli_query($database, "UPDATE riwayat_pengajuan SET status_pengajuan = '$status', keterangan = '$keterangan' WHERE id = '$id_pengajuan'");

        if($verifikasi_ditolak){
            header('Location: ../../pages/surat/riwayat.php');
        }
    }
?>