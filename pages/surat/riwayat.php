<?php
    require "../layout/header.php";
?>
    <main>
        <div class="container mt-5 mb-5">
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
                                    <th>Keterangan</th>
                                    <th>Detail Data SPPD</th>
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $queryGetRiwayat = "SELECT * FROM riwayat_pengajuan JOIN sppd ON riwayat_pengajuan.id_sppd = sppd.id LEFT JOIN pegawai ON sppd.id_pegawai = pegawai.id LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id";
                                    $resultGetRiwayat = mysqli_query($database, $queryGetRiwayat);
                                    while ($riwayat = mysqli_fetch_assoc($resultGetRiwayat)){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $riwayat['no_badge']; ?></td>
                                    <td><?= $riwayat['nama_lengkap']; ?></td>
                                    <td><?= $riwayat['tanggal_pengajuan']; ?></td>
                                    <td><?= $riwayat['status_pengajuan']; ?></td>
                                    <td><?= $riwayat['keterangan']; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#dataSppd<?= $riwayat['id_sppd']; ?>">
                                            <i class="bi bi-file-earmark"></i> Lihat Data
                                        </button>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <?php if ($riwayat['status_pengajuan'] !== 'Disetujui' && $riwayat['status_pengajuan'] !== 'Ditolak') { ?>
                                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#disetujui<?= $riwayat['id']; ?>">
                                                    <i class="bi bi-check-circle"></i> Disetujui
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ditolak<?= $riwayat['id']; ?>">
                                                    <i class="bi bi-x-circle"></i> Ditolak
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Modal Detail Data SPPD -->
                                <div class="modal fade" id="dataSppd<?= $riwayat['id_sppd']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Nama Pegawai:</p>
                                                    <p><?= $riwayat['nama_lengkap']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Jabatan:</p>
                                                    <p><?= $riwayat['jabatan']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Unit Kerja:</p>
                                                    <p><?= $riwayat['unit_kerja']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Uang Saku:</p>
                                                    <p><?= $riwayat['uang_saku']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Lama Perjalanan:</p>
                                                    <p><?= $riwayat['lama_perjalanan']; ?> Hari</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Tujuan:</p>
                                                    <p><?= $riwayat['tujuan']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Tanggal Berangkat:</p>
                                                    <p><?= $riwayat['tanggal_berangkat']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Tanggal Kembali:</p>
                                                    <p><?= $riwayat['tanggal_kembali']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Tugas:</p>
                                                    <p><?= $riwayat['tugas']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Biaya Penginapan Lumpsum:</p>
                                                    <p><?= $riwayat['biaya_penginapan_ls']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Biaya Penginapan:</p>
                                                    <p><?= $riwayat['biaya_penginapan']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Biaya TOL:</p>
                                                    <p><?= $riwayat['biaya_tol']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Biaya BBM:</p>
                                                    <p><?= $riwayat['biaya_bbm']; ?></p>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Biaya Lain:</p>
                                                    <p><?= $riwayat['biaya_lain']; ?></p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="fw-semibold">Total Biaya:</p>
                                                    <p><?= $riwayat['total_biaya']; ?></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Verifikasi Disetujui-->
                                <div class="modal fade" id="disetujui<?= $riwayat['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/surat/verifikasi.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Setujui Pengajuan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_pengajuan" value="<?= $riwayat['id']; ?>">
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
                                <div class="modal fade" id="ditolak<?= $riwayat['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/surat/verifikasi.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tolak Pengajuan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_pengajuan" value="<?= $riwayat['id']; ?>">
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