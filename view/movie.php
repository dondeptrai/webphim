<div>
    <?php
        $id=$_GET['id'];
        $link=new mysqli("localhost","root","","webphim");
        $sql="select * from phim where MaTheloai=$id";
        $result=$link->query($sql);
    ?>
    <?php 

    while ($row=$result->fetch_assoc())
    {
    ?>
         <div  align="center" class="main" style="float:left; margin-left: 60px;" >
            <div class="movie">
            <a href="index.php?pid=1001&id=<?php echo $row["maPhim"]?>" style="text-decoration:none;color:black">
                <img src="img/<?php echo $row["hinhanh"]?> "style="width:220px;height:310px">
                <br>
                <div class="movie-info">
                <span><b><?php echo $row["Ten"]?></b></span>
                <span class="green"><?php echo $row["Danh_Gia"]?></span>
                </div>
                <span class="overview"><?php echo $row["Noi_Dung"]?></span>
            </div>
        </div>
    <?php
    }
    ?>
</div>
