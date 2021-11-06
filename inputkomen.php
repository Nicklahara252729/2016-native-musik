<?php
session_start();
include ("koneksi.php");
$nama=$_POST['nama'];
$komen=$_POST['komen'];
$tgl=$_POST['tanggal'];
$sql=mysql_query("insert into komentar set nama='$nama',komentar='$komen',tanggal='$tgl'");
header("location:home.php");
?>