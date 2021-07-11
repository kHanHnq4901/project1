<?php
include("../connect/open.php");
$sql =  "SELECT * FROM theloai";
$result = mysqli_query($con, $sql);
if (isset($user)) {
    $sqlus =  "SELECT * FROM user WHERE username='$user'";
    $resultus = mysqli_query($con, $sqlus);
    $us = mysqli_fetch_array($resultus);
}
include("../connect/close.php");
?>
<div id="thi">
    <div id="thi1">
        <a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlBixMDBti9KaaZ8lRJ6gi0EOmojX6Wn2rIw&usqp=CAU"></a>
        <ul id="thi4">
            <li><a href="trang-chu.php">Trang chủ</a></li>
            <?php
            while ($tl = mysqli_fetch_array($result)) {
            ?>
                <li>
                    <a href="trang-chu.php?maTheLoai=<?php echo $tl["maTheLoai"] ?>"><?php echo $tl["tenTheLoai"] ?></a>
                </li>
            <?php }
            if (isset($user)) { ?>
                <li><a>Xin Chào <?php echo $us["tenUser"] ?></a>
                    <ul class="con">
                        <li><a href="thong-tin-ca-nhan.php">Thông tin cá nhân</a>
                        <li><a href="sua-thong-tin.php"> Chỉnh sửa thông tin</a></li>
                        <li><a href="doi-mk.php">Đổi mật khẩu</a></li>
                    </ul>
                </li>
                <li><a href="dang-xuat.php">Đăng xuất</a></li>

            <?php } else { ?>
                <li><a href="dang-nhap.php">Đăng nhập</a></li>
                <li><a href="dang-ky.php">Đăng ký</a></li>
            <?php } ?>
        </ul>
        <div class="thi6"></div>
    </div>
</div>