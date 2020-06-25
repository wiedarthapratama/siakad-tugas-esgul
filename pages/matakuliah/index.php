<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Matakuliah
            <?php
                if($_SESSION['level']==1){
            ?>
            <div class="pull-right">
                <a href="?p=input-matakuliah" class="btn btn-primary btn-sm">Input</a>
            </div>
            <?php
                }
            ?>
        </h5>
        <table class="table table-striped table-bordered table-hover" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Matakuliah</th>
                    <th>Nama Matakuliah</th>
                    <?php
                        if($_SESSION['level']==1){
                    ?>
                    <th>Aksi</th>
                    <?php
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    include "./config/config_header.php";
                    $sql = "SELECT * FROM matakuliah order by kodemk asc";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($a = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $a['kodemk'] ?></td>
                            <td><?= $a['namamk'] ?></td>
                            <?php
                                if($_SESSION['level']==1){
                            ?>
                            <td>
                                <a href="?p=ubah-matakuliah&kodemk=<?=$a['kodemk']?>" class="btn btn-warning btn-sm">Ubah</a>
                                <a href="?p=hapus-matakuliah&kodemk=<?=$a['kodemk']?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                            <?php
                                }
                            ?>
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