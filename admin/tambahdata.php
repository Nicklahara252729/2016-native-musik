<?php
include("../koneksi.php");
$judul=$_POST['judul'];
$artis=$_POST['artis'];
$genre=$_POST['genre'];
$album=$_POST['album'];
$durasi=$_POST['durasi'];
$tgl=$_POST['tanggal'];
$sql=mysql_query("insert into lagu set judul='$judul',genre='$genre',album='$album',artis='$artis',durasi='$durasi',tanggal='$tgl'");
header("location:home.php");
?>