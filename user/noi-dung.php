  <?php
  include("../connect/open.php");
  $limit = 4;
  $start = 0;
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM baidang WHERE noiDung LIKE '%$search%' ORDER BY maBaiDang DESC";
  } else if (isset($_GET["maTheLoai"])) {
    $maTheLoai = $_GET["maTheLoai"];
    $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM baidang WHERE maTheLoai=$maTheLoai ORDER BY maBaiDang DESC ";
  } else {
    $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM baidang INNER JOIN theloai ON baidang.maTheLoai=theloai.maTheLoai INNER JOIN admin ON admin.maAdmin = baidang.maAdmin ORDER BY maBaiDang DESC LIMIT $start,$limit";
  }
  $resultDemBaiViet = mysqli_query($con, $sqlDemBaiViet);
  $demBaiViet = mysqli_fetch_array($resultDemBaiViet);
  $tongSoBaiViet = $demBaiViet["tongBaiViet"];
  $soTrang = ceil($tongSoBaiViet / $limit);
  if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    $start = ($trang - 1) * $limit;
  }
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $sql = "SELECT * FROM baidang WHERE noiDung LIKE '%$search%'ORDER BY maBaiDang DESC LIMIT $start,$limit";
  } else if (isset($_GET["maTheLoai"])) {
    $maTheLoai = $_GET["maTheLoai"];
    $sql = "SELECT * FROM baidang WHERE maTheLoai=$maTheLoai ORDER BY maBaiDang DESC";
  } else {
    $sql = "SELECT * FROM baidang INNER JOIN theloai ON baidang.maTheLoai=theloai.maTheLoai INNER JOIN admin ON admin.maAdmin = baidang.maAdmin ORDER BY maBaiDang DESC LIMIT $start,$limit";
  }
  $result = mysqli_query($con, $sql);
  include("../connect/close.php");
  $i = 0;
  ?>
  <div class="wrap">

    <ul>
      <?php
      while ($bd = mysqli_fetch_array($result)) { ?>

        <li class="nd">
          <table>
            <tr>
              <td><img class="img1" src="../upload/<?php echo $bd["hinhAnh"] ?>" class="img1" alt=""></td>

              <td>
                <font size=10px><?php echo $bd["tenBaiDang"] ?></font><br><a href="chi-tiet-tin-tuc.php?ma=<?php echo $bd["maBaiDang"] ?>">Xem chi tiết</a><br>
                <?php include("../connect/open.php");
                $sqlSoLuongbl = "SELECT COUNT(maBaiViet) AS 'SoLuong' FROM binhluan WHERE maBaiViet = $bd[maBaiDang]";
                $sqlSoLuongt = "SELECT COUNT(maThich) AS 'SoLuong' FROM thich WHERE maBaiViet = $bd[maBaiDang]";
                $soLuongbl = mysqli_query($con, $sqlSoLuongbl);
                $soLuongt = mysqli_query($con, $sqlSoLuongt);
                $slbl = mysqli_fetch_array($soLuongbl);
                $slt = mysqli_fetch_array($soLuongt);
                include("../connect/close.php");
                ?>
                <font size="2px"> Binh Luận: <?php echo $slbl["SoLuong"] ?></font>
                <font size="2px"> Thích: <?php echo $slt["SoLuong"] ?></font>
            </tr>
            </tr>
          </table>
        </li>

        <hr>
      <?php
      }
      ?>
    </ul>
  </div>
  <center><?php for ($j = 1; $j <= $soTrang; $j++) {
          ?>
      <a href="?trang=<?php echo $j; ?>"><?php echo $j; ?></a>
    <?php
          }
    ?></center>