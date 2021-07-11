<?php
session_start();
if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
}
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
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
                min-height: 120px;

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
        </style>
    </head>

    <body>
        <div class="site-bar">
            <?php include("site-bar.php") ?>
        </div>
        <div class="main">
            <img src="css/5980.jpg_wh860.jpg" class="img2" alt="">
            <div class="form">
                <?php include("../connect/open.php");
                $sql = "SELECT * FROM baidang WHERE maBaiDang=$ma";
                $result = mysqli_query($con, $sql);
                $bd = mysqli_fetch_array($result);
                include("../connect/close.php");
                ?>
                <font size="100px"><?php echo $bd["tenBaiDang"] ?></font>
                <center><img src="../upload/<?php echo $bd["hinhAnh"] ?>" alt=""></center>
                <?php echo $bd["noiDung"] ?>

                <a href="Quan-ly-tin-tuc.php">Quay lại</a>
                <a href=" chinh-sua-tin-tuc.php?ma=<?php echo $bd["maBaiDang"] ?>">Chỉnh sửa</a>
            </div>
        </div>
    </body>

    </html>
    </body>

    </html>
<?php } else header("Location:quan-ly-tin-tuc.php"); ?>