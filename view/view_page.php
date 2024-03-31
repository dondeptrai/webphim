<?php
    $id=$_GET['id'];
    $link=new mysqli("localhost","root","","webphim");
    $sql="select * from phim where maPhim=$id ";
    $result=$link->query($sql);
    $row = $result->fetch_assoc();
?>
    <div class="thongtin">
        <div class="trailer">         
            <iframe width="1040" height="315" src="<?php echo $row["trailerlink"]?>" frameborder="0" allowfullscreen></iframe>
        </div>
    <div class="main_thongtin">
        <div class="left">
            <img src="img/<?php echo $row["hinhanh"]?>">
            <div align="center">
            <a href="index.php?pid=1010&id=<?php echo $id?>">
                <button type="button" onclick="" class="xemphim">Xem Phim</button>
            </a>
            </div>
        </div>
        <div class="mid" align="left">
            <h1><?php echo $row["Ten"]?></h1>
            <P><?php echo $row["Ten"]?> (<?php echo $row["Nam"]?>)</p>
            <p><b>Diễn viên: </b><?php echo $row["Dien_Vien"]?></p>
            <p><b>Phụ đề: </b><?php echo $row["Ngon_Ngu"]?></p>
            <p><b>Năm sản xuất: </b><?php echo $row["Nam"]?><p>
            <p><b>Quốc gia: </b><?php echo $row["Quoc_Gia"]?></p>
            <p><b>Thời lượng: </b><?php echo $row["Thoi_Luong"]?></p>
            <hr width="100%">

           <?php include("ratings.php")?>
            <hr>
            <div class="thongtin">
                <h2>Tóm tắt</h2>
                <?php echo $row["Noi_Dung"]?>
            </div>

        <script src="script.js"></script>

        </div>
        <div class="right">
            <h3>Phim đề cử</h3>
            <div>
                <?php
                    $phim=$row["maTheloai"];
                    $sql="select * from phim where maTheloai=$phim limit 0,4";
                    $result=$link->query($sql);
                ?>
                <?php 
                while ($row=$result->fetch_assoc())
                {
                    $id=$row['maPhim'];
                    $sql1 = $link -> query(query:"SELECT AVG(rating) AS avg FROM ratings WHERE id_product='$id'");
                    $result1=$sql1->fetch_array();
                    $avg = $result1['avg'];
                ?>  
                <a href="index.php?pid=1001&id=<?php echo $row["maPhim"]?>" style="text-decoration:none;color:black">
                    <div class="phimtuongtu"> 
                    <div>
                        <img src="img/<?php echo $row["hinhanh"]?> "style="width:75px;height:130px;float:left"> 
                    </div>                              
                    <div align="left" style="flex-basis:60%;padding-left:10px">
                        <span><b><?php echo $row["Ten"]?></b></span>
                    <br>
                        <span class="green star"><?php echo round($avg, precision:2)?> &#9733;</span>
                    </div> 
                        
                    <br>                         
                    </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
