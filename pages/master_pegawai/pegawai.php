<?php
    require "../layout/header.php";
    require "../../backend/pegawai/show.php";
?>
    <main>
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Data Pegawai</h5>
                </div>
                <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus"></i>
                </button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>No Badge</th>
                                    <th>Nama Pegawai</th>
                                    <th>Uang Saku</th>
                                    <th>Jabatan</th>
                                    <th>Unit Kerja</th>
                                    <th>Penempatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Update Pegawai -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="post">
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
                                <label class="form-label" for="role">Role:</label>
                                <select class="form-select" name="role" id="role" required>
                                    <option disabled selected></option>
                                    <option value="pegawai">Pegawai</option>
                                    <option value="admin">Admin</option>
                                </select>
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
                                <select class="form-select" name="jabatan" id="jabatan" required>
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="unit_kerja">Unit Kerja:</label>
                                <select class="form-select" name="unit_kerja" id="unit_kerja" required>
                                
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="penempatan">Penempatan:</label>
                                <select class="form-select" name="penempatan" id="penempatan" required>
                                
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

        <!-- Modal Create Pegawai -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="post">
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
                                <label class="form-label" for="role">Role:</label>
                                <select class="form-select" name="role" id="role" required>
                                    <option disabled selected></option>
                                    <option value="pegawai">Pegawai</option>
                                    <option value="admin">Admin</option>
                                </select>
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
                                <select class="form-select" name="jabatan" id="jabatan" required>
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="unit_kerja">Unit Kerja:</label>
                                <select class="form-select" name="unit_kerja" id="unit_kerja" required>
                                
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="penempatan">Penempatan:</label>
                                <select class="form-select" name="penempatan" id="penempatan" required>
                                
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