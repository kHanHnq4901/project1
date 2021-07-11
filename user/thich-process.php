<?php
session_start();
if (isset($_GET["maBD"]) && isset($_SESSION["ma"])) {
    $maUser = $_SESSION["ma"];
    $maBD = $_GET["maBD"];
    include("../connect/open.php");
    $sql = "INSERT INTO thich(maBaiViet,maUser) VALUES ('$maBD','$maUser')";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location:chi-tiet-tin-tuc.php?ma=$maBD");
} else header("Location:trang-chu.php");
