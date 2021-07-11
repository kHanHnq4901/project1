<?php
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/trang-chu.css">
    <style>
        .wrap {
            margin-left: 10px;
            margin: 0px;
            padding: 0px;
        }

        .nd {
            display: inline-flex;

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