<!DOCTYPE HTML>
<html>
    <head>
        <link href="img/nicklahara.png" rel="icon">
        <title>Welcome to Musik Application</title>
        <link href="css/musik.css" rel="stylesheet">
        
        <script src="js/jquery-2.1.4.js" >
        </script>
        <script src="js/musik.js"></script>
    </head>
    <body onload="load()">
        <div class="container">
            <div class="logo">
                <p>MUSIC APPLICATION</p>
                <div class="login">
                    <p>LOGIN</p>
                    <form action="proseslogin.php" method="post">
                        <input type="text" name="nama" placeholder="Username" required class="inpt1">
                        <input type="password" name="password" placeholder="Password" required class="inpt2">
                        <button type="submit">Login</button><br>
                        <input type="checkbox" class="kcbx"> <h4>Remember me ?</h4>
                        
                    </form>
                </div>
                <div class="register">
                    <p>REGISTER</p>
                    <form action="prosesdaftar.php" method="post">
                        <input type="text" name="nama" placeholder="Nama" required class="inpt1">
                        <input type="password" name="password" placeholder="Password" required class="inpt2">
                        <input type="text" name="email" placeholder="Email" required class="inpt3">
                        <button type="submit">Submit</button>
                    </form>
                </div>
                <div id="slider">
                    <div id="imgs">
                        <img src="img/adele.png" id="img1">
                        <span></span>
                        <button class="main"></button>
                    </div>
                </div>
                <div class="respone">
                    <table border="0" width="100%">
                    <?php
                        include("koneksi.php");
                        $sql=mysql_query("select * from komentar");
                        while ($t=mysql_fetch_array($sql)){
                            echo "<tr><td ><tr>
                            <td colspan=2><b>$t[nama] : $t[tanggal] </b></td>
                            </tr>
                            <tr>
                            <td  class='tdkomen'>$t[komentar]</td>
                            </tr></td</tr>";
                        }
                    ?>
                    </table>
                </div>
            </div>
            <button type="button" class="forgot">forgot ?</button>
        </div>
    </body>
</html>