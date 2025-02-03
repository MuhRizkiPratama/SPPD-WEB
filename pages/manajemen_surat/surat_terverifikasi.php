<?php
    require "../layout/header.php";
?>
    <main>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center m-0">Surat Terverifikasi</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="mb-3">
                            <form method="POST" action="../../backend/surat/export_excel.php">
                                <button class="btn btn-sm btn-success" type="submit" name="export_excel"><i class="bi bi-filetype-xls"></i> Export to Excel</button>
                            </form>
                        </div>
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>No Badge</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Total Biaya</th>
                                    <th>Detail SPPD</th>
                                    <th>Cetak Surat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $select_surat = "SELECT * FROM sppd_terverifikasi LEFT JOIN pengajuan_sppd ON sppd_terverifikasi.id_pengajuan = pengajuan_sppd.id_pengajuan LEFT JOIN pegawai ON pengajuan_sppd.id_pegawai = pegawai.id_pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id_unit_kerja";
                                    $result_surat = mysqli_query($database, $select_surat);
                                    while($sppd = mysqli_fetch_assoc($result_surat)){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $sppd['no_surat']; ?></td>
                                    <td><?= $sppd['tanggal_sppd']; ?></td>
                                    <td><?= $sppd['no_badge']; ?></td>
                                    <td><?= $sppd['nama_pegawai']; ?></td>
                                    <td><?= $sppd['tujuan']; ?></td>
                                    <td><?= $sppd['tanggal_berangkat']; ?></td>
                                    <td><?= $sppd['tanggal_kembali']; ?></td>
                                    <td><?= $sppd['total_biaya']; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#dataSppd<?= $sppd['id_sppd']; ?>">
                                            <i class="bi bi-file-earmark"></i> Lihat Data
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <form action="../../backend/surat/print.php" method="POST" target="_blank">
                                            <input type="hidden" name="id_sppd" value="<?= $sppd['id_sppd']; ?>">
                                            <button type="submit" class="btn btn-sm btn-success" name="print">
                                                <i class="bi bi-printer"></i> Cetak Surat
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>

                            <!-- Modal Detail Data SPPD -->
                            <div class="modal fade" id="dataSppd<?= $sppd['id_sppd']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data SPPD</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">No Badge:</p>
                                                <p><?= $sppd['no_badge']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Nama Pegawai:</p>
                                                <p><?= $sppd['nama_pegawai']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Jabatan:</p>
                                                <p><?= $sppd['nama_jabatan']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Unit Kerja:</p>
                                                <p><?= $sppd['nama_unit_kerja']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Uang Saku:</p>
                                                <p><?= $sppd['uang_saku']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Tujuan:</p>
                                                <p><?= $sppd['tujuan']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Pemberi Perintah:</p>
                                                <p><?= $sppd['pemberi_perintah']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Jumlah Hari:</p>
                                                <p><?= $sppd['jumlah_hari']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Jumlah Malam:</p>
                                                <p><?= $sppd['jumlah_malam']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Tanggal Berangkat:</p>
                                                <p><?= $sppd['tanggal_berangkat']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Tanggal Kembali:</p>
                                                <p><?= $sppd['tanggal_kembali']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Tugas:</p>
                                                <p><?= $sppd['tugas']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Laporan Perjalanan:</p>
                                                <p><?= $sppd['laporan_perjalanan']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Biaya Penginapan:</p>
                                                <p><?= $sppd['biaya_penginapan']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Biaya Tol:</p>
                                                <p><?= $sppd['biaya_tol']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Biaya Bahan Bakar:</p>
                                                <p><?= $sppd['biaya_bahan_bakar']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Biaya Lain:</p>
                                                <p><?= $sppd['biaya_lain']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-semibold">Total Biaya:</p>
                                                <p><?= $sppd['total_biaya']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-column">
                                                <p class="fw-semibold">Bukti Penginapan:</p>
                                                <img src="<?= $sppd['bukti_penginapan']?>">
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-column">
                                                <p class="fw-semibold">Bukti Tol:</p>
                                                <img src="<?= $sppd['bukti_tol']?>">
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-column">
                                                <p class="fw-semibold">Bukti Bahan Bakar:</p>
                                                <img src="<?= $sppd['bukti_bahan_bakar']?>">
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-column">
                                                <p class="fw-semibold">Bukti Lain:</p>
                                                <img src="<?= $sppd['bukti_lain']?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                };
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require "../layout/footer.php"; ?>