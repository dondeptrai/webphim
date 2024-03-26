<?php
    $link= new mysqli("localhost","root","","webphim");
    $sql="select * from phim order by maPhim desc";
    $result=$link->query($sql);
?>
<br>
<!-- <div> -->
    <h1 align="center" style="color:white"><b>Quản lý phim</b></h1>
    <a href="admin.php?pid=3"style="color:white"><b>Thêm phim</b></a>
    <br>
    <br>
    <div align="center" class="film">
    <table align="center" border="1" style="border-collapse:collapse;">
        <tr class="film_head">
            <th class="vg">Mã phim</th>
            <th class="vg">Thể loại</th> 
            <th>Tên phim</th>
            <th class="vg">Quốc gia</th>
            <th class="vg">Phân loại</th>
            <th>Diễn viên</th>
            <th class="vg">Năm</th>
            <th class="vg">Thời lượng</th>
            <th class="vg">Đánh giá</th>
            <th>Nội dung</th>
            <th class="vg">Ngôn ngữ</th>
            <th class="hcn">Hình ảnh</th>
            <th class="hcn">Trailer</th>
            <th class="hcn">Phim</th>
            <th class="vg">Sửa Xóa</th>
        </tr>
        <?php
            while($row=$result->fetch_assoc()){
                $id=$row['maPhim'];
                $sql1 = $link -> query(query:"SELECT AVG(rating) AS avg FROM ratings WHERE id_product='$id'");
                $result1=$sql1->fetch_array();
                $avg = $result1['avg'];
        ?> 
        <tr align="center">
        <?php
            $phim=$row["MaTheloai"];
            $sql1="select * from theloai where MaTheloai=$phim";
            $result1=$link->query($sql1);
            $row1=$result1->fetch_assoc();
        ?>
            <td><?php echo $row["maPhim"];?></td>
            <td><?php echo $row1["tenTheloai"];?></td>
            <td><?php echo $row["Ten"]?></td>
            <td ><?php echo $row["Quoc_Gia"]?></td>
            <td ><?php echo $row["Phan_Loai"]?></td>
            <td ><?php echo $row["Dien_Vien"]?></td>
            <td ><?php echo $row["Nam"]?></td>
            <td ><?php echo $row["Thoi_Luong"]?></td>
            <td class="green star"><?php echo round($avg, precision:2)?> &#9733;</td>
            <td ><?php echo $row["Noi_Dung"]?></td>
            <td ><?php echo $row["Ngon_Ngu"]?></td>
            <td ><img src="../../phim/img/<?php echo $row["hinhanh"];?>" style="height:80px"></td>
            <td ><iframe width="70" height="60" src="<?php echo $row["trailerlink"]?>"></iframe></td>
            <td ><iframe width="70" height="60" src="<?php echo $row["linkphim"]?>"></iframe></td>
            <td>
                <a style="color:blue; font-size: 1rem" href="admin.php?pid=6&id=<?php echo $row['maPhim'];?>" style="color:white">Sửa</a> 
                <a style="color: blue; font-size: 1rem;" onclick="return confirm('Bạn có muốn xoá phim?')" href="admin.php?pid=5&id=<?php echo $row['maPhim']?>"style="color:white">Xóa</a>
            </td>
        </tr>
            <?php 
            }
            ?>
    </table>
    </div>
<!-- </div> -->
