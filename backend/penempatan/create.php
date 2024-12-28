<?php
    require "../../config/connection.php";

    if(isset($_POST['create_penempatan'])){
        $penempatan = $_POST['penempatan'];

        $query_add_penempatan = "INSERT INTO penempatan values ('$penempatan')";

    }
?>