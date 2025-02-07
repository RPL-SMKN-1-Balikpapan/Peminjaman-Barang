<!-- proseseditpeminjam.php -->
<?php
include "config/koneksi.php";
$id_peminjam = $_POST['id_peminjam'];
$username = $_POST['username'];
$password = $_POST['password'];
$jurusan = $_POST['jurusan'];
$no_kelas = $_POST['no_kelas'];

$ganti = "UPDATE anggota SET password='$password', nama='$username', jurusan='$jurusan', no_kelas='$no_kelas' WHERE id_anggota='$id_peminjam'";
$update = $mysqli->query($ganti);

if ($update) {
	header("location:peminjam.php");
} else {
	echo "gagal mengubah data";
}
?>
