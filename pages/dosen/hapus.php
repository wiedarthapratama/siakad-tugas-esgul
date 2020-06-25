<?php
    include "./config/config_header.php";
    $nip = $_GET['nip'];
    $sql = "DELETE FROM dosen WHERE nip=$nip";
    if ($conn->query($sql) === TRUE) {
        $sql2 = "DELETE FROM pengguna WHERE username=$nip";
        if ($conn->query($sql2) === TRUE) {
            echo "<script>document.location='?p=dosen'</script>";
        }else{
            echo "Error2 deleting record: " . $conn->error;
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    include "./config/config_footer.php";
?>