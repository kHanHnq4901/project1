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
        <link rel="stylesheet" href="css/admin.css">
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
            <?php include("site-bar.php") ?></div>
        <div class="main">
            <img src="css/5980.jpg_wh860.jpg" alt="">
        </div>
    </body>

    </html>
<?php } else header("Location:dang-nhap-admin.php") ?>