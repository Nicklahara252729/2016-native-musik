<?php
session_start();
include("../koneksi.php");
$id=$_GET['id'];
$sql=mysql_query("delete from user where id='$id'");
header("location:home.php");
?>