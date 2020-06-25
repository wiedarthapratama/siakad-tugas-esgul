<?php
    include "./config/config_header.php";
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Input Kelas
        </h5>
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Kode Kelas</label>
                        <input type="text" name="kodekls" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" name="namakls" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Matakuliah</label>
                        <select name="kodemk" id="" class="form-control" required>
                            <option value="">Pilih Matakuliah</option>
                            <?php
                                $sql = "SELECT * FROM matakuliah order by namamk asc";
                                $result = $conn->query($sql);
                                while($a = $result->fetch_assoc()) { ?>

                                <option value="<?=$a['kodemk']?>"><?=$a['namamk']?></option>

                            <?php } 
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Dosen</label>
                        <select name="nip" id="" class="form-control" required>
                            <option value="">Pilih Dosen</option>
                            <?php
                                $sql = "SELECT * FROM dosen order by nama asc";
                                $result = $conn->query($sql);
                                while($d = $result->fetch_assoc()) { ?>

                                <option value="<?=$d['nip']?>"><?=$d['nama']?></option>

                            <?php } 
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Pilih Peserta Kelas</label>
                        <select name="nim" id="mahasiswa" class="form-control" required>
                            <option value="">Pilih Peserta</option>
                            <?php
                                $sql = "SELECT * FROM mahasiswa order by nama asc";
                                $result = $conn->query($sql);
                                while($m = $result->fetch_assoc()) { ?>

                                <option value="<?=$m['nim']?>"><?=$m['nama']?></option>

                            <?php } 
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" id="btnTambah" class="btn btn-success btn-sm">Tambahkan</button>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>Peserta</h3>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tb">

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
                        <a href="?p=kelas" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $('#btnTambah').click(function(){
        var mhs = $("#mahasiswa").find(":selected");
        var nim = mhs.val();
        var nama = mhs.html();
        if(nim!=""){
            $('#tb').append("<tr><td>"+nim+"</td><td><input type='hidden' name='dnim[]' value='"+nim+"'></input>"+nama+"</td><td><button type='button' onclick='hapus(this)' class='btn btn-danger btn-sm'>Hapus</button></td></tr>")
        }else{
            alert("pilih mahasiswa !");
        }
    });
    function hapus(obj){
        $(obj).parent().parent().remove();
    }
</script>
<?php 
    if(isset($_POST['submit'])){
        $kodekls = $_POST['kodekls'];
        $namakls = $_POST['namakls'];
        $kodemk = $_POST['kodemk'];
        $nip = $_POST['nip'];

        $sql = "INSERT INTO kelas (kodekls, namakls, kodemk, nip) VALUES ('$kodekls','$namakls','$kodemk','$nip')";
        if ($conn->query($sql) === TRUE) {
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $sql2 = "INSERT INTO peserta_kelas (kodekls, nim) VALUES ";
        for($i=0; $i<count($_POST['dnim']); $i++){
            $newnim = $_POST['dnim'][$i];
            if($i!=count($_POST['dnim'])-1){
                $sql2 .= "('$kodekls','$newnim'),";
            }else{
                $sql2 .= "('$kodekls','$newnim');";
            }
        }
        if ($conn->query($sql2) === TRUE) {
        } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
        echo "<script>document.location='?p=kelas'</script>";
    }
    include "./config/config_footer.php";
?>