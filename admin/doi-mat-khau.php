<?php
session_start();
if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/css-doi-mk.css">
        <style>
            .site-bar {
                width: 20%;
                height: 700px;
                background-color: #009cd7;
                color: white;
            }

            a {
                text-decoration: none;
                color: white;
            }

            li {
                list-style: none;
                color: white;
            }

            .cha {
                list-style: none;
                min-height: 90px;
            }

            #menu {
                background: #009cd7;
            }

            span {
                color: red;
            }
        </style>

    </head>

    <body>
        <div class="site-bar">
            <?php
            include("site-bar.php");
            $admin = $_SESSION["admin"];
            $ma = $admin["maAdmin"];
            $pass = $admin["pass"];
            ?>
        </div>
        <div class="main">
            <img src="css/5980.jpg_wh860.jpg" alt="">
            <div class="form">
                <form action="doi-mat-khau-process.php" method="post">
                    <h2>
                        <center> Đổi mật khẩu</center>
                    </h2>
                    <table align="center">
                        <input type="hidden" name="ma" value="<?php echo $ma ?>">
                        <tr>
                            <td> Nhập mật khẩu hiện tại: </td>
                            <td> <input type="password" id="pass" name="passCu"> <br></td>
                            <td><span id="errPass"></span></t </tr> <tr>
                            <td> Nhập mật khẩu mới:</td>
                            <td> <input type="password" id="pass2" name="pass"> <br></td>
                            <td><span id="errPass2"></span></td>
                        </tr>
                        <tr>
                            <td>Nhập lại mật khẩu mới: </td>
                            <td><input type="password" id="pass3"><br></td>
                            <td><span id="errPass3"></span></td>
                        </tr>
                    </table>
                    <?php if (isset($_GET["err"])) {
                        echo "<center><font color = 'red'>Bạn nhập sai mật khẩu</font></center><br>";
                    } ?>
                    <center> <Button onclick="return check()">Đổi mật khẩu</Button></center>
                </form>
            </div>
        </div>
        <script>
            <?php if (isset($_GET["doi-thanh-cong"])) { ?>
                alert("Bạn đổi mật khẩu thành công");
            <?php } ?>
            <?php if (isset($_GET["err"])) { ?>
                errPass.innerhtml = "Bạn nhập sai mật khẩu";
            <?php } ?>

            function check() {
                var pass = document.getElementById("pass").value;
                var pass2 = document.getElementById("pass2").value;
                var pass3 = document.getElementById("pass3").value;
                var pass = document.getElementById("pass");
                var pass2 = document.getElementById("pass2");
                var pass3 = document.getElementById("pass3");
                var dem = 0;

                if (pass == "") {
                    errPass.innerHTML = "Bạn chưa nhập mật khẩu";
                } else {
                    errPass.innerHTML = "";
                    dem++;
                }
                if (pass2 == "") {
                    errPass.innerHTML = "Bạn chưa nhập";
                } else {
                    errPass.innerHTML = "";
                    dem++;
                }
                if (pass3 == "") {
                    errPass.innerHTML = "Bạn chưa nhập";
                } else if (pass3 == !pass2) {
                    errPass.innerHTML = "mật khẩu mới không trùng";
                } else {
                    errPass.innerHTML = "";
                    dem++;
                }
                if (dem == 3) {
                    return true;
                }
                return false;
            }
        </script>
    </body>

    </html>
<?php } else
    header("Location:dang-nhap-admin.php") ?>