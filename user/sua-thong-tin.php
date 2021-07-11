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
            <div class="header"><?php include("header.php") ?></div>
            <div class="main">
                <div class="form">
                    <?php
                    include("../connect/open.php");
                    $sql = "SELECT * FROM user WHERE maUser = $ma";
                    $result = mysqli_query($con, $sql);
                    $tt = mysqli_fetch_array($result);
                    include("../connect/close.php");
                    ?>
                    <div class="login">
                        <form action="sua-thong-tin-process.php" method="POST">
                            <table align="center">
                                <h1 align="center">Sửa thông tin cá nhân</h1><br>
                                <td><input type="hidden" name="maUser" class="ip" value="<?php echo $tt["maUser"] ?>"></td>
                                <tr>
                                    <td>Họ và tên</td>
                                    <td><input type="text" id="name" name="tenUser" class="ip" value="<?php echo $tt["tenUser"] ?>"></td>
                                    <td><span id="errName"></span></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ email</td>
                                    <td><input type="text" id="email" class="ip" name="email" value="<?php echo $tt["email"] ?>"><br></td>
                                    <td><span id="errEmail"></span></td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><input type="text" id="sdt" name="sdt" class="ip" value="<?php echo $tt["sdt"] ?>"></td>
                                    <td><span id="errSdt"></span></td>
                                </tr>
                                <tr>
                                    <td>Giới tính</td>
                                    <td><input type="radio" name="gioiTinh" id="ttt" value="1" <?php if ($tt["gioiTinh"] == 1) {
                                                                                                    echo 'checked';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                } ?>>Nam
                                        <input type="radio" name="gioiTinh" id="ttt" value="0" <?php if ($tt["gioiTinh"] == 0) {
                                                                                                    echo 'checked';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                } ?>>Nữ</td>
                                    <td><span id="errGioiTinh"></span></td>
                                </tr>
                            </table>
                            <center><button onclick="return check()">Cập nhật</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="trai"></div>
    </div>
    <div class="footer">
        <?php include("footer.php") ?>
    </div>
    <script>
        <?php if (isset($_GET["thanh-cong"])) { ?>
            alert("Bạn đã sửa thành công");
        <?php } ?>

        function check() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var sdt = document.getElementById("sdt").value;
            var gioiTinh = document.getElementsByName("gioiTinh");
            var dem = 0;
            var demGioiTinh = 0;
            for (var i = 0; i < gioiTinh.length; i++) {
                if (gioiTinh[i].checked) {
                    demGioiTinh++;
                }
            };
            var errName = document.getElementById("errName");
            var errEmail = document.getElementById("errEmail");
            var errSdt = document.getElementById("errSdt");
            var errGioiTinh = document.getElementById("errGioiTinh");

            if (name == "") {
                errName.innerHTML = "Chưa nhập";
            } else {
                errName.innerHTML = "";
                dem++;
            }

            if (email == "") {
                errEmail.innerHTML = "Chưa nhập";
            } else {
                errEmail.innerHTML = "";
                dem++;
            }

            if (sdt == "") {
                errSdt.innerHTML = "Chưa nhập";
            } else {
                errSdt.innerHTML = "";
                dem++;
            }
            
            if (demGioiTinh === 0) {
                errGioiTinh.innerHTML = "Chưa chọn";

            } else {
                errGioiTinh.innerHTML = "";
                dem++;
            }
            if (dem == 4) {
                return true;
            } else return false;
        }
    </script>
</body>

</html>