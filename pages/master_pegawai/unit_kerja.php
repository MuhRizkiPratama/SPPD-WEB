<?php
    require "../../config/connection.php";
    require "../layout/header.php";
?>
<main>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Unit Kerja</h5>
            </div>
            <div class="card-body">
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
                            <tr>
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
</main>
<?php
    require "../layout/footer.php";
?>