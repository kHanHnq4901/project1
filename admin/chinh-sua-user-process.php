<?php
if (
    isset($_GET["ma"]) && isset($_GET["ten"]) && isset($_GET["ngaySinh"]) && isset($_GET["email"]) && isset($_GET["sdt"])
) {
    $ma = $_GET["ma"];
    $ten = $_GET["ten"];
    $ngaySinh = $_GET["ngaySinh"];
    $email = $_GET["email"];
    $sdt = $_GET["sdt"];
    include("../connect/open.php");
    $sql = "UPDATE user SET tenUser='$ten',ngaySinh='$ngaySinh',email='$email',sdt='$sdt' WHERE maUser=$ma";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location:chinh-sua-user.php?sua-thanh-cong");
} else {
    header("Location:chinh-sua-user.php");
}
