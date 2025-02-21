<?php
    require "../layout/header.php";

    if($_SESSION['role'] != 'admin'){
        session_destroy();
        header("Location:../../index.php");
    }
?>
    <main>
        <div class="container">
            
            <!-- Alert Berhasil -->
            <?php if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success" role="alert" id="alert-messages">
                    <i class="bi bi-check-circle-fill"></i>
                    <?= $_SESSION['success']; ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            
            <!-- Alert Gagal -->
            <?php if(isset($_SESSION['failed'])): ?>
                <div class="alert alert-danger" role="alert" id="alert-messages">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <?= $_SESSION['failed']; ?>
                </div>
                <?php unset($_SESSION['failed']); ?>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h5 class="text-center m-0">Riwayat Pengajuan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>No Badge</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Status Pengajuan</th>
                                    <th>Diverifikasi Oleh</th>
                                    <th>Keterangan</th>
                                    <th>Detail Data SPPD</th>
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $select_riwayat = "SELECT * FROM riwayat_pengajuan JOIN pengajuan_sppd ON riwayat_pengajuan.id_pengajuan = pengajuan_sppd.id_pengajuan LEFT JOIN admin ON riwayat_pengajuan.id_verifikator = admin.id_admin LEFT JOIN pegawai ON pengajuan_sppd.id_pegawai = pegawai.id_pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id_unit_kerja";
                                    $result_riwayat = mysqli_query($database, $select_riwayat);
                                    while ($riwayat = mysqli_fetch_assoc($result_riwayat)){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $riwayat['no_badge']; ?></td>
                                    <td><?= $riwayat['nama_pegawai']; ?></td>
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
                                    <td><?= $riwayat['nama_admin']; ?></td>
                                    <td><?= $riwayat['keterangan']; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#dataSppd<?= $riwayat['id_pengajuan']; ?>">
                                            <i class="bi bi-file-earmark"></i> Lihat Data
                                        </button>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <?php if($riwayat['status_pengajuan'] !== 'Disetujui' && $riwayat['status_pengajuan'] !== 'Ditolak') { ?>
                                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#disetujui<?= $riwayat['id_riwayat']; ?>">
                                                    <i class="bi bi-check-circle"></i> Disetujui
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ditolak<?= $riwayat['id_riwayat']; ?>">
                                                    <i class="bi bi-x-circle"></i> Ditolak
                                                </button>
                                            <?php } ?>
                                        </div>
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

                                <!-- Modal Verifikasi Disetujui-->
                                <div class="modal fade" id="disetujui<?= $riwayat['id_riwayat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/surat/verifikasi.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Setujui Pengajuan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_riwayat" value="<?= $riwayat['id_riwayat']; ?>">
                                                    <input type="hidden" name="status" value="Disetujui">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="keterangan">Keterangan:</label>
                                                        <input class="form-control" type="text" id="keterangan" name="keterangan" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" name="disetujui">Disetujui</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Verifikasi Ditolak-->
                                <div class="modal fade" id="ditolak<?= $riwayat['id_riwayat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/surat/verifikasi.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tolak Pengajuan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_riwayat" value="<?= $riwayat['id_riwayat']; ?>">
                                                    <input type="hidden" name="status" value="Ditolak">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="keterangan">Keterangan:</label>
                                                        <input class="form-control" type="text" id="keterangan" name="keterangan" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger" name="ditolak">Ditolak</button>
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