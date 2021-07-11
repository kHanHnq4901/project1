<?php
session_start();
if (isset($_SESSION["admin"])) {
    header("Location:trang-chu-admin.php");
} else {
    $check = false;
    if (isset($_COOKIE["user"])) {
        $user1 = $_COOKIE["user"];
        $pass = $_COOKIE["pass"];
        $check = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .login {
            width: 300px;
            height: 300px;
            border: 1px solid grey;
            border-radius: 10px;
            text-align: center;
            margin-left: 500px;
            margin-top: 180px;
        }

        .ip {
            width: 200px;
            height: 30px;
            margin-bottom: 10px;
            left: 100px;
        }

        form table tr td button {
            width: 200px;
            height: 40px;
            margin-bottom: 10px;
            background-color: g;
        }

        button:hover {
            font-size: 15px;
        }

        span {
            color: red;
        }

        h2 {
            color: green;
        }
    </style>

</head>

<body>
    <div class="login">
        <h1>Đăng nhập</h1>
        <form action="dang-nhap-admin-process.php" method="post">
            <table align="center">
                <tr>
                    <td><input type="text" name="user" class="ip" placeholder="tài khoản" id="user" value="<?php if ($check) {
                                                                                                                echo $user1;
                                                                                                            } ?>"></td>
                </tr>
                <tr>
                    <td><span id="errUser"></span></td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" class="ip" placeholder="mật khẩu" value="<?php if ($check) {
                                                                                                        echo $pass;
                                                                                                    } ?>"></td>
                </tr>
                <tr>
                    <td><span id="errPass"></span></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="check" <?php if ($check) {
                                                                echo "checked";
                                                            } ?>> Ghi nhớ</td>
                </tr>
                <tr>
                    <td><button onclick="return login()">Đăng nhập</button></td>
                </tr>
                <tr>
                    <td><span><?php if (isset($_GET["err"])) {
                                    echo "<font color=red>Bạn nhập sai tài khoản hoặc mật khẩu</font>";
                                } else if (isset($_GET["errr"])) {
                                    echo "<font color=red>Tài khoản của bạn đã bị khóa</font>";
                                } else {
                                    echo "";
                                } ?></span></td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        function login() {
            var user = document.getElementById("user").value;
            var pass = document.getElementById("pass").value;
            var errUser = document.getElementById("errUser");
            var errPass = document.getElementById("errPass");
            if (user == "") {
                errUser.innerHTML = "Bạn chưa nhập tài khoản";
                return false;
            } else {
                errUser.innerHTML = "";
            }
            if (pass == "") {
                errPass.innerHTML = "Bạn chưa nhập mật khẩu";
                return false;
            } else {
                errPass.innerHTML = "";
            }
            if (user == !"" && pass == !"") {
                errUser.innerHTML = "";
                errPass.innerHTML = "";
                return true;
            }
        }
    </script>
</body>

</html>