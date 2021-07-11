<?php
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    echo $ma;
    include("../connect/open.php");
    $sql = "UPDATE user SET trangThai='0' WHERE maUser=$ma";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: quan-ly-nguoi-dung.php");
} else header("Location: quan-ly-nguoi-dung.php");
