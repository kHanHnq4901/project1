<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.form.css">
</head>

<body>

    <form action="dangky_process.php" method="POST" class="form" id="form-1">
        <h3 class="heading">đăng ký</h3>
        <div class="spacer"></div>
        <div class="form-group">
            <label for="fullname" class="form-label">Tên đăng nhập</label>
            <input id="fullname" name="fullname" type="text" placeholder="tên đăng nhập" class="form-control">
            <span id="err-fullname" class="error"></span>
            <label for="password" class="form-label">Mật khẩu</label>
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <span id="err-password" class="error"></span>
            <label for="password_re" class="form-label">Nhập lại mật khẩu</label>
            <input id="password_re" name="password_re" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
            <span id="err-password_re" class="error"></span>
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="text" placeholder="email" class="form-control">
        </div>
</body>

</html>