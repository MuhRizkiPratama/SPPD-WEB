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
                    <h5 class="text-center m-0">Jabatan</h5>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="bi bi-plus"></i> Tambah Jabatan
                    </button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $select_jabatan = "SELECT * FROM jabatan";
                                    $result_jabatan = mysqli_query($database, $select_jabatan);
                                    while($jabatan = mysqli_fetch_assoc($result_jabatan)){ 
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $jabatan['nama_jabatan']; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateModal<?= $jabatan['id_jabatan'] ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $jabatan['id_jabatan']; ?>"><i class="bi bi-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                
                                <!-- Modal Update Jabatan -->
                                <div class="modal fade" id="updateModal<?= $jabatan['id_jabatan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/jabatan/update.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jabatan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_jabatan" value="<?= $jabatan['id_jabatan']; ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="nama_jabatan">Nama Jabatan:</label>
                                                        <input class="form-control" type="text" name="nama_jabatan" id="nama_jabatan" value="<?= $jabatan['nama_jabatan']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update_jabatan" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Delete Jabatan -->
                                <div class="modal fade" id="deleteModal<?= $jabatan['id_jabatan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../../backend/jabatan/delete.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Jabatan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_jabatan" value="<?= $jabatan['id_jabatan']; ?>">
                                                    <p>Apakah Anda yakin ingin menghapus jabatan <strong><?= $jabatan['nama_jabatan']; ?></strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="delete_jabatan" class="btn btn-danger">Hapus</button>
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

        <!-- Modal Create Jabatan -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="../../backend/jabatan/create.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jabatan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="nama_jabatan">Nama Jabatan:</label>
                                <input class="form-control" type="text" name="nama_jabatan" id="nama_jabatan" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="create_jabatan" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php
    require "../layout/footer.php";
?>