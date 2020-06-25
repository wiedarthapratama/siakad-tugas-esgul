<?php
    session_start();
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Mahasiswa
            <?php
                if($_SESSION['level']==1){
            ?>
            <div class="pull-right">
                <a href="?p=input-mahasiswa" class="btn btn-primary btn-sm">Input</a>
            </div>
            <?php
                }
            ?>
        </h5>
        <table class="table table-striped table-bordered table-hover" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
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
                    $sql = "SELECT * FROM mahasiswa order by nim asc";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($a = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $a['nim'] ?></td>
                            <td><?= $a['nama'] ?></td>
                            <td><?= $a['email'] ?></td>
                            <td><?= $a['nohp'] ?></td>
                            <td><?= $a['alamat'] ?></td>
                            <?php
                                if($_SESSION['level']==1){
                            ?>
                            <td>
                                <a href="?p=ubah-mahasiswa&nim=<?=$a['nim']?>" class="btn btn-warning btn-sm">Ubah</a>
                                <a href="?p=hapus-mahasiswa&nim=<?=$a['nim']?>" class="btn btn-danger btn-sm">Hapus</a>
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