<?php
    include "./config/config_header.php";
    $nim = $_GET['nim'];
    $queryGet = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $mahasiswa = $conn->query($queryGet);
    $a = mysqli_fetch_array($mahasiswa);
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Ubah Mahasiswa
        </h5>
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nim</label>
                        <input type="text" name="nim" readonly value="<?=$a['nim']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="<?=$a['nama']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="<?=$a['email']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">No HP</label>
                        <input type="text" name="nohp" value="<?=$a['nohp']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control" required><?=$a['alamat']?></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" value="Perbarui" name="submit" class="btn btn-primary">
                        <a href="?p=mahasiswa" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php 
    if(isset($_POST['submit'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE mahasiswa SET nama='$nama', email='$email', nohp='$nohp', alamat='$alamat' WHERE nim='$nim'";
        if ($conn->query($sql) === TRUE) {
        echo "<script>document.location='?p=mahasiswa'</script>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        include "./config/config_footer.php";
    }
?>