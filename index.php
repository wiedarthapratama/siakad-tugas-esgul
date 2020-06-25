<?php
    session_start();
    if(!$_SESSION['username']){
        header("location: login.php");
        die();
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- datatable -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!-- datatable -->
        <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

        <title>SIAKAD</title>
        <style>
            body{
                background-color: #ecf0f1 !important;
            }
            .pull-right{
                float: right;
            }
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #007BFF;
                color: #fff;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="?p=home">SIAKAD</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                        $page = @$_GET['p'];
                        $page = explode("-", $page);
                        if(count($page)>1){
                            $page = $page[1];
                        }else{
                            $page = $page[0];
                        }
                    ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= $page==''||$page=='beranda'?'active':'' ?>" href="?p=beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $page=='mahasiswa'?'active':'' ?>" href="?p=mahasiswa">Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $page=='dosen'?'active':'' ?>" href="?p=dosen">Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $page=='matakuliah'?'active':'' ?>" href="?p=matakuliah">Matakuliah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $page=='kelas'?'active':'' ?>" href="?p=kelas">Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $page=='password'?'active':'' ?>" href="?p=password">Password</a>
                        </li>
                    </ul>
                    <a href="logout.php" class="btn btn-outline-light my-2 my-sm-0">Keluar</a>
                </div>
            </div>
        </nav>

        <!-- isi -->
        <div class="container">
            <br>
            <?php include "jembatan.php" ?>
            <!-- tutup isi -->
        </div>

        <div class="footer">
            <p>&copy; Copyright: Wied Artha Pratama <br> login sebagai : <?=$_SESSION['username']?></p>
        </div>

        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
    </body>
</html>