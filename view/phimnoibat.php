<?php
$link = new mysqli("localhost", "root", "", "webphim");


$sql = "SELECT p.*, AVG(r.rating) AS avg_rating
            FROM phim p
            INNER JOIN ratings r ON p.maphim = r.id_product
            GROUP BY p.maphim
            ORDER BY avg_rating DESC
            LIMIT 11";

$result_phim = $link->query($sql);
?>

<div class="top-rated-movies">
    <h2>Phim nổi bật</h2>
    <?php while ($row = $result_phim->fetch_assoc()) { ?>
        <a href="index.php?pid=1001&id=<?php echo $row["maPhim"] ?>" style="text-decoration:none;color:black">
            <div class="phimtuongtu">
                <div>
                    <img src="img/<?php echo $row["hinhanh"] ?> " style="width:75px;height:130px;float:left">
                </div>
                <div align="left" style="flex-basis:60%;padding-left:10px">
                    <span><b><?php echo $row["Ten"] ?></b></span>
                    <br>
                    <span class="green star"><?php echo round($row['avg_rating'], 1); ?> &#9733;</span>
                </div>

                <br>
            </div>
        </a>
    <?php } ?>
</div>
