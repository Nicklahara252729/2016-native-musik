<?php
session_start();
include("../koneksi.php");
$id=$_POST['id'];
$judul=$_POST['judul'];
$genre=$_POST['genre'];
$album=$_POST['album'];
$artis=$_POST['artis'];
$durasi=$_POST['durasi'];
$tanggal=$_POST['tanggal'];
$sql=mysql_query("update lagu set judul='$judul',genre='$genre',album='$album',artis='$artis',durasi='$durasi',tanggal='$tanggal' where id='$id'");
header("location:home.php");
?>