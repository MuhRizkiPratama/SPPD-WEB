<?php
    require "../../config/connection.php";
    require "../layout/header.php";
    require "../../backend/jabatan/show.php";
    $list = list_jabatan();
    $no = 1;
?>
<main>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Jabatan</h5>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="bi bi-plus"></i>
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
                                    foreach ($list as $jabatan){
                                        echo "<tr>";
                                        echo "<td>". $no++ . "</td>";
                                        echo "<td>". $jabatan['jabatan'] ."</td>";
                                        echo "<td>"."</td>";
                                        echo "</tr>";
                                    }
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
                            <label class="form-label" for="jabatan">Jabatan :</label>
                            <input class="form-control" type="text" name="jabatan" id="jabatan" required>
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