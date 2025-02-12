<?php
    require "../layout/header.php";
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
                    <h5 class="text-center m-0">Admin</h5>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="bi bi-plus"></i> Tambah Admin
                    </button>
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Admin</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $select_admin = "SELECT * FROM admin";
                                $result_admin = mysqli_query($database, $select_admin);
                                while ($admin = mysqli_fetch_assoc($result_admin)){
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $admin['nama_admin']; ?></td>
                                <td><?= $admin['email']; ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateModal<?= $admin['id_admin'] ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $admin['id_admin'] ?>"><i class="bi bi-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            
                            <!-- Modal Update Admin -->
                            <div class="modal fade" id="updateModal<?= $admin['id_admin'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="../../backend/admin/update.php" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Admin</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_admin" value="<?= $admin['id_admin']; ?>">
                                                <div class="mb-3">
                                                    <label class="form-label" for="nama_admin">Nama Admin:</label>
                                                    <input class="form-control" type="text" name="nama_admin" id="nama_admin" value="<?= $admin['nama_admin']?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="email">Email:</label>
                                                    <input class="form-control" type="email" name="email" id="email" value="<?= $admin['email']?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="password_lama">Password Lama:</label>
                                                    <input class="form-control" type="password" name="password_lama" id="password_lama" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="password_baru">Password Baru:</label>
                                                    <input class="form-control" type="password" name="password_baru" id="password_baru">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="update_admin" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Modal Delete Admin -->
                            <div class="modal fade" id="deleteModal<?= $admin['id_admin']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="../../backend/admin/delete.php" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Admin</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_admin" value="<?= $admin['id_admin']; ?>">
                                                <p>Apakah Anda yakin ingin menghapus Admin <strong><?= $admin['nama_admin']; ?></strong>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="delete_admin" class="btn btn-danger">Hapus</button>
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

        <!-- Modal Create Admin -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="../../backend/admin/create.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Admin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="nama_admin">Nama Admin:</label>
                                <input class="form-control" type="text" name="nama_admin" id="nama_admin" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email:</label>
                                <input class="form-control" type="email" name="email" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama_admin">Password:</label>
                                <input class="form-control" type="password" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="create_admin" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

<?php
    require "../layout/footer.php";
?>