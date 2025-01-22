<?php
    require "../../config/connection.php";

    if(isset($_POST['revisi'])){
        $id_riwayat = $_POST['id_riwayat'];
        $id_pengajuan = $_POST['id_pengajuan'];
        $tujuan = $_POST['tujuan'];
        $tanggal_berangkat = $_POST['tanggal_berangkat'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $tugas = $_POST['tugas'];
        $pemberi_perintah = $_POST['pemberi_perintah'];
        $jumlah_hari = $_POST['jumlah_hari'];
        $jumlah_malam = $_POST['jumlah_malam'];
        $laporan_perjalanan = $_POST['laporan_perjalanan'];
        $biaya_penginapan_ls = $_POST['biaya_penginapan_ls'];
        $biaya_penginapan = $_POST['biaya_penginapan'];
        $biaya_tol = $_POST['biaya_tol'];
        $biaya_bahan_bakar = $_POST['biaya_bahan_bakar'];
        $biaya_lain = $_POST['biaya_lain'];

        $update_pengajuan = mysqli_query($database, "UPDATE pengajuan_sppd SET tujuan = '$tujuan', tanggal_berangkat = '$tanggal_berangkat', tanggal_kembali = '$tanggal_kembali', tugas = '$tugas', pemberi_perintah = '$pemberi_perintah', jumlah_hari = '$jumlah_hari', jumlah_malam = '$jumlah_malam', laporan_perjalanan = '$laporan_perjalanan', biaya_penginapan_ls = '$biaya_penginapan_ls', biaya_penginapan = '$biaya_penginapan', biaya_tol = '$biaya_tol', biaya_bahan_bakar = '$biaya_bahan_bakar', biaya_lain = '$biaya_lain' WHERE id_pengajuan = '$id_pengajuan'");
        
        $update_status = mysqli_query($database, "UPDATE riwayat_pengajuan SET status_pengajuan = 'Pending', keterangan = '' WHERE id_riwayat = '$id_riwayat'");
          
        if ($update_pengajuan && $update_status) {
            header("Location:../../pages/surat/riwayat_pengajuan_pegawai.php");
            echo "Pengajuan berhasil diupdate";
        } else {
            echo "Pengajuan Gagal diupdate";
        }
    }
?>