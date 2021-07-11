<?php
if (isset($_FILES["anh"]) && isset($_POST["maBaiDang"]) && isset($_POST["theLoai"]) 
&& isset($_POST["tenBaiDang"]) && isset($_POST["noi-dung"])) {
    $maBaiDang = $_POST["maBaiDang"];
    $theLoai = $_POST["theLoai"];
    $tenBaiDang = $_POST["tenBaiDang"];
    $noiDung = $_POST["noi-dung"];
    $image = $_FILES["anh"];
    $folder = "../upload/";
    $imageName = $image["name"];
    $direction = $folder . $imageName;
    move_uploaded_file($image["tmp_name"], $direction);
    include("../connect/open.php");
    $sql = "UPDATE baidang SET maTheLoai=$theLoai,tenBaiDang='$tenBaiDang',
    noiDung='$noiDung',hinhAnh='$direction' WHERE maBaiDang='$maBaiDang'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location:chinh-sua-tin-tuc.php?ma=$maBaiDang");
} else {
    header("Location:quan-ly-tin-tuc.php");
}
