<?php

session_start();
if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
    if (isset($_POST["ma"])) {
        $ma = $_POST["ma"];
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="css/sua-the-loai.css">
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
            <?php
            include("../connect/open.php");
            $sql = "SELECT* FROM theloai where maTheLoai = $ma";
            $result = mysqli_query($con, $sql);
            include("../connect/close.php");
            $tl = mysqli_fetch_array($result)
            ?>
            <div class="site-bar"><?php include("site-bar.php") ?></div>
            <div class="main">
                <img src="css/5980.jpg_wh860.jpg" alt="">
                <div class="form">
                    <center>
                        <h2>Sửa thể loại</h2>
                    </center>
                    <form action="sua-the-loai-process.php" method="POST">
                        <input type="hidden" value="<?php echo $tl["maTheLoai"] ?>" name="ma">
                        <input type="text" value="<?php echo $tl["tenTheLoai"] ?>" name="ten">
                        <button>
                            Sửa
                        </button>
                </div>
            </div>
        </body>

        </html>

<?php }
} else header("Location:dang-nhap-admin.php") ?>