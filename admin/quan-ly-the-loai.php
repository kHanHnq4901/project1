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
        <link rel="stylesheet" href="css/quan-li-the-loai.css">
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

            .trang {
                color: black;
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
                <?php
                include("../connect/open.php");
                $limit = 4;
                $start = 0;
                $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM theloai  ";
                $resultDemBaiViet = mysqli_query($con, $sqlDemBaiViet);
                $demBaiViet = mysqli_fetch_array($resultDemBaiViet);
                $tongSoBaiViet = $demBaiViet["tongBaiViet"];
                $soTrang = ceil($tongSoBaiViet / $limit);
                if (isset($_GET["trang"])) {
                    $trang = $_GET["trang"];
                    $start = ($trang - 1) * $limit;
                }
                $sql = "SELECT * FROM theloai ORDER BY maTheLoai DESC LIMIT $start,$limit";
                $result = mysqli_query($con, $sql);
                include("../connect/close.php");
                $i = 0;
                ?>
                <center>
                    <h2>Quản lí thể loại</h2>
                </center>
                <table align="center" border="1">
                    <tr>
                        <td>Tên Thể Loại</td>
                    </tr>
                    <?php
                    include("../connect/open.php");
                    $sqlbv = "SELECT tenTheLoai,baidang.maTheLoai, COUNT(theloai.maTheLoai) AS 'So luong' FROM baidang inner join theloai on theloai.maTheLoai = baidang.maTheLoai GROUP BY theloai.maTheLoai";
                    $resultbv = mysqli_query($con, $sqlbv);
                    include("../connect/close.php");
                    ?>
                    <?php while ($bv = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $bv["tenTheLoai"] ?></td>
                            <td>
                                <form action="sua-the-loai.php?" method="POST">
                                    <input type="hidden" name="ma" value="<?php echo $bv["maTheLoai"] ?>">
                                    <button>Sửa</button>
                                </form>
                            </td>

                            <?php
                            $bvv = $bv["maTheLoai"];
                            include("../connect/open.php");
                            $sqltl = "SELECT * FROM baidang WHERE maTheLoai = $bvv";
                            $resulttl = mysqli_query($con, $sqltl);
                            $num = mysqli_num_rows($resulttl);
                            include("../connect/close.php");
                            ?>
                            <?php if ($num == 0) { ?>
                                <td>
                                    <form action="xoa-the-loai-process.php?" method="POST">
                                        <input type="hidden" name="ma" value="<?php echo $bv["maTheLoai"] ?>">
                                        <button onclick="confirm('Bạn có chắc muốn xóa thể loại')">Xóa</button>
                                    </form>
                                </td>
                            <?php } else echo ""; ?>

                        </tr>
                    <?php  } ?>
                </table>
                <center>
                    <?php for ($j = 1; $j <= $soTrang; $j++) {
                    ?>
                        <a href="?trang=<?php echo $j; ?>" class="trang"><?php echo $j; ?></a>
                    <?php
                    }
                    ?> </center>
            </div>
        </div>
        <script>
            <?php if (isset($_GET["thanh-cong"])) { ?>
                alert("Bạn thêm thành công");
            <?php } ?>
            <?php if (isset($_GET["sua-thanh-cong"])) { ?>
                alert("Bạn sửa thành công");
            <?php } ?>
            <?php if (isset($_GET["xoa-thanh-cong"])) { ?>
                alert("Bạn xóa thành công");
            <?php } ?>
        </script>
    </body>

    </html>
<?php } else header("Location:dang-nhap-admin.php") ?>