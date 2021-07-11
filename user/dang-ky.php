<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/trang-chu.css">
    <style>
        .css-err {
            border: 1;
            color: red
        }

        .dang-ky {
            width: 500px;
            height: 300px;
            border: auto solid grey;
            border-radius: 10px;
            text-align: center;
        }

        .ip {
            width: 200px;
            height: 30px;
            margin-bottom: 10px;
            left: 100px
        }

        h3 {
            color: #868787;
            font-family: sans-serif;
            text-align: center;
        }

        input {
            border-radius: 5px;
            border: 1px solid grey;
        }

        button {
            width: 80px;
            height: 30px;
            margin-right: auto;
            background: red;
            border-radius: 5px;
            color: seashell;
        }

        .main {
            position: relative;
        }

        .login {
            z-index: 1;
            background-color: #fff;
            width: auto;
            height: auto;
            border: 1px solid grey;
            border-radius: 10px;
            position: absolute;
            top: 100px;
            left: 27%;
            background-color: pink
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

        h1 {
            color: green;
        }
    </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
    <div class="tong">
        <div class="trai"></div>
        <div class="giua">
            <div class="header">
                <?php include("header.php") ?>
            </div>
            <div class="main">

                <img src="css/5980.jpg_wh860.jpg" class="img2" alt="">
                <div class="login">
                    <center>
                        <form action="dang-ky-process.php" method="POST">
                            <table class="dang-ky">
                                <h1>
                                    <center>Đăng ký</center>
                                </h1>
                                <tr>
                                    <td>Tên đăng nhập:</td>
                                    <td><input type="text" id="user" name="user" class="ip"></td>
                                    <td class="err-user">
                                        <span id="err-user1" class="css-err"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu:</td>
                                    <td><input type="password" id="pass" name="pass" class="ip"></td>
                                    <td class="err-pass">
                                        <span id="err-pass" class="css-err"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Họ và tên:</td>
                                    <td><input type="text" id="ten" name="ten" class="ip"></td>
                                    <td class="err-ten">
                                        <span id="err-ten" class="css-err"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ngày sinh:</td>
                                    <td><input type="date" id="ngaySinh" name="ngaySinh" class="ip"></td>
                                    <td class="err-ngaySinh">
                                        <span id="err-ngaySinh" class="css-err"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Giới tính:</td>
                                    <td>Nam:<input type="radio" name="gioiTinh" value="1">
                                        Nữ:<input type="radio" name="gioiTinh" value="0">
                                    </td>
                                    <td class="err-gioiTinh">
                                        <span id="err-gioiTinh" class="css-err"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="text" id="email" name="email" class="ip"></td>
                                    <td class="err-email">
                                        <span id="err-email" class="css-err"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại:</td>
                                    <td><input type="text" id="sdt" name="sdt" class="ip"></td>
                                    <td class="err-sdt">
                                        <span id="err-sdt" class="css-err"></span>
                                    </td>
                                </tr>
                            </table>
                            <button onclick="return kiemtra()">Đăng ký</button><br>
                            <?php if (isset($_GET["trung"])) { ?>
                                <span>Đã có tài khoản này rồi</span>
                            <?php } ?>
                        </form>
                    </center>
                </div>
            </div>
            <div class="footer">
                <?php include("footer.php") ?>
            </div>
        </div>
        <div class="trai"></div>
    </div>


    </div>
</body>
<script>
    function kiemtra() {
        var dem = 0;
        var user = $('#user').val();
        var pass = $('#pass').val();
        var name = $('#ten').val();
        var date = $('#ngaySinh').val();
        var sex = document.getElementsByName("sex").values;
        var email = $('#email').val();
        var phone = $('#sdt').val();
        if (user == '') {
            $("#err-user1").text('Nhập tên người dùng');
        } else {
            $("#err-user1").text('');
            dem++;
        }

        if (pass == '') {
            $("#err-pass").text('Nhập mật khẩu');
        } else {
            $("#err-pass").text('');
            dem++;
        }
        if (name == '') {
            $("#err-ten").text('Nhập họ tên');
        } else {
            $("#err-ten").text('');
            dem++;
        }
        if (date == '') {
            $("#err-ngaySinh").text('Nhập ngày sinh');
        } else {
            $("#err-ngaySinh").text('');
            dem++;
        }
        if (sex == -1) {
            $("#err-gioiTinh").text('Chọn giới tính');
        } else {
            $("#err-gioiTinh").text('');

        }
        if (email == '') {
            $("#err-email").text('Nhập email');
        } else {
            $("#err-email").text('');
            dem++;
        }
        if (phone == '') {
            $("#err-sdt").text('Nhập số đt')
        } else {
            $("#err-sdt").text('');
            dem++;
        }
        if (dem == 6) {
            return true;
        }
        return false;
    }
</script>

</html>