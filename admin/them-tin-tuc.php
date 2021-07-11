<?php
session_start();
if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/them-tin-tuc.css">
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

            span {
                color: red;
            }
        </style>

    </head>

    <body>
        <div class="site-bar">
            <?php include("site-bar.php") ?>
        </div>
        <div class="main">
            <img src="css/5980.jpg_wh860.jpg" alt="">
            <?php
            include("../connect/open.php");
            $sql = "SELECT * FROM theloai";
            $result = mysqli_query($con, $sql);
            include("../connect/close.php");
            ?>
            <div class="form">
                <center>
                    <h2>Thêm tin tức</h2>
                </center>
                <form action="them-tin-tuc-process.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="admin" value="<?php echo $admin["maAdmin"] ?>">
                    <table align=" center">
                        <tr>
                            <td>Thể loại :</td>
                            <td><select name="theLoai" name="theLoai" id="theLoai">
                                    <option value="-1" disabled selected>Chọn</option>
                                    <?php while ($tl = mysqli_fetch_array($result)) { ?>

                                        <option value="<?php echo $tl["maTheLoai"] ?>"><?php echo $tl["tenTheLoai"] ?></option>
                                    <?php } ?>
                                </select></td>
                            <td><span id="errTheLoai"></span></td>
                        </tr>
                        <tr>
                            <td>Tiêu đề:</td>
                            <td><input type="text" id="tieuDe" name="tieuDe"></td>
                            <td><span id="errTieuDe"></span></td>
                        </tr>
                        <tr>
                            <td>Nội dung :</td>
                            <td><textarea name="noiDung" id="noi-dung" cols="30" rows="10"></textarea></td>
                            <td><span id="errNoiDung"></span></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh:</td>
                            <td><input type="file" name="anh" id="anh"></td>
                            <td><span id="errAnh"></span></td>
                        </tr>
                    </table>
                    <center><button onclick="return check()">Thêm</button></center>
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

            function check() {
                var theLoai = document.getElementById("theLoai").value;
                var tieuDe = document.getElementById("tieuDe").value;
                var noiDung = document.getElementById("noi-dung").value;
                var anh = document.getElementById("anh").value;
                var errTheLoai = document.getElementById("errTheLoai");
                var errTieuDe = document.getElementById("errTieuDe");
                var errNoiDung = document.getElementById("errNoiDung");
                var errAnh = document.getElementById("anh");
                var dem = 0;
                if (theLoai == -1) {
                    errTheLoai.innerHTML = "Bạn chưa chọn";
                } else {
                    errTheLoai.innerHTML = "";
                    dem++;
                }

                if (tieuDe === "") {
                    errTieuDe.innerHTML = "Bạn chưa nhập";
                } else {
                    errTieuDe.innerHTML = "";
                    dem++;
                }
                if (noiDung === "") {
                    errNoiDung.innerHTML = "Bạn chưa nhập";
                } else {
                    errNoiDung.innerHTML = "";
                    dem++;
                }
                if (dem == 3) {
                    return true;
                } else return false;
            }
        </script>
    </body>

    </html>
    <?php ?>
<?php } else header("Location:dang-nhap-admin.php") ?>