<?php
if(isset($_GET["p"])){
    $page = $_GET["p"];
}else{
    $page = 'beranda';
}   
switch ($page){

    case "beranda":
        require ("pages/beranda.php");
        break;

    case "mahasiswa":
        require ("pages/mahasiswa/index.php");
        break;
    case "input-mahasiswa":
        require ("pages/mahasiswa/input.php");
        break;
    case "ubah-mahasiswa":
        require ("pages/mahasiswa/ubah.php");
        break;
    case "hapus-mahasiswa":
        require ("pages/mahasiswa/hapus.php");
        break;

    case "dosen":
        require ("pages/dosen/index.php");
        break;
    case "input-dosen":
        require ("pages/dosen/input.php");
        break;
    case "ubah-dosen":
        require ("pages/dosen/ubah.php");
        break;
    case "hapus-dosen":
        require ("pages/dosen/hapus.php");
        break;

    case "matakuliah":
        require ("pages/matakuliah/index.php");
        break;
    case "input-matakuliah":
        require ("pages/matakuliah/input.php");
        break;
    case "ubah-matakuliah":
        require ("pages/matakuliah/ubah.php");
        break;
    case "hapus-matakuliah":
        require ("pages/matakuliah/hapus.php");
        break;

    case "kelas":
        require ("pages/kelas/index.php");
        break;
    case "input-kelas":
        require ("pages/kelas/input.php");
        break;
    case "detail-kelas":
        require ("pages/kelas/detail.php");
        break;

    case "password":
        require ("pages/password/index.php");
        break;

    default:
        require ("pages/beranda.php");
}
?>