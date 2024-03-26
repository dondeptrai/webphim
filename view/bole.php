<?php
//kiểm tra phim lẻ hay bộ
    $phan_loai = isset($_GET['Phan_Loai']) ? $_GET['Phan_Loai'] : '';
    $link = new mysqli("localhost", "root", "", "webphim");

    $phan_loai == 'Phim bộ' || $phan_loai == 'Phim lẻ';
    $sql = "SELECT * FROM phim WHERE  Phan_Loai = '$phan_loai'";
    $result = $link->query($sql);
?>

<div>
    <?php
        while ($row = $result->fetch_assoc()) {
        $id=$row['maPhim'];
        $sql1 = $link -> query(query:"SELECT AVG(rating) AS avg FROM ratings WHERE id_product='$id'");
        $result1=$sql1->fetch_array();
        $avg = $result1['avg'];
    ?>
    <div class="main" style="float:left">
        <div class="movie">
            <a href="index.php?pid=1001&id=<?php echo $row['maPhim'] ?>" style="text-decoration:none;color:black;">
                <img src="img/<?php echo $row['hinhanh'] ?>" style="width:220px;height:310px">
                <br>
                <div class="movie-info">
                    <span><b><?php echo $row['Ten'] ?></b></span>
                    <span class="green"><?php echo round($avg, precision:2)?> &#9733;</span>
                </div>
                <span class="overview"><?php echo $row['Noi_Dung'] ?></span>
            </a>
        </div>
    </div>
    <?php
        }
    ?>
