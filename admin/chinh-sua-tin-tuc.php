<?php
session_start();
if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
?>
    <?php if (isset($_GET["ma"])) {
        $ma = $_GET["ma"];
        include("../connect/open.php");
        $sql = "SELECT * FROM baidang WHERE maBaiDang = $ma";
        $result = mysqli_query($con, $sql);
        $bd = mysqli_fetch_array($result);
        include("../connect/close.php");
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <script src="jquery-3.1.1.min.js"></script>
            <script src="ckeditor/ckeditor.js"></script>
            <script src="ckfinder/ckfinder.js"></script>
            <style>
                .site-bar {
                    width: 20%;
                    height: 700px;
                    background-color: #009cd7;
                    color: white;
                }

                a {
                    text-decoration: none;
                    color: white;
                    font-size: 20px;
                }

                li {
                    list-style: none;
                    color: white;
                }

                .cha {
                    list-style: none;
                    min-height: 90px;
                }

                #menu {
                    background: #009cd7;
                }

                body {
                    padding: 0px;
                    margin: 0px;
                    font-family: tahoma;
                    display: flex;
                }

                .main {
                    background-repeat: no-repeat;
                    position: relative;
                    height: 700px;
                    width: 100%;
                    background-position: bottom right;
                }

                img {
                    display: block;
                    position: absolute;
                    width: 100%;
                    height: 700px;
                }

                .con {
                    display: none;
                }

                .cha:hover .con {
                    display: block;
                    background-color: pink;
                }

                .cha :hover li ca {
                    background-color: hotpink;
                }

                .form {
                    z-index: 1;
                    background-color: #fff;
                    width: auto;
                    height: auto;
                    border: 1px solid grey;
                    border-radius: 10px;
                    position: absolute;
                    top: 50px;
                    left: 15%;
                }

                h2 {
                    color: green;
                }

                button {
                    width: 180px;
                    height: 34px;
                    border-radius: 5px;
                    color: seashell;
                    background: orangered;
                    border: none;
                }

                input {
                    width: 200px;
                    height: 34px;
                    margin-bottom: 10px;
                    border-radius: 5px;
                    padding-left: 20px;
                }

                button:hover {
                    background: green;
                }

                .img3 {
                    width: 120px;
                    height: 60px;
                    left: 300px;
                    top: 444px;
                }
            </style>
        </head>

        <body>
            <div class="site-bar">
                <?php include("site-bar.php") ?>
            </div>
            <div class="main">
                <img src="css/5980.jpg_wh860.jpg" alt="">
                <div class="form">
                    <?php
                    include("../connect/open.php");
                    $sql = "SELECT * FROM theloai";
                    $result = mysqli_query($con, $sql);
                    include("../connect/close.php");
                    ?>
                    <center>
                        <h2>Chỉnh sửa tin tức</h2>
                    </center>
                    <form action="chinh-sua-tin-tuc-process.php" method="POST" enctype="multipart/form-data">
                        <table>
                            <input type="hidden" name="maBaiDang" value="<?php echo $bd["maBaiDang"] ?>">
                            <tr>
                                <td>Thể loại:</td>
                                <td><select name="theLoai" name="theLoai" id="theLoai">
                                        <?php while ($tl = mysqli_fetch_array($result)) { ?>
                                            <option value="<?php echo $tl["maTheLoai"] ?>" <?php
                                                                                            if ($tl["maTheLoai"] == $bd["maTheLoai"]) {
                                                                                                echo "selected";
                                                                                            } ?>>

                                                <?php echo $tl["tenTheLoai"] ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Tiêu đề:</td>
                                <td><input type="text" value="<?php echo $bd["tenBaiDang"] ?>" name="tenBaiDang"></td>
                            </tr>
                            <tr>
                                <td>Nội dung</td>
                                <td><textarea name="noi-dung" id="" cols="30" rows="10"><?php echo $bd["noiDung"] ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Hình ảnh:</td>
                                <td><input type="file" name="anh" values="../upload/<?php echo $bd["hinhAnh"] ?>"></td>
                                <td><img src="../upload/<?php echo $bd["hinhAnh"] ?>" class="img3"></td>
                            </tr>
                        </table>
                        <center><button>Sửa</button></center>
                    </form>
                </div>
            </div>
            <script>
                CKEDITOR.replace('noi-dung', {
                    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });
            </script>
        </body>

        </html>
<?php }
} else header("Location:trang-chu-admin.php") ?>