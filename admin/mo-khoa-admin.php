<?php
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    echo $ma;
    include("../connect/open.php");
    $sql = "UPDATE admin SET trangThai='0' WHERE maAdmin=$ma";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: quan-ly-admin.php");
} else header("Location: quan-ly-admin.php");
