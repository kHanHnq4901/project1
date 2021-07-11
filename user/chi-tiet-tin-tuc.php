<?php
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    $maUser = $_SESSION["ma"];
}
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    include("../connect/open.php");
    $sql = "SELECT * FROM baidang WHERE maBaiDang=$ma";
    $result = mysqli_query($con, $sql);
    $bv = mysqli_fetch_array($result);
    include("../connect/close.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/trang-chu.css">
        <style>
            .img2 {
                width: 600px;
                height: 350px;
            }
        </style>
    </head>

    <body>
        <div class="tong">
            <div class="trai"></div>
            <div class="giua">
                <div class="header">
                    <?php include("header.php") ?>
                </div>
                <div class="main">
                    <font size="20px"><?php echo $bv["tenBaiDang"] ?></font><br>
                    Ngày đăng: <?php echo $bv["ngayDang"] ?>
                    <center><img class="img2" src="../upload/<?php echo $bv["hinhAnh"] ?>"></center>
                    <?php echo $bv["noiDung"] ?>
                    <hr>
                    <?php
                    include("../connect/open.php");
                    $sql = "SELECT * FROM binhluan inner join user ON binhluan.maUser=user.maUser WHERE maBaiViet = $ma";
                    $resultBinhLuan = mysqli_query($con, $sql);
                    include("../connect/close.php");
                    ?>
                    <?php
                    include("../connect/open.php");
                    $sqlSoLuongt = "SELECT COUNT(maThich) AS 'SoLuong' FROM thich WHERE maBaiViet = $ma";
                    $soLuongt = mysqli_query($con, $sqlSoLuongt);
                    $slt = mysqli_fetch_array($soLuongt);
                    if (isset($user)) {
                        $sqllike = "SELECT maThich,maBaiViet,maUser FROM thich WHERE maBaiViet=$ma AND maUser=$maUser";
                        $like = mysqli_query($con, $sqllike);
                        $roww = mysqli_num_rows($like);
                    }
                    include("../connect/close.php");

                    ?>
                    <?php echo $slt['SoLuong'] ?> Lượt thích <br>
                    <?php if (isset($user)) {
                        if ($roww == 0) { ?>
                            <form action="thich-process.php" method="GET">
                                <input type="hidden" name="maBD" value="<?php echo $bv["maBaiDang"] ?>">
                                <button>Thích</button>
                            </form>
                        <?php } else { ?>
                            <form action="bo-thich.php" method="GET">
                                <input type="hidden" name="maBD" value="<?php echo $bv["maBaiDang"] ?>">
                                <button>Bỏ thích</button>
                            <?php } ?>

                        <?php } ?>
                        <br>
                        Các bình luận mới nhất: <br>
                        <?php
                        while ($bl = mysqli_fetch_array($resultBinhLuan)) {
                            echo $bl["tenUser"]; ?>:
                        <?php echo $bl["noiDung"] ?><br>
                    <?php } ?>

                    <?php if (isset($user)) { ?>
                        <form action="binh-luan-process.php" method="GET">
                            <input type="hidden" name="maUser" value="<?php echo $ma ?>">
                            <input type="hidden" name="ma" value="<?php echo $bv["maBaiDang"] ?>">
                            Bình luận: </br>
                            <textarea name="noidung" id="" cols="70" rows="5" placeholder="Nhập ý kiến của bạn:"></textarea><br>
                            <button>Gửi bình luận</button>
                        </form>
                    <?php } ?>
                    <form action="trang-chu.php">
                        <button>Quay lại trang chủ</button>
                    </form>
                </div>
                <div class="footer">
                    <?php include("footer.php") ?></div>
            </div>
            <div class="trai"></div>
        </div>

    </body>

    </html>
<?php } else header("Location:trang-chu.php") ?>