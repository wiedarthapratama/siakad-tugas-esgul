<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Input Matakuliah
        </h5>
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Kode Matakuliah</label>
                        <input type="text" name="kodemk" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama Matakuliah</label>
                        <input type="text" name="namamk" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
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

        include "./config/config_header.php";
        $sql = "INSERT INTO matakuliah (kodemk, namamk) VALUES ('$kodemk','$namamk')";
        if ($conn->query($sql) === TRUE) {
        echo "<script>document.location='?p=matakuliah'</script>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        include "./config/config_footer.php";
    }
?>