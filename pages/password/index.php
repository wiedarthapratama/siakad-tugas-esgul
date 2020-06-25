<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Ubah Password
        </h5>
        <form method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi_password_baru" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php 
    session_start();
    if(isset($_POST['submit'])){
        $password_baru = $_POST['password_baru'];
        $konfirmasi_password_baru = $_POST['konfirmasi_password_baru'];

        if($password_baru == $konfirmasi_password_baru) {
            $password_baru = sha1($password_baru);
            $username = $_SESSION['username'];
            include "./config/config_header.php";
            $sql = "UPDATE pengguna SET password='$password_baru' WHERE username='$username'";
            if ($conn->query($sql) === TRUE) {
                echo "Ubah Password Berhasil";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            include "./config/config_footer.php";
        }else{
            echo "konfirmasi password tidak sesuai";
        }

    }
?>