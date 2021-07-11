<?php
if (isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["ten"])  && isset($_POST["ngaySinh"])  && isset($_POST["email"])  && isset($_POST["sdt"])  && isset($_POST["quyen"])) {;
    $user = $_POST["user"];
    $pass = md5($_POST["pass"]);
    $ten = $_POST["ten"];
    $ngaySinh = $_POST["ngaySinh"];
    $email = $_POST["email"];
    $sdt = $_POST["sdt"];
    $quyen = $_POST["quyen"];
    include("../connect/open.php");
    $sqlUser = "SELECT * FROM admin WHERE user LIKE '%$user%'";
    $sqlEmail = "SELECT * FROM admin WHERE email LIKE '%$email%'";
    $sqlSdt = "SELECT * FROM admin WHERE sdt LIKE '%$sdt%'";
    $resultUser = mysqli_query($con, $sqlUser);
    $resultEmail = mysqli_query($con, $sqlEmail);
    $resultSdt = mysqli_query($con, $sqlSdt);
    $rowUser = mysqli_num_rows($resultUser);
    $rowEmail = mysqli_num_rows($resultEmail);
    $rowSdt = mysqli_num_rows($resultSdt);
    if ($rowUser == 1) {
        header("Location: them-admin.php?errUser");
    } else if ($rowEmail == 1) {
        header("Location: them-admin.php?errEmail");
    } else if ($rowSdt == 1) {
        header("Location: them-admin.php?errSdt");
    } else {
        $sql = "INSERT INTO admin(tenAdmin,user,pass,ngaySinh,email,sdt,quyen) VALUES ('$ten','$user','$pass','$ngaySinh','$email','$sdt','$quyen')";
        mysqli_query($con, $sql);
        header("Location:quan-ly-admin.php?thanh-cong=1");
    }
    include("../connect/close.php");
} else header("Location:them-admin.php");
