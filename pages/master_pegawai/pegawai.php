<?php
    require "../../config/connection.php";
    require "../layout/header.php";
?>
    <main>
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Data Pegawai</h5>
                </div>
                <div class="card-body">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="bi bi-plus"></i>
                </button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>No Badge</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nama Pegawai</th>
                                    <th>Uang Saku</th>
                                    <th>Jabatan</th>
                                    <th>Unit Kerja</th>
                                    <th>Penempatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $queryGetPegawai = "SELECT pegawai.id, pegawai.no_badge, pegawai.tanggal_lahir, pegawai.nama_lengkap, pegawai.uang_saku, jabatan.jabatan, unit_kerja.unit_kerja, penempatan.penempatan FROM pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id LEFT JOIN unit_kerja ON pegawai.id_unit_kerja = unit_kerja.id LEFT JOIN penempatan ON pegawai.id_penempatan = penempatan.id;";
                                    $result = mysqli_query($database, $queryGetPegawai);
                                    while ($data = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['no_badge']; ?></td>
                                    <td><?= $data['tanggal_lahir']; ?></td>
                                    <td><?= $data['nama_lengkap']; ?></td>
                                    <td><?= $data['uang_saku']; ?></td>
                                    <td><?= $data['jabatan']; ?></td>
                                    <td><?= $data['unit_kerja']; ?></td>
                                    <td><?= $data['penempatan']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateModal<?= $data['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $data['id']; ?>"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- Modal Update Pegawai -->
                                <div class="modal fade" id="updateModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <input class="form-control" type="number" name="no_badge" id="no_badge" value="<?= $data['no_badge']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir:</label>
                                                        <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="nama_lengkap">Nama Lengkap:</label>
                                                        <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" value="<?= $data['nama_lengkap']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="uang_saku">Uang Saku:</label>
                                                        <input class="form-control" type="number" name="uang_saku" id="uang_saku" value="<?= $data['uang_saku']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="jabatan">Jabatan:</label>
                                                        <select class="form-select" name="id_jabatan" id="jabatan" required>
                                                            <option disabled selected></option>
                                                            <?php
                                                                $queryGetJabatan = "SELECT * FROM jabatan";
                                                                $result = mysqli_query($database, $queryGetJabatan);
                                                                while ($data = mysqli_fetch_assoc($result)){
                                                                    echo "<option value=$data[id]>$data[jabatan]</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="unit_kerja">Unit Kerja :</label>
                                                        <select class="form-select" name="id_unit_kerja" id="unit_kerja" required>
                                                            <option disabled selected></option>
                                                            <?php
                                                                $queryGetUnitKerja = "SELECT * FROM unit_kerja";
                                                                $result = mysqli_query($database, $queryGetUnitKerja);
                                                                while ($data = mysqli_fetch_assoc($result)){
                                                                    echo "<option value=$data[id]>$data[unit_kerja]</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="penempatan">Penempatan :</label>
                                                        <select class="form-select" name="id_penempatan" id="penempatan" required>
                                                            <option disabled selected></option>
                                                            <?php
                                                                $queryGetPenempatan = "SELECT * FROM penempatan";
                                                                $result = mysqli_query($database, $queryGetPenempatan);
                                                                while ($data = mysqli_fetch_assoc($result)){
                                                                    echo "<option value=$data[id]>$data[penempatan]</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update_pegawai" class="btn btn-primary">Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Delete Unit Kerja -->
                                <div class="modal fade" id="deleteModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/pegawai/delete.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pegawai</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_pegawai" value="<?= $data['id']; ?>">
                                                    <p>Apakah Anda yakin ingin menghapus Pegawai <strong><?= $data['nama_lengkap']; ?></strong>?</p>
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
                                <input class="form-control" type="number" name="no_badge" id="no_badge" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tanggal_lahir">Tanggal Lahir:</label>
                                <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama_lengkap">Nama Lengkap:</label>
                                <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" required>
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
                                            echo "<option value=$data[id]>$data[jabatan]</option>";
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
                                            echo "<option value=$data[id]>$data[unit_kerja]</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="penempatan">Penempatan:</label>
                                <select class="form-select" name="id_penempatan" id="penempatan" required>
                                    <option disabled selected></option>
                                    <?php
                                        $queryGetPenempatan = "SELECT * FROM penempatan";
                                        $result = mysqli_query($database, $queryGetPenempatan);
                                        while ($data = mysqli_fetch_assoc($result)){
                                            echo "<option value=$data[id]>$data[penempatan]</option>";
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