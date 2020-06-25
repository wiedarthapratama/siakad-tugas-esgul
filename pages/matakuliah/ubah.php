<?php
    include "./config/config_header.php";
    $kodemk = $_GET['kodemk'];
    $queryGet = "SELECT * FROM matakuliah WHERE kodemk='$kodemk'";
    $matakuliah = $conn->query($queryGet);
    $a = mysqli_fetch_array($matakuliah);
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Ubah Matakuliah
        </h5>
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Kode Matakuliah</label>
                        <input type="text" name="kodemk" readonly value="<?=$a['kodemk']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama Matakuliah</label>
                        <input type="text" name="namamk" value="<?=$a['namamk']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" value="Perbarui" name="submit" class="btn btn-primary">
                        <a href="?p=matakuliah" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php 
    if(isset($_POST['submit'])){
        $kodemk = $_POST['kodemk'];
        $namamk = $_POST['namamk'];

        $sql = "UPDATE matakuliah SET namamk='$namamk' WHERE kodemk='$kodemk'";
        if ($conn->query($sql) === TRUE) {
        echo "<script>document.location='?p=matakuliah'</script>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        include "./config/config_footer.php";
    }
?>