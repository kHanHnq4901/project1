Xin Chào <?php echo $admin["tenAdmin"] ?>
<ul id="menu">
    <li class="cha"><a href="trang-chu-admin.php">Trang chủ</a></li>
    <li class="cha"><a href="chinh-sua-thong-tin.php">Thông tin cá nhân</a>
        <ul class="con">
            <li><a href="doi-mat-khau.php">Đổi mật khẩu</a></li>
        </ul>
    </li>
    <li class="cha"><a href="quan-ly-the-loai.php">Quản lý thể loại</a>
        <ul class="con">
            <li><a href="them-the-loai.php">Thêm thể loại</a></li>
        </ul>
    </li>
    <li class="cha"><a href="quan-ly-tin-tuc.php">Quản lý bài viết</a>
        <ul class="con">
            <li><a href="them-tin-tuc.php">Thêm tin tức</a></li>
        </ul>
    </li>
    <li class="cha"><a href="quan-ly-nguoi-dung.php">Quản lý người dùng</a></li>
    <?php if ($admin["quyen"] == 0) {
    ?><li class="cha"><a href="quan-ly-admin.php">Quản lý admin</a>
            <ul class="con">
                <li><a href="them-admin.php">Thêm admin</a></li>
            </ul>
        <?php } else echo "" ?>
        <li class="cha"><a href="dang-xuat-admin.php">Đăng xuất</a></li>
</ul>