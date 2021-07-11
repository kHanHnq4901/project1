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
    <title>thông tin cá nhân</title>
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
                    <?php
                    include("../connect/open.php");
                    $sql = "SELECT * FROM user WHERE maUser = $ma";
                    $result = mysqli_query($con, $sql);
                    $tt = mysqli_fetch_array($result);
                    include("../connect/close.php");
                    ?>

                    <form action="trang-chu.php" method="post">
                        <input type="hidden" name="maUser" value="<?php echo $user["maUser"] ?>">
                        <table align="center">
                            <h1>
                                <center>Thông tin cá nhân</center>
                            </h1>
                            <tr>
                                <td> Họ và tên</td>
                                <td><input type="text" id="ttname" name="tenUser" class="ip" value="<?php echo $tt["tenUser"] ?>"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ email</td>
                                <td><input type="text" id="ttname" name="email" class="ip" value="<?php echo $tt["email"] ?>"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="text" id="ttname" name="sdt" class="ip" value="<?php echo $tt["sdt"] ?>"></td>
                            </tr>
                            <tr>
                                <td>Giới tính</td>
                                <td> <input type="radio" name="gioiTinh" id="ttt" value="1" <?php if ($tt["gioiTinh"] == 1) {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                            } ?>>Nam
                                    <input type="radio" name="gioiTinh" id="ttt" value="0" <?php if ($tt["gioiTinh"] == 0) {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            } ?>>Nữ</td>
                            </tr>
                        </table>
                        <center><button>Quay lại trang chủ</button> </center>
                    </form>
                </div>
            </div>
            <div class="footer">
                <?php include("footer.php") ?>
            </div>
        </div>
        <div class="trai"></div>
    </div>


</body>

</html>