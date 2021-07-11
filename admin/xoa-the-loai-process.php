<?php
if (isset($_POST["ma"])) {
    $ma = $_POST["ma"];
    include("../connect/open.php");
    $sql = "DELETE FROM theloai WHERE maTheLoai = '$ma'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: quan-ly-the-loai.php?xoa-thanh-cong");
} else header("Location: quan-ly-the-loai.php");
