<?php
    include "./config/config_header.php";
    $kodemk = $_GET['kodemk'];
    $sql = "DELETE FROM matakuliah WHERE kodemk='$kodemk'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>document.location='?p=matakuliah'</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    include "./config/config_footer.php";
?>