
<?php
session_start();
if (isset($_SESSION['username'])){?>
<!DOCTYPE HTML>
<html>
    <head>
        <link href="img/nicklahara.png" rel="icon">
        <title>Beranda Music</title>
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/musik.css" rel="stylesheet">
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/musik.js"></script>
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
            <li class="user"><p><span class="glyphicon glyphicon-user"></span></p></li>
        </ul>
        
        <form action="" method="post">
            <input type="text" placeholder="search">
            <button type="submit" class="btncari"><span class="glyphicon glyphicon-search"></span></button>
        </form>
    </header>
    <div class="menu">
            <span class="panah"></span>
        
            <ul>
            <li><span class="glyphicon glyphicon-user"></span><a href="profil.php">Profile</a></li>
            <li><span class="glyphicon glyphicon-log-out"></span><a href="logout.php">Logout</a></li>
                </ul>
        </div>
    <div class="subheader">
        <button type="button" class="sort">Sort By <span class="glyphicon glyphicon-chevron-down"></span></button>
        <button type="button" class="sort1" title="Film"><span class="glyphicon glyphicon-film"></span></button>
        <button type="button" class="sort2" title="Video Clip"><span class="glyphicon glyphicon-facetime-video"></span></button>
        <button type="button" class="sort3" title="Music"><span class="glyphicon glyphicon-music"></span></button>
    </div>
    <div class="isisort">
        <span></span>
        <ul>
            <li>Lagu</li>
            <li>Genre</li>
            <li>Album</li>
            <li>Artis</li>
        </ul>
    </div>
    <div class="newest">
            <div class="caption"><button type="button"><span class="glyphicon glyphicon-play"></span></button></div>
        </div>
                <div class="status">
                    <img src="img/avatar.png" class="imgprofil">
                    <p class="padmin"><b>User :</b><br>
                        <?php echo $_SESSION['username']."<br>".$_SESSION['email']; ?>
                    </p>
                </div>
                <div class="komen">
                    <form action="inputkomen.php" method="post">
                    <input type="hidden" name="nama" value="<?php echo $_SESSION['username'];?>">
                        <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d");?>">
                    <textarea name="komen"></textarea>
                        <button type="submit"><span class="glyphicon glyphicon-send"></span></button>
                    </form>
                </div>
                <div class="tampilkomen">
                    <table width="100%">
                    <?php
                        include("koneksi.php");
                        $sql=mysql_query("select * from komentar");
                        while ($t=mysql_fetch_array($sql)){
                            echo "<tr><td ><tr>
                            <td colspan=2><b>$t[nama] : </b></td>
                            </tr>
                            <tr>
                            <td  class='tdkomen'>$t[komentar]</td>
                            
                            </tr></td</tr>";
                        }
                    ?>
                        </table>
                </div>
                <div class="listlagu">
                    <table  width="100%" >
                        <tr class="trsatu">
                            <td width="30px">No</td>
                            <td width="30px"><span class="glyphicon glyphicon-arrow-down"></span></td>
                            <td width="240px">Judul</td>
                            <td width="200px">Artis</td>
                            <td width="130px">Genre</td>
                            <td width="130px">Album</td>
                            <td width="110px">Durasi</td>
                            <td class='action'><span class="glyphicon glyphicon-heart"></span></td>
                        </tr>
                        <?php
    include("koneksi.php");
    $sql=mysql_query("select * from lagu");
    $no=1;
    while ($r=mysql_fetch_array($sql)){
        echo"<tr class='trdua'>
        <td>$no</td>
        <td><span class='glyphicon glyphicon-download'></span></td>
        <td class='tdjudul'>$r[judul]</td>
        <td class='tdartis'>$r[artis]</td>
        <td>$r[genre]</td>
        <td>$r[album]</td>
        <td>$r[durasi]</td>
        <td class='action'><span class='glyphicon glyphicon-heart-empty'></span></td>
        </tr>";
        $no++;
    }
    ?>
                    </table>
                </div>
                <footer>COPYRIGHT &copy; NICOLAHARA682016</footer>
</body>
</html>
<?php
}else{
    header("location:logout.php");
}
?>
    