<?php
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"]
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/trang-chu.css">
    </head>

    <body>
        <?php include("../connect/open.php");
        $sql = "SELECT * FROM `baidang` WHERE maTheLoai=$ma'";
        $result = mysqli_query($con, $sql);
        include("../connect/close.php");
        ?>
        <div class="tong">
            <div class="trai"></div>
            <div class="giua">
                <div class="header">
                    <?php include("header.php") ?>
                </div>
                <div class="main">
                    <form action="trang-chu.php">
                        <input type="text" placeholder="Tìm kiếm" name="search"><button>Tìm</button><br>
                        Các tin tức mới nhất
                    </form>
                    <div><?php include("noi-dung.php") ?></div>
                </div>
                <div class="footer">
                    <?php include("footer.php") ?></div>
            </div>
            <div class="trai"></div>
        </div>
    </body>

    </html>
<?php } ?>