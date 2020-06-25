<?php
    include "./config/config_header.php";
    $nip = $_GET['nip'];
    $queryGet = "SELECT * FROM dosen WHERE nip='$nip'";
    $dosen = $conn->query($queryGet);
    $a = mysqli_fetch_array($dosen);
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Ubah Dosen
        </h5>
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nip</label>
                        <input type="text" name="nip" readonly value="<?=$a['nip']?>" class="form-control" required>
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
                        <a href="?p=dosen" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php 
    if(isset($_POST['submit'])){
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE dosen SET nama='$nama', email='$email', nohp='$nohp', alamat='$alamat' WHERE nip='$nip'";
        if ($conn->query($sql) === TRUE) {
        echo "<script>document.location='?p=dosen'</script>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        include "./config/config_footer.php";
    }
?>