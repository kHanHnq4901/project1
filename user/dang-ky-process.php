<?php
if (isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["ten"]) && isset($_POST["ngaySinh"]) && isset($_POST["gioiTinh"]) && isset($_POST["email"]) && isset($_POST["sdt"])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $ten = $_POST["ten"];
    $ngaySinh = $_POST["ngaySinh"];
    $gioiTinh = $_POST["gioiTinh"];
    $email = $_POST["email"];
    $sdt = $_POST["sdt"];
    include("../connect/open.php");
    $sqlUser = "SELECT * FROM user WHERE username = $user";
    $resultUser = mysqli_query($con, $sqlUser);
    $rowUser = mysqli_num_rows($resultUser);
    if ($rowUser != 0) {
        header("Location:dang-ky.php?trung");
    } else {
        $sql = "INSERT INTO user (tenUser, username, password, ngaySinh, gioiTinh, email, sdt, trangThai) VALUES ('$ten','$user','$pass','$ngaySinh',$gioiTinh,'$email','$sdt',0)";
        mysqli_query($con, $sql);
        header("location: trang-chu.php");
    }
    include("../connect/close.php");
} else {
    header("location:dang-nhap.php");
}
