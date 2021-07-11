<?php
var_dump(isset($_POST["maUser"]), isset($_POST["tenUser"]), isset($_POST["email"]), isset($_POST["sdt"]), isset($_POST["gioiTinh"]));
if (isset($_POST["maUser"]) && isset($_POST["tenUser"]) && isset($_POST["email"]) && isset($_POST["sdt"]) && isset($_POST["gioiTinh"])) {
    include("../connect/open.php");
    $maUser = $_POST["maUser"];
    $tenUser = $_POST["tenUser"];
    $email = $_POST["email"];
    $sdt = $_POST["sdt"];
    $gioiTinh = $_POST["gioiTinh"];
    $sql = "UPDATE user SET tenUser = '$tenUser', email = '$email', sdt = '$sdt', gioiTinh = '$gioiTinh' WHERE maUser = $maUser";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    session_start();
    $_SESSION["tenUser"] = $tenUser;
    $_SESSION["gioiTinh"] = $gioiTinh;
    $_SESSION["email"] = $email;
    $_SESSION["sdt"] = $sdt;
    header("location:sua-thong-tin.php?thanh-cong");
} else {
    header("location:sua-thong-tin.php");
}
