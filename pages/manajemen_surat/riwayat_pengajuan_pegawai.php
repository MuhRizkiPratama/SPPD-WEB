<?php
    require "../layout/header.php";

    $id_pegawai = $_SESSION['id_pegawai'];

    if($_SESSION['role'] != 'pegawai'){
        session_destroy();
        header("Location:../../index.php");
    }
?>
    <main>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center m-0">Riwayat Pengajuan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Status Pengajuan</th>
                                    <th>Keterangan</th>
                                    <th>Detail Data SPPD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $select_riwayat = "SELECT * FROM riwayat_pengajuan JOIN pengajuan_sppd ON riwayat_pengajuan.id_pengajuan = pengajuan_sppd.id_pengajuan LEFT JOIN pegawai ON pengajuan_sppd.id_pegawai = pegawai.id_pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id_unit_kerja WHERE pengajuan_sppd.id_pegawai = '$id_pegawai'";
                                    $result_riwayat = mysqli_query($database, $select_riwayat);

                                    while ($riwayat = mysqli_fetch_assoc($result_riwayat)) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $riwayat['tanggal_pengajuan']; ?></td>
                                    <td class="text-center">
                                        <?php if($riwayat['status_pengajuan'] == 'Disetujui'){ ?>
                                            <span class="badge text-bg-success"><?= $riwayat['status_pengajuan']; ?></span>
                                        <?php } elseif ($riwayat['status_pengajuan'] == 'Ditolak'){ ?>
                                            <span class="badge text-bg-danger"><?= $riwayat['status_pengajuan']; ?></span>
                                        <?php } elseif ($riwayat['status_pengajuan'] == 'Pending'){ ?>
                                            <span class="badge text-bg-warning"><?= $riwayat['status_pengajuan']; ?></span>
                                        <?php }; ?>
                                    </td>
                                    <td><?= $riwayat['keterangan']; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#dataSppd<?= $riwayat['id_pengajuan']; ?>">
                                            <i class="bi bi-file-earmark"></i> Lihat Data
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <?php if($riwayat['status_pengajuan'] == 'Ditolak') { ?>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#revisi<?= $riwayat['id_pengajuan']; ?>">
                                                <i class="bi bi-pencil-square"></i> Revisi
                                            </button>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <!-- Modal Detail Data SPPD -->
                                <div class="modal fade" id="dataSppd<?= $riwayat['id_pengajuan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data SPPD</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">No Badge:</p>
                                                    <p><?= $riwayat['no_badge']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Nama Pegawai:</p>
                                                    <p><?= $riwayat['nama_pegawai']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Jabatan:</p>
                                                    <p><?= $riwayat['nama_jabatan']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Unit Kerja:</p>
                                                    <p><?= $riwayat['nama_unit_kerja']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Uang Saku:</p>
                                                    <p><?= $riwayat['uang_saku']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Tujuan:</p>
                                                    <p><?= $riwayat['tujuan']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Jumlah Hari:</p>
                                                    <p><?= $riwayat['jumlah_hari']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Tanggal Berangkat:</p>
                                                    <p><?= $riwayat['tanggal_berangkat']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Tanggal Kembali:</p>
                                                    <p><?= $riwayat['tanggal_kembali']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Tugas:</p>
                                                    <p><?= $riwayat['tugas']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Pemberi Perintah:</p>
                                                    <p><?= $riwayat['pemberi_perintah']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Laporan Perjalanan:</p>
                                                    <p><?= $riwayat['laporan_perjalanan']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Biaya Penginapan:</p>
                                                    <p><?= $riwayat['biaya_penginapan']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Biaya Tol:</p>
                                                    <p><?= $riwayat['biaya_tol']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Biaya Bahan Bakar:</p>
                                                    <p><?= $riwayat['biaya_bahan_bakar']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Biaya Lain:</p>
                                                    <p><?= $riwayat['biaya_lain']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Total Biaya:</p>
                                                    <p><?= $riwayat['total_biaya']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="d-flex flex-column">
                                                    <p class="fw-semibold">Bukti Penginapan:</p>
                                                    <img src="<?= $riwayat['bukti_penginapan']?>">
                                                </div>
                                                <hr>
                                                <div class="d-flex flex-column">
                                                    <p class="fw-semibold">Bukti Tol:</p>
                                                    <img src="<?= $riwayat['bukti_tol']?>">
                                                </div>
                                                <hr>
                                                <div class="d-flex flex-column">
                                                    <p class="fw-semibold">Bukti Bahan Bakar:</p>
                                                    <img src="<?= $riwayat['bukti_bahan_bakar']?>">
                                                </div>
                                                <hr>
                                                <div class="d-flex flex-column">
                                                    <p class="fw-semibold">Bukti Lain:</p>
                                                    <img src="<?= $riwayat['bukti_lain']?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Revisi Pengajuan -->
                                <div class="modal fade" id="revisi<?= $riwayat['id_pengajuan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/surat/revisi.php" method="post" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Revisi Pengajuan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_riwayat" value="<?= $riwayat['id_riwayat']; ?>">
                                                    <input type="hidden" name="id_pengajuan" value="<?= $riwayat['id_pengajuan']; ?>">
                                                    <input type="hidden" name="uang_saku" value="<?= $riwayat['uang_saku']; ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="tujuan">Tujuan:</label>
                                                        <input class="form-control" type="text" id="tujuan" name="tujuan" value="<?= $riwayat['tujuan']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="tanggal_berangkat">Tanggal Berangkat:</label>
                                                        <input class="form-control" type="date" id="tanggal_berangkat" name="tanggal_berangkat" value="<?= $riwayat['tanggal_berangkat']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="tanggal_kembali">Tanggal Kembali:</label>
                                                        <input class="form-control" type="date" id="tanggal_kembali" name="tanggal_kembali" value="<?= $riwayat['tanggal_kembali']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="tugas">Tugas:</label>
                                                        <input class="form-control" id="tugas" name="tugas" value="<?= $riwayat['tugas']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="pemberi_perintah">Pemberi Perintah:</label>
                                                        <input class="form-control" id="pemberi_perintah" name="pemberi_perintah" value="<?= $riwayat['pemberi_perintah']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="laporan_perjalanan">Laporan:</label>
                                                        <input class="form-control" type="text" name="laporan_perjalanan" id="laporan_perjalanan" value="<?= $riwayat['laporan_perjalanan']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="biaya_penginapan">Biaya Penginapan:</label>
                                                        <input class="form-control" type="number" name="biaya_penginapan" id="biaya_penginapan" value="<?= $riwayat['biaya_penginapan']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="biaya_tol">Biaya Tol:</label>
                                                        <input class="form-control" type="number" name="biaya_tol" id="biaya_tol" value="<?= $riwayat['biaya_tol']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="biaya_bahan_bakar">Biaya Bahan Bakar:</label>
                                                        <input class="form-control" type="number" name="biaya_bahan_bakar" id="biaya_bahan_bakar" value="<?= $riwayat['biaya_bahan_bakar']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="biaya_lain">Biaya Lain:</label>
                                                        <input class="form-control" type="number" name="biaya_lain" id="biaya_lain" value="<?= $riwayat['biaya_lain']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="bukti_penginapan">Bukti Penginapan:</label>
                                                        <input class="form-control" type="file" name="bukti_penginapan" id="bukti_penginapan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="bukti_tol">Bukti Tol:</label>
                                                        <input class="form-control" type="file" name="bukti_tol" id="bukti_tol">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="bukti_bahan_bakar">Bukti Bahan Bakar:</label>
                                                        <input class="form-control" type="file" name="bukti_bahan_bakar" id="bukti_bahan_bakar">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="bukti_lain">Bukti Lain:</label>
                                                        <input class="form-control" type="file" name="bukti_lain" id="bukti_lain">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="revisi">Revisi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <?php
                                    };
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require "../layout/footer.php"; ?>