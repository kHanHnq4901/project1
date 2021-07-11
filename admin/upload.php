<?php
if (isset($_FILES["image"])) {
    //B1: Lấy ảnh về
    $image = $_FILES["image"];
    print_r($image);
    //B2: Tạo folder và lấy đường dẫn về
    $folder = "../upload/";
    //B3: Lấy tên về
    $imageName = $image["name"];
    //B4: Tạo đường dẫn
    $direction = $folder . $imageName;
    echo $direction;
    //B5: Di chuyển từ tmp_file đến file upload
    move_uploaded_file($image["tmp_name"], $direction);
    //B6: Lưu trữ vào DB
    include("../connect/open.php");
    $sql = "INSERT INTO nguoi_dung(anh) values('$direction')";
    mysqli_query($con, $sql);
    include("../connect/close.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Upload File</h1>
    <!-- sử dụng enctype -->
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <button>upload</button>
    </form>
    <img src="<?php echo $direction; ?>" alt="">
</body>

</html>