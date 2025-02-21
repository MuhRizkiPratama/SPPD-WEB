<?php
    require "../../config/connection.php";
    require "../../vendor/autoload.php";

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    if(isset($_POST['export_excel'])) {
        $select_sppd = "SELECT * FROM sppd_terverifikasi JOIN riwayat_pengajuan ON sppd_terverifikasi.id_riwayat = riwayat_pengajuan.id_riwayat LEFT JOIN pengajuan_sppd ON riwayat_pengajuan.id_pengajuan = pengajuan_sppd.id_pengajuan LEFT JOIN pegawai ON pengajuan_sppd.id_pegawai = pegawai.id_pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id_unit_kerja";

        $result_sppd = mysqli_query($database, $select_sppd);

        if ($result_sppd && mysqli_num_rows($result_sppd) > 0) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'No Surat');
            $sheet->setCellValue('B1', 'No Badge');
            $sheet->setCellValue('C1', 'Nama Pegawai');
            $sheet->setCellValue('D1', 'Jabatan');
            $sheet->setCellValue('E1', 'Unit Kerja');
            $sheet->setCellValue('F1', 'Tujuan');
            $sheet->setCellValue('G1', 'Tanggal Berangkat');
            $sheet->setCellValue('H1', 'Tanggal Kembali');
            $sheet->setCellValue('I1', 'Tugas');
            $sheet->setCellValue('J1', 'Laporan Perjalanan');
            $sheet->setCellValue('K1', 'Jumlah Hari');
            $sheet->setCellValue('L1', 'Uang Saku');
            $sheet->setCellValue('M1', 'Total Uang Saku');
            $sheet->setCellValue('N1', 'Biaya Penginapan');
            $sheet->setCellValue('P1', 'Biaya Bahan Bakar');
            $sheet->setCellValue('Q1', 'Biaya Tol');
            $sheet->setCellValue('R1', 'Biaya Lain');
            $sheet->setCellValue('S1', 'Total Biaya');

            $rowNumber = 2;
            while ($sppd = mysqli_fetch_assoc($result_sppd)) {
                $total_uang_saku = $sppd['jumlah_hari'] * $sppd['uang_saku'];

                $sheet->setCellValue('A' . $rowNumber, $sppd['no_surat']);
                $sheet->setCellValue('B' . $rowNumber, $sppd['no_badge']);
                $sheet->setCellValue('C' . $rowNumber, $sppd['nama_pegawai']);
                $sheet->setCellValue('D' . $rowNumber, $sppd['nama_jabatan']);
                $sheet->setCellValue('E' . $rowNumber, $sppd['nama_unit_kerja']);
                $sheet->setCellValue('F' . $rowNumber, $sppd['tujuan']);
                $sheet->setCellValue('G' . $rowNumber, $sppd['tanggal_berangkat']);
                $sheet->setCellValue('H' . $rowNumber, $sppd['tanggal_kembali']);
                $sheet->setCellValue('I' . $rowNumber, $sppd['tugas']);
                $sheet->setCellValue('J' . $rowNumber, $sppd['laporan_perjalanan']);
                $sheet->setCellValue('K' . $rowNumber, $sppd['jumlah_hari']);
                $sheet->setCellValue('L' . $rowNumber, $sppd['uang_saku']);
                $sheet->setCellValue('M' . $rowNumber, $total_uang_saku);
                $sheet->setCellValue('N' . $rowNumber, $sppd['biaya_penginapan']);
                $sheet->setCellValue('P' . $rowNumber, $sppd['biaya_bahan_bakar']);
                $sheet->setCellValue('Q' . $rowNumber, $sppd['biaya_tol']);
                $sheet->setCellValue('R' . $rowNumber, $sppd['biaya_lain']);
                $sheet->setCellValue('S' . $rowNumber, $sppd['total_biaya']);
                $rowNumber++;
            }

            $file_excel = 'Data_SPPD.xlsx';
            
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $file_excel . '"');
            header('Cache-Control: max-age=0');

            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
            exit();
        } else {
            $_SESSION['failed'] = "Tidak ada data SPPD yang ditemukan.";
            header("Location:../../pages/manajemen_surat/surat_terverifikasi.php");
            exit();
        }
    } else {
        $_SESSION['failed'] = "Metode request tidak valid.";
        header("Location:../../pages/manajemen_surat/surat_terverifikasi.php");
        exit();
    }
?>