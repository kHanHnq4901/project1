<?php
session_start();
if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
?>
    <?php
    if (isset($_GET["ma"])) {
        $ma = $_GET["ma"];
        include("../connect/open.php");
        $sql = "SELECT * FROM user   WHERE maUser = $ma ";
        $result = mysqli_query($con, $sql);
        $tt = mysqli_fetch_array($result);
        include("../connect/close.php"); ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="css/chinh-sua-admin.css">
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
            </style>

        </head>

        <body>
            <div class="site-bar">
                <?php include("site-bar.php") ?>
            </div>
            <div class="main">
                <img src="css/5980.jpg_wh860.jpg" alt="">
                <div class="form">
                    <form action="chinh-sua-user-process.php">
                        <center>
                            <h2>Chỉnh sửa thông tin tài khoản <?php echo $tt["username"] ?></h2>
                        </center>
                        <input type="hidden" name="ma" value="<?php echo $ma ?>">
                        <table class="chinh-sua">
                            <tr>
                                <td>Họ và tên : </td>
                                <td> <input type="text" name="ten" value="<?php echo $tt["tenUser"] ?>"></td>
                            </tr>
                            <tr>
                                <td>Ngày sinh :</td>
                                <td><input type="date" name="ngaySinh" value="<?php echo $tt["ngaySinh"] ?>"></td>
                            </tr>
                            <tr>
                                <td>Email :</td>
                                <td><input type="text" name="email" value="<?php echo $tt["email"] ?>"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại : </td>
                                <td><input type="text" name="sdt" value="<?php echo $tt["sdt"] ?>"></td>
                            </tr>
                        </table>

                        <center><button>Sửa</button></center>

                    </form>
                </div>
            </div>
            <script>
                <?php if (isset($_GET["sua-thanh-cong"])) { ?>
                    alert("Bạn đã sửa thông tin thành công")
                <?php } ?>
            </script>
        </body>

        </html>
<?php  } else header("Location:quan-ly-nguoi-dung.php");
} else header("Location:dang-nhap-admin.php"); ?>