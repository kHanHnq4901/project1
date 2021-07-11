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
        <link rel="stylesheet" href="css/css-chinh-sua-tt.css">
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
            <?php include("site-bar.php");
            $admin = $_SESSION["admin"];
            $ma = $admin["maAdmin"];
            include("../connect/open.php");
            $sql = "SELECT * FROM admin WHERE maAdmin = $ma ";
            $result = mysqli_query($con, $sql);
            $tt = mysqli_fetch_array($result);
            include("../connect/close.php");
            ?>
        </div>
        <div class="main">
            <img src="css/5980.jpg_wh860.jpg" alt="">
            <div class="form">
                <form action="chinh-sua-thong-tin-process.php">
                    <input type="hidden" name="ma" value="<?php echo $ma ?>">
                    <table>
                        <center>
                            <h2>Chỉnh sửa thông tin</h2>
                        </center>
                        </tr>
                        <tr>
                            <td>Họ và tên :</td>
                            <td> <input type="text" id="ten" name="ten" value="<?php echo $tt["tenAdmin"] ?>"></td>
                            <td><span id="errTen"></span></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh :</td>
                            <td><input type="date" id="ngaySinh" name="ngaySinh" value="<?php echo $tt["ngaySinh"] ?>"></td>
                            <td><span id="errNs"></span></td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td><input type="text" id="email" name="email" value="<?php echo $tt["email"] ?>"></td>
                            <td><span id="errEmail"></span></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại : </td>
                            <td><input type="text" id="sdt" name="sdt" value="<?php echo $tt["sdt"] ?>"></td>
                            <td><span id="errSdt"></span></td>
                        </tr>
                    </table>
                    <center><button onclick="return ktra()">Sửa</button></center>
                </form>
            </div>
        </div>
        <script>
            <?php if (isset($_GET["sua-thanh-cong"])) { ?>
                alert("Bạn đã sửa thông tin thành công")
            <?php } ?>

            function ktra() {
                var ten = document.getElementById("ten").value;
                var email = document.getElementById("email").value;
                var sdt = document.getElementById("sdt").value;
                var errTen = document.getElementById("errTen");
                var email = document.getElementById("errEmail");
                var sdt = document.getElementById("errSdt");
                var dem = 0;

                if (ten == "") {
                    errTen.innerHTML = "Chưa nhập";
                } else {
                    errTen.innerHTML = "";
                    dem++;
                }
                if (email == "") {
                    errEmail.innerHTML = "Chưa nhập";
                } else {
                    errEmail.innerHTML = "";
                    dem++;
                }
                if (sdt == "") {
                    errTen.innerHTML = "Chưa nhập";
                } else {
                    errSdt.innerHTML = "";
                    dem++;
                }
                if (dem == 3) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </body>

    </html>
<?php  } else header("Location:dang-nhap-admin.php"); ?>