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
        <link rel="stylesheet" href="css/them-admin.css">
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

            span {
                color: red;
            }
        </style>

    </head>

    <body>
        <div class="site-bar">
            <?php
            include("site-bar.php");
            ?>
        </div>
        <div class="main">
            <img src="css/5980.jpg_wh860.jpg" alt="">
            <div class="form">
                <form action="them-admin-process.php?" method="post">
                    <center>
                        <h2>Thêm admin</h2>
                    </center>
                    <table>
                        <tr>
                            <td>Tài khoản:</td>
                            <td><input type="text" id="user" name="user" class="input"></td>
                            <td><span id="errUser" class="err"></span></td>
                        </tr>
                        <tr>
                            <td>Mật khẩu:</td>
                            <td><input type="password" id="pass" name="pass" class="input"></td>
                            <td><span id="errPass" class="err"></span></td>
                        </tr>
                        <tr>
                            <td>Nhập lại mật khẩu:</td>
                            <td><input type="password" id="pass2" class="input"></td>
                            <td><span id="errPass2" class="err"></span></td>
                        </tr>
                        <tr>
                            <td>Họ và tên:</td>
                            <td><input type="text" id="ten" name="ten" class="input"></td>
                            <td><span id="errTen" class="err"></span></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh:</td>
                            <td><input type="date" id="ngaySinh" name="ngaySinh" class="input"></td>
                            <td><span id="errNgaySinh" class="css-err"></span></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" id="email" name="email" class="input"></td>
                            <td><span id="errEmail" class="err"></span></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:</td>
                            <td><input type="text" id="sdt" name="sdt" class="input"></td>
                            <td><span id="errSdt" class="err"></span></td>
                        </tr>
                        <tr>
                            <td>Quyền: </td>
                            <td><input type="radio" name="quyen" value="0">Super Admin
                                <input type="radio" name="quyen" value="1">Admin
                            </td>
                            <td><span id="errQuyen" class="err"></span></td>
                        </tr>
                    </table>
                    <?php if (isset($_GET["errUser"])) echo ("<center><font color ='red'>Đã có tài khoản này rôi!</font></center><br>") ?>
                    <?php if (isset($_GET["errEmail"])) echo ("<center><font color ='red'>Đã có Email này rôi!</font></center><br>") ?>
                    <?php if (isset($_GET["errSdt"])) echo ("<center><font color ='red'>Đã có số điện thoại này rôi!</font></center><br>") ?>
                    <center><button onclick="return check()">Thêm</button></center>
                </form>
            </div>
        </div>
        <script>
            function check() {
                var user = document.getElementById("user").value;
                var pass = document.getElementById("pass").value;
                var pass2 = document.getElementById("pass2").value;
                var ten = document.getElementById("ten").value;
                var ngaySinh = document.getElementById("ngaySinh").value;
                var email = document.getElementById("email").value;
                var sdt = document.getElementById("sdt").value;
                var quyen = document.getElementsByName("quyen");
                var demQuyen = 0;
                for (var i = 0; i < quyen.length; i++) {
                    if (quyen[i].checked) {
                        demQuyen++;
                    }
                };
                var errUser = document.getElementById("errUser");
                var errPass = document.getElementById("errPass");
                var errPass2 = document.getElementById("errPass2");
                var errTen = document.getElementById("errTen");
                var errNgaySinh = document.getElementById("errNgaySinh");
                var errEmail = document.getElementById("errEmail");
                var errSdt = document.getElementById("errSdt");
                var errQuyen = document.getElementById("errQuyen");
                var dem = 0;

                if (user == "") {
                    errUser.innerHTML = "Chưa nhập";
                } else {
                    errUser.innerHTML = "";
                    dem++;
                }

                if (pass == "") {
                    errPass.innerHTML = "Chưa nhập";
                } else {
                    errPass.innerHTML = "";
                    dem++;
                }

                if (pass2 == "") {
                    errPass2.innerHTML = "Chưa nhập";
                } else if (pass2 !== pass) {
                    errPass2.innerHTML = "phải nhập giống mật khẩu trên"
                } else {
                    errPass2.innerHTML = "";
                    dem++;
                }

                if (ten == "") {
                    errTen.innerHTML = "Chưa nhập";
                } else {
                    errTen.innerHTML = "";
                    dem++;
                }

                if (ngaySinh == "") {
                    errNgaySinh.innerHTML = "Chưa nhập";
                } else {
                    errNgaySinh.innerHTML = "";
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

                if (demQuyen === 0) {
                    errQuyen.innerHTML = "Chưa chọn";

                } else {
                    errQuyen.innerHTML = "";
                    dem++;
                }
                if (dem == 8) {
                    return true;
                } else return false;
            }
        </script>
    </body>

    </html>
<?php } else header("Location:dang-nhap-admin.php") ?>