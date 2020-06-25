<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Input Dosen
        </h5>
        <form method="post">
            <div class="alert alert-primary" role="alert">
                Password Default Untuk Pengguna Yang Akan Login Di Aplikasi Adalah : <b>12345678</b>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nip</label>
                        <input type="text" name="nip" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">No HP</label>
                        <input type="text" name="nohp" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
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

        include "./config/config_header.php";
        $sql = "INSERT INTO dosen (nip, nama, email, nohp, alamat) VALUES ('$nip','$nama','$email','$nohp','$alamat')";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "INSERT INTO pengguna (username, password, level) VALUES ('$nip','7c222fb2927d828af22f592134e8932480637c0d', 2)";
            if ($conn->query($sql2) === TRUE) {
                echo "<script>document.location='?p=dosen'</script>";
            }else{
                echo "Error2: " . $sql2 . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        include "./config/config_footer.php";
    }
?>