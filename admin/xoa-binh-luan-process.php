<?php
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    $maBaiViet = $_GET["maBaiViet"];
    include("../connect/open.php");
    $sql = "DELETE FROM binhluan WHERE maBinhLuan = $ma";
    mysqli_query($con, $sql);
    include("../connect/closer");
    header("Location:quan-ly-binh-luan.php?ma=$maBaiViet");
} else header("Location:quan-ly-tin-tuc.php");
