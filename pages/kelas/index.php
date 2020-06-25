<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Kelas
            <?php
                if($_SESSION['level']==1){
            ?>
            <div class="pull-right">
                <a href="?p=input-kelas" class="btn btn-primary btn-sm">Input</a>
            </div>
            <?php 
                }
            ?>
        </h5>
        <table class="table table-striped table-bordered table-hover" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Matakuliah</th>
                    <th>Dosen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    include "./config/config_header.php";
                    $sql = "SELECT * FROM kelas k join matakuliah m on m.kodemk=k.kodemk join dosen d on d.nip=k.nip order by kodekls asc";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($a = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $a['kodekls'] ?></td>
                            <td><?= $a['namakls'] ?></td>
                            <td><?= $a['namamk'] ?></td>
                            <td><?= $a['nama'] ?></td>
                            <td>
                                <a href="?p=detail-kelas&kodekls=<?=$a['kodekls']?>" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                <?php }
                    } else {
                        echo "0 results";
                    }
                    include "./config/config_footer.php";
                ?>
            </tbody>
        </table>
    </div>
</div>