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
                    <h5 class="text-center m-0">Data Pegawai</h5>
                </div>
                <div class="card-body gap-2">
                <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="bi bi-person-fill-add"></i> Tambah Pegawai
                </button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Badge</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nama Pegawai</th>
                                    <th>Uang Saku</th>
                                    <th>Jabatan</th>
                                    <th>Unit Kerja</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $select_pegawai = "SELECT pegawai.id_pegawai, pegawai.no_badge, pegawai.tanggal_lahir, pegawai.nama_pegawai, pegawai.uang_saku, jabatan.nama_jabatan, unit_kerja.nama_unit_kerja FROM pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id_unit_kerja";
                                    $result_pegawai = mysqli_query($database, $select_pegawai);
                                    while ($pegawai = mysqli_fetch_assoc($result_pegawai)){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $pegawai['no_badge']; ?></td>
                                    <td><?= $pegawai['tanggal_lahir']; ?></td>
                                    <td><?= $pegawai['nama_pegawai']; ?></td>
                                    <td><?= $pegawai['uang_saku']; ?></td>
                                    <td><?= $pegawai['nama_jabatan']; ?></td>
                                    <td><?= $pegawai['nama_unit_kerja']; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateModal<?= $pegawai['id_pegawai'] ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $pegawai['id_pegawai']; ?>"><i class="bi bi-trash"></i> Hapus</button>
                                    </td>
                                </tr>

                                <!-- Modal Update Pegawai -->
                                <div class="modal fade" id="updateModal<?= $pegawai['id_pegawai']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/pegawai/update.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pegawai</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="no_badge">No Badge:</label>
                                                        <input class="form-control" type="text" name="no_badge" id="no_badge" value="<?= $pegawai['no_badge']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir:</label>
                                                        <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= $pegawai['tanggal_lahir']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="nama_pegawai">Nama Pegawai:</label>
                                                        <input class="form-control" type="text" name="nama_pegawai" id="nama_pegawai" value="<?= $pegawai['nama_pegawai']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="uang_saku">Uang Saku:</label>
                                                        <input class="form-control" type="number" name="uang_saku" id="uang_saku" value="<?= $pegawai['uang_saku']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="jabatan">Jabatan:</label>
                                                        <select class="form-select" name="id_jabatan" id="jabatan" required>
                                                            <option disabled selected></option>
                                                            <?php
                                                                $select_jabatan = "SELECT * FROM jabatan";
                                                                $result_jabatan = mysqli_query($database, $select_jabatan);
                                                                while ($jabatan = mysqli_fetch_assoc($result_jabatan)){
                                                                    echo "<option value=$jabatan[id_jabatan]>$jabatan[nama_jabatan]</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="unit_kerja">Unit Kerja :</label>
                                                        <select class="form-select" name="id_unit_kerja" id="unit_kerja" required>
                                                            <option disabled selected></option>
                                                            <?php
                                                                $select_unit_kerja = "SELECT * FROM unit_kerja";
                                                                $result_unit_kerja = mysqli_query($database, $select_unit_kerja);
                                                                while ($unit_kerja = mysqli_fetch_assoc($result_unit_kerja)){
                                                                    echo "<option value=$unit_kerja[id_unit_kerja]>$unit_kerja[nama_unit_kerja]</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update_pegawai" class="btn btn-primary">Edit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Delete Pegawai -->
                                <div class="modal fade" id="deleteModal<?= $pegawai['id_pegawai']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/pegawai/delete.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pegawai</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>">
                                                    <p>Apakah Anda yakin ingin menghapus Pegawai <strong><?= $pegawai['nama_pegawai']; ?></strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="delete_pegawai" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Pegawai -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="../../backend/pegawai/create.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pegawai</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="no_badge">No Badge:</label>
                                <input class="form-control" type="text" name="no_badge" id="no_badge" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tanggal_lahir">Tanggal Lahir:</label>
                                <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama_pegawai">Nama Pegawai:</label>
                                <input class="form-control" type="text" name="nama_pegawai" id="nama_pegawai" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="uang_saku">Uang Saku:</label>
                                <input class="form-control" type="number" name="uang_saku" id="uang_saku" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jabatan">Jabatan:</label>
                                <select class="form-select" name="id_jabatan" id="jabatan" required>
                                    <option disabled selected></option>
                                    <?php
                                        $queryGetJabatan = "SELECT * FROM jabatan";
                                        $result = mysqli_query($database, $queryGetJabatan);
                                        while ($data = mysqli_fetch_assoc($result)){
                                            echo "<option value=$data[id_jabatan]>$data[nama_jabatan]</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="unit_kerja">Unit Kerja:</label>
                                <select class="form-select" name="id_unit_kerja" id="unit_kerja" required>
                                    <option disabled selected></option>
                                    <?php
                                        $queryGetUnitKerja = "SELECT * FROM unit_kerja";
                                        $result = mysqli_query($database, $queryGetUnitKerja);
                                        while ($data = mysqli_fetch_assoc($result)){
                                            echo "<option value=$data[id_unit_kerja]>$data[nama_unit_kerja]</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="create_pegawai" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php require "../layout/footer.php"; ?>