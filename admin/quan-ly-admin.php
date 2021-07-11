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

            .main {
                background-repeat: no-repeat;
                position: relative;
                height: 700px;
                width: 100%;
                background-position: bottom right;
            }

            img {
                display: block;
                position: absolute;
                width: 100%;
                height: 700px;
            }

            #menu {
                background: #6d136a;
            }

            a {
                font-size: 20px;
            }

            .li {
                min-width: 100px;
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
                left: 0%;
            }

            h2 {
                color: green;
            }

            button:hover {
                background: green;
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
        </style>

    </head>

    <body>
        <div class="site-bar"><?php include("site-bar.php") ?>
            <?php include("../connect/open.php");
            include("../connect/open.php");
            $limit = 7;
            $start = 0;
            if (isset($_GET["search"])) {
                $search = $_GET["search"];
                $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM admin WHERE user LIKE '%$search%'";
            } else {
                $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM admin ";
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
                $sql = "SELECT * FROM admin WHERE user LIKE '%$search%' ORDER BY maAdmin DESC LIMIT $start,$limit";
            } else {
                $sql = "SELECT * FROM admin ORDER BY maAdmin DESC LIMIT $start,$limit";
            }
            $result = mysqli_query($con, $sql);
            include("../connect/close.php");
            $i = 0;
            ?>
        </div>
        <div class="main">
            <img src="css/5980.jpg_wh860.jpg" alt="">
            <div class="form">
                <center>
                    <h2>Quản lý Admin</h2>
                </center>
                <form action="quan-ly-admin.php">
                    <input type="text" placeholder="Tìm kiếm" name="search"><button>Tìm</button><br>
                    Các tài khoản mới nhất
                </form>
                <table border="1" align="center">
                    <tr>

                        <th>Họ và tên </th>
                        <th>Tài khoản </th>
                        <th>Ngày sinh </th>
                        <th>Email </th>
                        <th>Số điện thoại </th>
                        <th>Trạng thái </th>
                        <th>Quyền </th>
                    </tr>
                    <?php while ($adm = mysqli_fetch_array($result)) {
                    ?><tr>
                            <td><?php echo $adm["tenAdmin"] ?></td>
                            <td><?php echo $adm["user"] ?></td>
                            <td><?php echo $adm["ngaySinh"] ?></td>
                            <td><?php echo $adm["email"] ?></td>
                            <td><?php echo $adm["sdt"] ?></td>
                            <td><?php if ($adm["trangThai"] == 0) {
                                    echo "Hoạt động";
                                } else echo "Đã Khóa" ?></td>
                            <td><?php if ($adm["quyen"] == 0) {
                                    echo "Super admin";
                                } else echo "Admin"
                                ?></td>

                            <td>
                                <?php if ($adm["quyen"] == 1) {
                                    if ($adm['trangThai'] == 0) {
                                ?><a href='khoa-admin.php?ma=<?php echo $adm["maAdmin"] ?>' onclick="confirm('Bạn có chắc muốn khóa tài khoản này')">Khóa tài khoản</a>
                                    <?php } else { ?><a href='mo-khoa-admin.php?ma=<?php echo $adm["maAdmin"] ?>' onclick="confirm('Bạn có chắc muốn mở tài khoản này')">Mở khóa tài khoản</a><?php }
                                                                                                                                                                                        } else echo "" ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <center> <?php for ($j = 1; $j <= $soTrang; $j++) {
                            ?>
                        <a href="?trang=<?php echo $j; ?>"><?php echo $j; ?></a>
                    <?php
                            }
                    ?></center>
            </div>
        </div>
        <script>
            <?php if (isset($_GET["thanh-cong"])) { ?>
                alert("Bạn thêm thành công");
            <?php } ?>
        </script>
    </body>

    </html>
<?php } else header("Location:dang-nhap-admin.php") ?>