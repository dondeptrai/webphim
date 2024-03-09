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
        <div class="mid">
            <h1><?php echo $row["Ten"]?></h1>
            <P><?php echo $row["Ten"]?> (<?php echo $row["Nam"]?>)</p>
            <p><b>Diễn viên: </b><?php echo $row["Dien_Vien"]?></p>
            <p><b>Phụ đề: </b><?php echo $row["Ngon_Ngu"]?></p>
            <p><b>Năm sản xuất: </b><?php echo $row["Nam"]?><p>
            <p><b>Quốc gia: </b><?php echo $row["Quoc_Gia"]?></p>
            <p><b>Thời lượng: </b><?php echo $row["Thoi_Luong"]?></p>
            <hr width="100%">

            <div class="rating-container">    
                          
                <div class="rating" data-rating="0">
                    <span class="danhgia"><?php echo $row["Danh_Gia"]?></span>  
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                    <span class="star" data-value="6">&#9733;</span>
                    <span class="star" data-value="7">&#9733;</span>
                    <span class="star" data-value="8">&#9733;</span>
                    <span class="star" data-value="9">&#9733;</span>
                    <span class="star" data-value="10">&#9733;</span>
                </div>
                <p id="rating-value">Đánh giá của bạn là: 0 sao</p>
            </div>
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
                    $phim=$row["MaTheloai"];
                    $sql="select * from phim where MaTheloai=$phim limit 0,4";
                    $result=$link->query($sql);
                ?>
                <?php 
                while ($row=$result->fetch_assoc())
                {
                ?>  
                <a href="index.php?pid=1001&id=<?php echo $row["maPhim"]?>" style="text-decoration:none;color:black">
                    <div class="phimtuongtu"> 
                    <div>
                        <img src="img/<?php echo $row["hinhanh"]?> "style="width:75px;height:130px;float:left"> 
                    </div>                              
                    <div align="left" style="flex-basis:60%;padding-left:10px">
                        <span><b><?php echo $row["Ten"]?></b></span>
                    <br>
                        <span class="green star"><?php echo $row["Danh_Gia"]?> &#9733;</span>
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