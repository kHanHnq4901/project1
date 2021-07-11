<?php
if (isset($_POST["pass"]) && isset($_POST["ma"]) && isset($_POST["passCu"])) {
    $passCu = $_POST["passCu"];
    $pass = $_POST["pass"];
    $ma = $_POST["ma"];
    include("../connect/open.php");
    $sql1 = "SELECT * FROM admin WHERE maAdmin=$ma";
    $result = mysqli_query($con, $sql1);
    $passs = mysqli_fetch_array($result);
    $rows = mysqli_num_rows($result);
    if ($passCu == $passs["pass"]) {
        $sql = "UPDATE admin SET pass= '$pass' WHERE maAdmin = '$ma'";
        mysqli_query($con, $sql);
        header("Location:doi-mat-khau.php?doi-thanh-cong");
    } else {
        header("Location:doi-mat-khau.php?err");
    }
    include("../connect/close.php");
} else header("Location:doi-mat-khau.php");
