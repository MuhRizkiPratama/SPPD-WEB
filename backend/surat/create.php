<?php
    require "../../config/connection.php";
    session_start();

    if(isset($_POST['create_surat'])){
        $id_pegawai = $_SESSION['detail_pegawai']['id_pegawai'];
        $uang_saku = $_POST['uang_saku'];
        $tujuan = $_POST['tujuan'];
        $pemberi_perintah = $_POST['pemberi_perintah'];
        $tanggal_berangkat = $_POST['tanggal_berangkat'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $tugas = $_POST['tugas'];
        $laporan = $_POST['laporan_perjalanan'];
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

        $bukti_penginapan_path = NULL;
        if (!empty($_FILES['bukti_penginapan']['name'])) {
            $bukti_penginapan_name = time().'-'.md5(rand()).'-'.$_FILES['bukti_penginapan']['name'];
            $bukti_penginapan_path = "../../assets/bukti biaya/penginapan/" . $bukti_penginapan_name;
            move_uploaded_file($_FILES['bukti_penginapan']['tmp_name'], $bukti_penginapan_path);
        }

        $bukti_tol_path = NULL;
        if (!empty($_FILES['bukti_tol']['name'])) {
            $bukti_tol_name = time().'-'.md5(rand()).'-'.$_FILES['bukti_tol']['name'];
            $bukti_tol_path = "../../assets/bukti biaya/tol/" . $bukti_tol_name;
            move_uploaded_file($_FILES['bukti_tol']['tmp_name'], $bukti_tol_path);
        }

        $bukti_bahan_bakar_path = NULL;
        if (!empty($_FILES['bukti_bahan_bakar']['name'])) {
            $bukti_bahan_bakar_name = time().'-'.md5(rand()).'-'.$_FILES['bukti_bahan_bakar']['name'];
            $bukti_bahan_bakar_path = "../../assets/bukti biaya/bahan bakar/" . $bukti_bahan_bakar_name;
            move_uploaded_file($_FILES['bukti_bahan_bakar']['tmp_name'], $bukti_bahan_bakar_path);
        }

        $bukti_lain_path = NULL;
        if (!empty($_FILES['bukti_lain']['name'])) {
            $bukti_lain_name = time().'-'.md5(rand()).'-'.$_FILES['bukti_lain']['name'];
            $bukti_lain_path = "../../assets/bukti biaya/lain lain/" . $bukti_lain_name;
            move_uploaded_file($_FILES['bukti_lain']['tmp_name'], $bukti_lain_path);
        }

        $create_surat = mysqli_query($database, "INSERT INTO pengajuan_sppd (id_pegawai, tujuan, pemberi_perintah, jumlah_hari, tanggal_berangkat, tanggal_kembali, tugas, laporan_perjalanan, biaya_penginapan, biaya_tol, biaya_bahan_bakar, biaya_lain, total_biaya, bukti_penginapan, bukti_tol, bukti_bahan_bakar, bukti_lain) VALUES ('$id_pegawai', '$tujuan', '$pemberi_perintah', '$jumlah_hari', '$tanggal_berangkat', '$tanggal_kembali', '$tugas', '$laporan', '$biaya_penginapan', '$biaya_tol', '$biaya_bahan_bakar', '$biaya_lain', '$total_biaya', '$bukti_penginapan_path', '$bukti_tol_path', '$bukti_bahan_bakar_path', '$bukti_lain_path')");
        
        if($create_surat){
            $id_pengajuan = mysqli_insert_id($database);

            $create_riwayat = mysqli_query($database, "INSERT INTO riwayat_pengajuan (id_pengajuan) VALUES ('$id_pengajuan')");

            $_SESSION['success'] = "SPPD berhasil diajukan.";
            header("Location: ../../pages/manajemen_surat/pengajuan.php");
        } else {
            $_SESSION['failed'] = "SPPD gagal diajukan.";
            header("Location: ../../pages/manajemen_surat/pengajuan.php");
        }
    }
?>