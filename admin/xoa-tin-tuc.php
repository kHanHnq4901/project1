<?php
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    include("../connect/open.php");
    $sql = "DELETE FROM baidang WHERE maBaiDang = $ma";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location:quan-ly-tin-tuc.php");
} else header("Location:quan-ly-tin-tuc.php");
