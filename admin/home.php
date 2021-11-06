
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
    <div class="tambahdata">
        <span></span>
        <form action="tambahdata.php" method="post">
        <input type="text" name="judul" placeholder="Judul lagu" required>
        <input type="text" name="artis" placeholder="Artis" required>
        <input type="text" name="genre" placeholder="Genre" required>
        <input type="text" name="album" placeholder="Album" required>
        <input type="text" name="durasi" placeholder="Durasi" required>
        <input type="text" name="tanggal" placeholder="tanggal" value="<?php echo date("Y-m-d");?>" required>
        <button type="submit">Submit</button>
            </form>
    </div>
    <div class="newest">
            <div class="caption"><button type="button"><span class="glyphicon glyphicon-play"></span></button>
                </div>
        </div>
                <div class="status2">
                    <img src="../img/nicklahara.png" class="imgprofil">
                    <p class="padmin"><b>Administrator :</b><br>
                        <?php echo $_SESSION['username']."<br>".$_SESSION['email']; ?>
                    </p>
                </div>
                <div class="komen2">
                    <form action="inputkomen.php" method="post">
                    <input type="hidden" name="nama" value="<?php echo $_SESSION['username'];?>">
                        <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d");?>">
                    <textarea name="komen"></textarea>
                        <button type="submit"><span class="glyphicon glyphicon-send"></span></button>
                </div>
                <div class="tampilkomen2">
                    <table border="0" width="100%">
                    <?php
                        include("../koneksi.php");
                        $sql=mysql_query("select * from komentar");
                        while ($t=mysql_fetch_array($sql)){
                            echo "<tr><td ><tr>
                            <td colspan=2><b>$t[nama] : $t[tanggal] </b></td>
                            </tr>
                            <tr>
                            <td  class='tdkomen'>$t[komentar]</td>
                            <td  class='tdkomen' width='30px'><a href='deletekomen.php?id=$t[id]'><button type='button' class='hpskomen'><span class='glyphicon glyphicon-trash'></span></button></a>
                            </tr></td</tr>";
                        }
                    ?>
                    </table>
                </div>
                <div class="listlagu2">
                    <table  width="100%" >
                        <tr class="trsatu">
                            <td width="30px">No</td>
                            <td width="30px"><span class="glyphicon glyphicon-arrow-down"></span></td>
                            <td width="220px">Judul</td>
                            <td width="170px">Artis</td>
                            <td width="110px">Genre</td>    
                            <td width="110px">Album</td>
                            <td width="100px">Durasi</td>
                            <td width="100px">Uploaded</td>
                            <td width="40px"><span class="glyphicon glyphicon-heart"></span></td>
                            <td class='action'>Action</td>
                        </tr>
                        <?php
    include("../koneksi.php");
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
        <td>$r[tanggal]</td>
        <td ><span class='glyphicon glyphicon-heart-empty'></span></td>
        <td class='action'><a href='editlagu.php?id=$r[id]'><button type='button' class='btndelete' title='Edit Lagu'><span class='glyphicon glyphicon-edit'></span></button></a>&nbsp;&nbsp;&nbsp; 
        <a href='deletelagu.php?id=$r[id]'><button type='button' class='btndelete' title='Hapus Lagu'><span class='glyphicon glyphicon-trash'></span></button></a>
        </tr>";
        $no++;
    }
    ?>
                    </table>
                </div>
                <div class="userinfo">
                    <div class="subuserinfo">
                        <p>Informasi User <button type="button" class="btnx"><span class="glyphicon glyphicon-remove"></span></button></p>
             <table  width="100%">
                 <tr class="truser">
                     <td width="20px" class="tduser">No</td>
                     <td width="150px" class="tduser">Username</td>
                     <td width="150px" class="tduser">Password</td>
                     <td width="150px" class="tduser">Email</td>
                     <td width="50px">Action</td>
                 </tr>
                 <?php
                include("../koneksi.php");
                $sql=mysql_query("select * from user");
                $no=1;
                while ($r=mysql_fetch_array($sql)){
                    echo"<tr>
                    <td class='tduser'>$no</td>
                    <td class='tduser'>$r[username]</td>
                    <td class='tduser'>$r[password]</td>
                    <td class='tduser'>$r[email]</td>
                    <td class='tduser'><a href='deleteuser.php?id=$r[id]'><button type='button'><span class='glyphicon glyphicon-trash'></span></button></a></td>
                    </tr>";
                    $no++;
                }
                ?>
                        </table>           
                    </div>
                    </div>
                <footer>COPYRIGHT &copy; NICOLAHARA682016</footer>
</body>
</html>
<?php
}else{
    header("location:logout.php");
}
?>
    