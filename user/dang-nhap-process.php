<?php
session_start();
if (isset($_POST["user"]) && isset($_POST["pass"])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    include("../connect/open.php");
    $sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
    $result = mysqli_query($con, $sql);
    $ma = mysqli_fetch_array($result);
    $quyen = $ma["trangThai"];
    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        header("Location:dang-nhap.php?err=$rows");
    } else if ($quyen == 1) {
        header("Location:dang-nhap.php?errr=1");
    } else {
        $_SESSION["user"] = $user;
        $_SESSION["ma"] = $ma["maUser"];
        if (isset($_POST["check"])) {
            setcookie("user", $user, time() + 84600);
            setcookie("pass", $pass, time() + 84600);
        } else {
            setcookie("user", $user, time() - 1);
            setcookie("pass", $pass, time() - 1);
        }
        header("Location:trang-chu.php");
    }
    include("../connect/close.php");
}
