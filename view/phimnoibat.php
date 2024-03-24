<?php 
    $link = new mysqli("localhost","root","","webphim");

    
    $sql = "SELECT p.*, AVG(r.rating) AS avg_rating
            FROM phim p
            INNER JOIN ratings r ON p.maphim = r.id_product
            GROUP BY p.maphim
            ORDER BY avg_rating DESC
            LIMIT 5"; 
    
    $result_phim = $link->query($sql);
?>

<div class="top-rated-movies" style="float: right; margin-top: 80px; width: 270px" >
    <h2>Top Rated Movies</h2>
    <?php while ($row = $result_phim->fetch_assoc()) { ?>
        <div class="movie">
            <h3><?php echo $row['Ten']; ?></h3>
            <p>Đánh giá trung bình: <?php echo round($row['avg_rating'], 1); ?></p>
            <img src="img/<?php echo $row["hinhanh"]?>" style="width:180px;height:300px;"> 
        </div>
    <?php } ?>
</div>