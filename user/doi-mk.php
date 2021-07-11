<?php
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    $ma = $_SESSION["ma"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/trang-chu.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="tong">
        <div class="trai"></div>
        <div class="giua">
            <div class="header">
                <?php include("header.php") ?>
            </div>
            <div class="main">
                <div class="login">
                    <form action="doi-mk-process.php" method="POST">
                        <h1>
                            <center> Đổi mật khẩu</center>
                        </h1>
                        <table align="center">
                            <input type="hidden" name="ma" value="<?php echo $ma ?>">
                            <tr>
                                <td> Nhập mật khẩu hiện tại: </td>
                                <td> <input type="password" id="pass" name="passCu" class="ip"> <br></td>
                                <td><span id="errPass"></span></t </tr> <tr>
                                <td> Nhập mật khẩu mới:</td>
                                <td> <input type="password" id="pass2" name="pass" class="ip"> <br></td>
                                <td><span id="errPass2"></span></td>
                            </tr>
                            <tr>
                                <td>Nhập lại mật khẩu mới: </td>
                                <td><input type="password" id="pass3" class="ip"><br></td>
                                <td><span id="errPass3"></span></td>
                            </tr>
                        </table>
                        <?php if (isset($_GET["err"])) {
                            echo "<center><font color = 'red'>Bạn nhập sai mật khẩu</font></center><br>";
                        } ?>
                        <center> <Button onclick="return check()">Đổi mật khẩu</Button></center>
                    </form>
                </div>
            </div>
            <div class="footer">
                <?php include("footer.php") ?></div>
        </div>
        <div class="trai"></div>
    </div>
    <script>
        <?php if (isset($_GET["doi-thanh-cong"])) { ?>
            alert("Bạn đổi thành công");
        <?php } ?>
    </script>
</body>

</html>