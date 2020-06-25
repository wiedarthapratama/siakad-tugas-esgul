<?php
    include "./config/config_header.php";
    $nim = $_GET['nim'];
    $sql = "DELETE FROM mahasiswa WHERE nim=$nim";
    if ($conn->query($sql) === TRUE) {
        $sql2 = "DELETE FROM pengguna WHERE username=$nim";
        if ($conn->query($sql2) === TRUE) {
            echo "<script>document.location='?p=mahasiswa'</script>";
        }else{
            echo "Error2 deleting record: " . $conn->error;
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    include "./config/config_footer.php";
?>