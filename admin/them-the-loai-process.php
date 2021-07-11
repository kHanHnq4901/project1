<?php
if (isset($_GET["ten"])) {
    $ten = $_GET["ten"];
    include("../connect/open.php");
    $sql1 = "SELECT * FROM theloai WHERE tenTheLoai LIKE '%$ten'";
    $result = mysqli_query($con, $sql1);
    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        $sql = "INSERT INTO theloai(tenTheLoai) VALUES ('$ten')";
        mysqli_query($con, $sql);
        header("Location: quan-ly-the-loai.php?thanh-cong");
    } else {
        header("Location: them-the-loai.php?err=$rows");
    }
    include("../connect/close.php");
} else header("Location: quan-ly-the-loai.php");
