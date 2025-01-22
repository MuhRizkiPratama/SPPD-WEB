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
                    <h5 class="text-center m-0">Unit Kerja</h5>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="bi bi-plus"></i> Tambah Unit Kerja
                    </button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Unit Kerja</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $select_unit_kerja = "SELECT * FROM unit_kerja";
                                    $result_unit_kerja = mysqli_query ($database, $select_unit_kerja);
                                    while ($unit_kerja = mysqli_fetch_assoc($result_unit_kerja)){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $unit_kerja['nama_unit_kerja']; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateModal<?= $unit_kerja['id_unit_kerja'] ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $unit_kerja['id_unit_kerja'] ?>"><i class="bi bi-trash"></i> Hapus</button>
                                    </td>
                                </tr>

                                <!-- Modal Update Unit Kerja -->
                                <div class="modal fade" id="updateModal<?= $unit_kerja['id_unit_kerja'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/unit_kerja/update.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Unit Kerja</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_unit_kerja" value="<?= $unit_kerja['id_unit_kerja']; ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="nama_unit_kerja">Nama Unit Kerja:</label>
                                                        <input class="form-control" type="text" name="nama_unit_kerja" id="nama_unit_kerja" value="<?= $unit_kerja['nama_unit_kerja']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update_unit_kerja" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Delete Unit Kerja -->
                                <div class="modal fade" id="deleteModal<?= $unit_kerja['id_unit_kerja']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/unit_kerja/delete.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Unit Kerja</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_unit_kerja" value="<?= $unit_kerja['id_unit_kerja']; ?>">
                                                    <p>Apakah Anda yakin ingin menghapus Unit Kerja <strong><?= $unit_kerja['nama_unit_kerja']; ?></strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="delete_unit_kerja" class="btn btn-danger">Hapus</button>
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

        <!-- Modal Create Unit Kerja -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="../../backend/unit_kerja/create.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Unit Kerja</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="nama_unit_kerja">Nama Unit Kerja:</label>
                                <input class="form-control" type="text" name="nama_unit_kerja" id="nama_unit_kerja" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="create_unit_kerja" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php
    require "../layout/footer.php";
?>