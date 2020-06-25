<?php
    include "./config/config_header.php";
    $kodekls = $_GET['kodekls'];
    $queryGet = "SELECT * FROM kelas k join matakuliah m on m.kodemk=k.kodemk join dosen d on d.nip=k.nip where kodekls='$kodekls'";
    $kelas = $conn->query($queryGet);
    $a = mysqli_fetch_array($kelas);
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Detail Kelas
        </h5>
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Kode Kelas</label>
                        <input type="text" readonly value="<?=$a['kodekls']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" readonly value="<?=$a['namakls']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Matakuliah</label>
                        <input type="email" readonly value="<?=$a['namamk']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Dosen</label>
                        <input type="text" readonly value="<?=$a['nama']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>List Peserta</h3>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nim Peserta</th>
                                <th>Nama Peserta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $sql = "SELECT * FROM peserta_kelas p join mahasiswa m on m.nim=p.nim where kodekls='$kodekls' order by nama asc";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                while($a = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $a['nim'] ?></td>
                                        <td><?= $a['nama'] ?></td>
                                    </tr>
                            <?php }
                                } else {
                                    echo "0 results";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="?p=dosen" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php 
    include "./config/config_footer.php";
?>