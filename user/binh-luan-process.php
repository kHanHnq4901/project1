<?php
session_start();
$_SESSION["ma"];
?>
<?php
if (isset($_GET["ma"]) && isset($_GET["noidung"])) {
    $ma = $_GET["ma"];
    $noidung = $_GET["noidung"];
    $maUser = $_SESSION["ma"];
    include("../connect/open.php");
    $sql = "INSERT INTO binhluan (maBaiViet,maUser,noiDung) VALUES('$ma','$maUser','$noidung')";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location:chi-tiet-tin-tuc.php?ma=$ma");
} else {
    header("Location:chi-tiet-tin-tuc.php?ma=$ma");
}
