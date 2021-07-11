<?php
if (isset($_POST["pass"]) && isset($_POST["ma"]) && isset($_POST["passCu"])) {
    $passCu = $_POST["passCu"];
    $pass = $_POST["pass"];
    $ma = $_POST["ma"];
    include("../connect/open.php");
    $sql1 = "SELECT * FROM user WHERE maUser=$ma";
    $result = mysqli_query($con, $sql1);
    $passs = mysqli_fetch_array($result);
    $rows = mysqli_num_rows($result);
    if ($passCu == $passs["password"]) {
        $sql = "UPDATE user SET password = '$pass' WHERE maUser = '$ma'";
        mysqli_query($con, $sql);
        header("Location:doi-mk.php?doi-thanh-cong");
    } else {
        header("Location:doi-mk.php?err");
    }
    include("../connect/close.php");
} else header("Location:doi-mk.php");
