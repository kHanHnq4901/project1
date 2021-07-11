<?php
if (isset($_POST["ma"]) && isset($_POST["ten"])) {
    $ma = $_POST["ma"];
    $ten = $_POST["ten"];
    include("../connect/open.php");

    $sql = "UPDATE theloai SET tenTheLoai='$ten' WHERE maTheLoai = $ma";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: quan-ly-the-loai.php?sua-thanh-cong");
} else header("Location: quan-ly-the-loai.php");
