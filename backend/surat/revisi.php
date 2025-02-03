<?php
    require "../../config/connection.php";

    if(isset($_POST['revisi'])){
        $id_riwayat = $_POST['id_riwayat'];
        $id_pengajuan = $_POST['id_pengajuan'];
        $uang_saku = $_POST['uang_saku'];
        $tujuan = $_POST['tujuan'];
        $tanggal_berangkat = $_POST['tanggal_berangkat'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $tugas = $_POST['tugas'];
        $pemberi_perintah = $_POST['pemberi_perintah'];
        $laporan_perjalanan = $_POST['laporan_perjalanan'];
        $biaya_penginapan = $_POST['biaya_penginapan'];
        $biaya_tol = $_POST['biaya_tol'];
        $biaya_bahan_bakar = $_POST['biaya_bahan_bakar'];
        $biaya_lain = $_POST['biaya_lain'];

        $date1 = strtotime($tanggal_berangkat);
        $date2 = strtotime($tanggal_kembali);
        $jumlah_hari = ($date2 - $date1) / (60 * 60 * 24);

        if ($jumlah_hari == 0) {
            $jumlah_hari = 1;
        }

        $jumlah_uang_saku = $jumlah_hari * $uang_saku;
        $total_biaya = $jumlah_uang_saku + $biaya_penginapan + $biaya_tol + $biaya_bahan_bakar + $biaya_lain;

        $select_bukti = mysqli_query($database, "SELECT bukti_penginapan, bukti_tol, bukti_bahan_bakar, bukti_lain FROM pengajuan_sppd WHERE id_pengajuan = '$id_pengajuan'");
        $bukti_biaya = mysqli_fetch_assoc($select_bukti);

        $bukti_penginapan_path = $bukti_biaya['bukti_penginapan'];
        if (!empty($_FILES['bukti_penginapan']['name'])) {
            $bukti_penginapan_name = time().'-'.md5(rand()).'-'.$_FILES['bukti_penginapan']['name'];
            $bukti_penginapan_path = "../../assets/bukti biaya/penginapan/" . $bukti_penginapan_name;
            move_uploaded_file($_FILES['bukti_penginapan']['tmp_name'], $bukti_penginapan_path);
        }

        $bukti_tol_path = $bukti_biaya['bukti_tol'];
        if (!empty($_FILES['bukti_tol']['name'])) {
            $bukti_tol_name = time().'-'.md5(rand()).'-'.$_FILES['bukti_tol']['name'];
            $bukti_tol_path = "../../assets/bukti biaya/tol/" . $bukti_tol_name;
            move_uploaded_file($_FILES['bukti_tol']['tmp_name'], $bukti_tol_path);
        }

        $bukti_bahan_bakar_path = $bukti_biaya['bukti_bahan_bakar'];
        if (!empty($_FILES['bukti_bahan_bakar']['name'])) {
            $bukti_bahan_bakar_name = time().'-'.md5(rand()).'-'.$_FILES['bukti_bahan_bakar']['name'];
            $bukti_bahan_bakar_path = "../../assets/bukti biaya/bahan bakar/" . $bukti_bahan_bakar_name;
            move_uploaded_file($_FILES['bukti_bahan_bakar']['tmp_name'], $bukti_bahan_bakar_path);
        }

        $bukti_lain_path = $bukti_biaya['bukti_lain'];
        if (!empty($_FILES['bukti_lain']['name'])) {
            $bukti_lain_name = time().'-'.md5(rand()).'-'.$_FILES['bukti_lain']['name'];
            $bukti_lain_path = "../../assets/bukti biaya/lain lain/" . $bukti_lain_name;
            move_uploaded_file($_FILES['bukti_lain']['tmp_name'], $bukti_lain_path);
        }

        $update_pengajuan = mysqli_query($database, "UPDATE pengajuan_sppd SET tujuan = '$tujuan', tanggal_berangkat = '$tanggal_berangkat', tanggal_kembali = '$tanggal_kembali', tugas = '$tugas', pemberi_perintah = '$pemberi_perintah', jumlah_hari = '$jumlah_hari', laporan_perjalanan = '$laporan_perjalanan', biaya_penginapan = '$biaya_penginapan', biaya_tol = '$biaya_tol', biaya_bahan_bakar = '$biaya_bahan_bakar', biaya_lain = '$biaya_lain', total_biaya = '$total_biaya', bukti_penginapan = '$bukti_penginapan_path', bukti_tol =  '$bukti_tol_path', bukti_bahan_bakar = '$bukti_bahan_bakar_path', bukti_lain = '$bukti_lain' WHERE id_pengajuan = '$id_pengajuan'");
        
        $update_status = mysqli_query($database, "UPDATE riwayat_pengajuan SET status_pengajuan = 'Pending', keterangan = '' WHERE id_riwayat = '$id_riwayat'");
          
        if ($update_pengajuan && $update_status) {
            $_SESSION['success'] = "SPPD berhasil diajukan."; "Pengajuan berhasil diupdate";
            header("Location:../../pages/manajemen_surat/riwayat_pengajuan_pegawai.php");
        } else {
            $_SESSION['failed'] = "SPPD berhasil diajukan.";echo "Pengajuan Gagal diupdate";
            header("Location:../../pages/manajemen_surat/riwayat_pengajuan_pegawai.php");
        }
    }
?>