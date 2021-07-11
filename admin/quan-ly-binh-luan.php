<?php
session_start();
if (isset($_GET["ma"])) {
    $admin = $_SESSION["admin"];
    $ma = $_GET["ma"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/quan-ly-binh-luan.css">
    </head>

    <body>
        <div class="site-bar">
            <?php include("site-bar.php") ?>
        </div>
        <div class="main">
            <img src="css/5980.jpg_wh860.jpg" class="img2" alt="">
            <div class="form">
                <center>
                    <h2>Quản lý bình luận</h2>
                </center>
                <?php
                include("../connect/open.php");
                $limit = 10;
                $start = 0;
                $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM binhluan INNER JOIN user ON user.maUser=binhluan.maUser WHERE maBaiViet=$ma ORDER BY maBinhLuan DESC LIMIT $start,$limit";
                $resultDemBaiViet = mysqli_query($con, $sqlDemBaiViet);
                $demBaiViet = mysqli_fetch_array($resultDemBaiViet);
                $tongSoBaiViet = $demBaiViet["tongBaiViet"];
                $soTrang = ceil($tongSoBaiViet / $limit);
                if (isset($_GET["trang"])) {
                    $trang = $_GET["trang"];
                    $start = ($trang - 1) * $limit;
                }
                $sql = "SELECT * FROM binhluan INNER JOIN user ON binhluan.maUser=user.maUser WHERE maBaiViet=$ma ORDER BY maBinhLuan DESC  LIMIT $start,$limit";
                $result = mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                include("../connect/close.php");
                $i = 0;
                ?>
                <?php if ($num == 0) {
                    echo "Không có bình luân nào<br> "; ?>
                <?php } else { ?>
                    <table border="1" align="center">

                        <tr>
                            <td>Tài khoản</td>
                            <td>Họ và Tên</td>
                            <td>Nội dung</td>
                        </tr>
                        <?php
                        while ($bd = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $bd["username"] ?></td>
                                <td><?php echo $bd["tenUser"] ?></td>

                                <td><?php echo $bd["noiDung"] ?></td>
                                <td><a href="xoa-binh-luan-process.php?ma=<?php echo $bd["maBinhLuan"] ?>&&maBaiViet=<?php echo $ma ?>" onclick="confirm('Bạn có chắc muốn xóa bình luận này')">Xóa</a></td>
                                <input type="hidden" name="maBaiViet" value="<?php echo $ma ?>">
                        <?php }
                    } ?>
                            </tr>
                    </table>
                    <a href="quan-ly-tin-tuc.php">Quay lại</a>
                    <center><?php for ($j = 1; $j <= $soTrang; $j++) {
                            ?>
                            <a href=" ?trang=<?php echo $j; ?>"><?php echo $j; ?></a>
                        <?php
                            }
                        ?></center>
            </div>
        </div>
    </body>

    </html>
<?php } else header("Location:quan-ly-tin-tuc.php"); ?>