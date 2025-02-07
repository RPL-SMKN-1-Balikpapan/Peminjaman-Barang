<?php
include 'config/koneksi.php';
$username = $_POST['nama'];
$password = $_POST['password'];
$jurusan = $_POST['jurusan'];
$no_kelas = $_POST['no_kelas'];

$query = $mysqli->query("INSERT INTO anggota(nama, password, jurusan, no_kelas) VALUES ('$username','$password', '$jurusan', '$no_kelas')");

if ($query) {
    header("location:peminjam.php");
} else {
    echo "gagal menambah data";
}
?>
