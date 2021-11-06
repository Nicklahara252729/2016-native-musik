
<?php
session_start();
if (isset($_SESSION['username'])){?>
<!DOCTYPE HTML>
<html>
    <head>
        <link href="../img/nicklahara.png" rel="icon">
        <title>Beranda Admin</title>
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/musik.css" rel="stylesheet">
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/musik.js"></script>
    </head>
<body>
    <header>
        <p><a href="home.php" class="judul">MUSIC APPS</a></p>
        <div class="gambar"></div>
        <div class="musicplay">
            <p>Hello - Adele :: MP3 :: 04:00 </p>
            <div class="submusicplay">
                <span class="glyphicon glyphicon-asterisk"></span>
                <button class="glyphicon glyphicon-repeat"></button>
                <button class="glyphicon glyphicon-share-alt"></button>
                <button class="glyphicon glyphicon-volume-up"></button>
                
                <button class="glyphicon glyphicon-list" id="list"></button>
            </div>
        </div>
        <button type="button" class="btnplay4"><span class="glyphicon glyphicon-step-backward"></span></button>
        <button type="button" class="btnplay1"><span class="glyphicon glyphicon-backward"></span></button>
        <button type="button" class="btnplay"><span class="glyphicon glyphicon-play"></span></button>
        <button type="button" class="btnplay2"><span class="glyphicon glyphicon-forward"></span></button>
        <button type="button" class="btnplay3"><span class="glyphicon glyphicon-step-forward"></span></button>
        <ul>
            <li title="Logout"><p><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></p></a></li>
        </ul>
        
        <form action="" method="post">
            <input type="text" placeholder="search">
            <button type="submit" class="btncari"><span class="glyphicon glyphicon-search" ></span></button>
        </form>
    </header>
    <div class="subheader">
        <button type="button" class="btninsert"><span class="glyphicon glyphicon-paperclip"></span> Tambah lagu</button>
        <button type="button" class="btnuser"><span class="glyphicon glyphicon-user"></span> Users</button>
    </div>
    <div class="edit">
        <p>EDIT DATA LAGU</p>
        <?php
        include ("../koneksi.php");
        $id=$_GET['id'];
        $sql=mysql_query("select * from lagu where id='$id'");
        $r=mysql_fetch_array($sql);
        echo"<form action='proseseditlagu.php' method='post'>
        <input type='hidden' name='id' value='$r[id]'>
            <input type='text' name='judul' placeholder='Judul lagu' value='$r[judul]'>
            <input type='text' name='genre' placeholder='Judul lagu' value='$r[genre]'>
            <input type='text' name='album' placeholder='Judul lagu' value='$r[album]'>
            <input type='text' name='artis' placeholder='Judul lagu' value='$r[artis]'>
            <input type='text' name='durasi' placeholder='Judul lagu' value='$r[durasi]'>
            <input type='text' name='tanggal' placeholder='Judul lagu' value='$r[tanggal]'>
            <a href='home.php'><button  class='cancel' type='submit'><span class='glyphicon glyphicon-remove-sign'></span></button></a>
            <button type='button' class='ok'><span class='glyphicon glyphicon-ok-sign'></span></button>
        </form>";
        ?>
        
    </div>
</body>
</html>
<?php
}else{
    header("location:logout.php");
}
?>
    