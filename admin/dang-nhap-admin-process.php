<?php
session_start();
if (isset($_POST["user"]) && isset($_POST["pass"])) {
    include("../connect/open.php");
    $user = mysqli_real_escape_string($con,$_POST["user"]);
    $pass = mysqli_real_escape_string($con,$_POST["pass"]);
    
    $hashPass = md5($pass);

    $sql = "SELECT * FROM admin WHERE user = '$user' AND pass = '$hashPass'";
    $result = mysqli_query($con, $sql);
    $admin = mysqli_fetch_array($result);
    $ma = $admin["maAdmin"];
    $quyen = $admin["quyen"];
    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        header("Location:dang-nhap-admin.php?err=$row");
    } else if ($admin["quyen"] == 1) {
        header("Location:dang-nhap-admin.php?errr=1");
    } else {
        if (isset($_POST["check"])) {
            setcookie("user", $user, time() + 84600);
            setcookie("pass", $pass, time() + 84600);
        } else {
            setcookie("user", $user, time() - 1);
            setcookie("pass", $pass, time() - 1);
        }
        header("Location:trang-chu-admin.php");
        $_SESSION["admin"] = $admin;
    }
    include("../connect/close.php");
}
