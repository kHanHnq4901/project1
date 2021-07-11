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

        <style>
            body {
                padding: 0px;
                margin: 0px;
                font-family: tahoma;
                font-size: 16PX;
                display: flex;
            }

            .site-bar {
                width: 20%;
                height: 700px;
                background-color: #009cd7;
                color: white;
            }

            ul li a {
                text-decoration: none;
                color: white;
                font-size: 20px;
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

            .main {
                background-repeat: no-repeat;
                position: relative;
                height: 700px;
                width: 100%;
                background-position: bottom right;
            }

            .img2 {
                display: block;
                position: absolute;
                width: 100%;
                height: 700px;
            }

            .con {
                display: none;
            }

            .cha:hover .con {
                display: block;
                background-color: pink;
            }

            .cha :hover li ca {
                background-color: hotpink;
            }

            .form {
                z-index: 1;
                background-color: #fff;
                width: auto;
                height: auto;
                border: 1px solid grey;
                border-radius: 10px;
                position: absolute;
                top: 0px;
                left: 0px;
            }

            h2 {
                color: green;
            }

            input {
                width: 200px;
                height: 34px;
                margin-bottom: 10px;
                border-radius: 5px;
                padding-left: 20px;
            }

            button {
                width: 50px;
                height: 34px;
                border-radius: 5px;
                color: seashell;
                background: orangered;
                border: none;
            }

            button:hover {
                background: green;
            }

            .img1 {
                height: 56px;
                width: 128px;
            }

            img {
                height: 100px;
                width: 150px;
            }
        </style>
    </head>

    <body>
        <div class="site-bar">
            <?php include("site-bar.php") ?>
        </div>
        <div class="main">
            <img src="css/5980.jpg_wh860.jpg" class="img2" alt="">
            <div class="form">
                <center>
                    <h2>Quản lý tin tức</h2>
                </center>
                <?php
                include("../connect/open.php");
                $limit = 4;
                $start = 0;
                if (isset($_GET["search"])) {
                    $search = $_GET["search"];
                    $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM baidang INNER JOIN theloai ON baidang.maTheLoai=theloai.maTheLoai INNER JOIN admin ON admin.maAdmin = baidang.maAdmin WHERE tenBaiDang LIKE '%$search%' ORDER BY maBaiDang DESC";
                } else {
                    $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM baidang INNER JOIN theloai ON baidang.maTheLoai=theloai.maTheLoai INNER JOIN admin ON admin.maAdmin = baidang.maAdmin ORDER BY maBaiDang DESC LIMIT $start,$limit";
                }
                $resultDemBaiViet = mysqli_query($con, $sqlDemBaiViet);
                $demBaiViet = mysqli_fetch_array($resultDemBaiViet);
                $tongSoBaiViet = $demBaiViet["tongBaiViet"];
                $soTrang = ceil($tongSoBaiViet / $limit);

                if (isset($_GET["trang"])) {
                    $trang = $_GET["trang"];
                    $start = ($trang - 1) * $limit;
                }
                if (isset($_GET["search"])) {
                    $search = $_GET["search"];
                    $sql = "SELECT * FROM baidang INNER JOIN theloai ON baidang.maTheLoai=theloai.maTheLoai INNER JOIN admin ON admin.maAdmin = baidang.maAdmin WHERE noiDung LIKE '%$search%'ORDER BY maBaiDang DESC LIMIT $start,$limit";
                } else {
                    $sql = "SELECT * FROM baidang INNER JOIN theloai ON baidang.maTheLoai=theloai.maTheLoai INNER JOIN admin ON admin.maAdmin = baidang.maAdmin ORDER BY maBaiDang DESC LIMIT $start,$limit";
                }
                $result = mysqli_query($con, $sql);
                include("../connect/close.php");
                $i = 0;
                ?>
                <form action="">
                    <input type="text" placeholder="Tìm kiếm" name="search"><button>Tìm</button><br>
                    Các tin tức mới nhất
                </form>
                <table border="1" align="center">
                    <tr>
                        <th>Người đăng</th>
                        <th>Thể loại</th>
                        <th>Tiêu đề</th>
                        <th>Ngày đăng</th>
                        <th>Hình ảnh</th>
                        <th>Nội dung</th>
                    </tr>
                    <?php
                    while ($bd = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $bd["tenAdmin"] ?></td>
                            <td><?php echo $bd["tenTheLoai"] ?></td>
                            <td><?php echo $bd["tenBaiDang"] ?></td>
                            <td><?php echo $bd["ngayDang"] ?></td>
                            <td><img src="../upload/<?php echo $bd["hinhAnh"] ?>" class="img3"></td>
                            <td><a href="chi-tiet-noi-dung.php?ma=<?php echo $bd["maBaiDang"] ?>">Xem chi tiết</a></td>
                            <td><a href="quan-ly-binh-luan.php?ma=<?php echo $bd["maBaiDang"] ?>">Bình luận</a></td>
                            <td><a href="chinh-sua-tin-tuc.php?ma=<?php echo $bd["maBaiDang"] ?>">Chỉnh sửa</a></td>
                            <?php
                            $bvv = $bd["maBaiDang"];
                            include("../connect/open.php");
                            $sqlbll = "SELECT * FROM `binhluan` WHERE maBaiViet = $bvv";
                            $resultbll = mysqli_query($con, $sqlbll);
                            $num1 = mysqli_num_rows($resultbll);
                            $sqltt = "SELECT * FROM thich WHERE maBaiViet = $bvv";
                            $resulttt = mysqli_query($con, $sqltt);
                            $num2 = mysqli_num_rows($resulttt);
                            include("../connect/close.php");
                            ?>
                            <?php if ($num1 == 0 && $num2 == 0) { ?>
                                <td><a href="xoa-tin-tuc.php?ma=<?php echo $bd["maBaiDang"] ?>" onclick="confirm('Bạn có chắc muốn xóa tin này ')">Xóa</a></td>
                            <?php } ?>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
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
<?php } else header("Location:dang-nhap-admin.php") ?>