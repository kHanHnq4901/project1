<?php
if (isset($_FILES["anh"]) && isset($_POST["admin"]) && isset($_POST["theLoai"]) && isset($_POST["tieuDe"]) && isset($_POST["noiDung"])) {
    $admin = $_POST["admin"];
    $theLoai = $_POST["theLoai"];
    $tenBaiDang = $POST["noiDung"];
    $tieuDe = $_POST["tieuDe"];
    $noiDung = $_POST["noiDung"];
    //B1: Lấy ảnh về
    $image = $_FILES["anh"];
    //B2: Tạo folder và lấy đường dẫn về
    $folder = "../upload/";
    //B3: Lấy tên về
    $imageName = $image["name"];
    //B4: Tạo đường dẫn
    $direction = $folder . $imageName;
    //B5: Di chuyển từ tmp_file đến file upload
    move_uploaded_file($image["tmp_name"], $direction);
    //B6: Lưu trữ vào DB
    $ngayDang = Date("Y-m-d");
    include("../connect/open.php");
    $sql = "INSERT INTO baidang(maAdmin,maTheLoai,tenBaiDang,noiDung,ngayDang,hinhAnh) VALUES ($admin,$theLoai,'$tieuDe','$noiDung','$ngayDang','$direction')";
    mysqli_query($con, $sql);
    echo $direction;
    include("../connect/close.php");
    header("Location:quan-ly-tin-tuc.php");
} else header("Location:them-tin-tuc.php");
