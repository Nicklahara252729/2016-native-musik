<?php
session_start();
include ("koneksi.php");
$nama=$_POST['nama'];
$pass=$_POST['password'];
$sql="select * from user where username='$nama' and password='$pass'";
$hasil=mysql_query($sql) or exit ("Error query : <b>".$sql."</b>");
if (mysql_num_rows($hasil)>0){
    $r=mysql_fetch_array($hasil);
    $_SESSION['username']=$r['username'];
    $_SESSION['password']=$r['password'];    
    $_SESSION['email']=$r['email'];    
    if($r['username']=="nico"){
       $t=mysql_fetch_array($hasil);
        header("location:admin/home.php");
    }else{
    header("location:home.php");    }
}else{
    header("location:error.php");
}
?>