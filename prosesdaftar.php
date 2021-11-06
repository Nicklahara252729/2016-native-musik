<?php
include("koneksi.php");
$nama=$_POST['nama'];
$pass=$_POST['password'];
$email=$_POST['email'];
$sql=mysql_query("insert into user set username='$nama',password='$pass',email='$email'");
header("location:index.php");
?>