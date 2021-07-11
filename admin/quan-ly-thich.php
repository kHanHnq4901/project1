<?php
session_start();
if (isset($_SESSION["user"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <div class="site-bar">
            Xin Chào <?php echo $_SESSION["user"] ?>
            <a href="dang-xuat-admin.php">Đăng xuất</a>
            <?php include("site-bar.php") ?>
        </div>
        <div class="main">

        </div>
    </body>

    </html>
<?php } ?>