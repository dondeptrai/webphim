<?php
    $link= new mysqli("localhost","root","","webphim");
    $sql="select * from phim order by maPhim desc";
    $result=$link->query($sql);
?>
<br>
<div>
    <h1 align="center"><b>Quản lý phim</b></h1>
    <a href="admin.php?pid=3"style="color:white"><b>Thêm phim</b></a>
    <br>
    <br>
    <div align="center">
    <table align="center" border="1" style="border-collapse:collapse;">
        <tr>
            <th>Mã phim</th>
            <th>Thể loại</th> 
            <th>Tên phim</th>
            <th>Quốc gia</th>
            <th>Phân loại</th>
            <th>Diễn viên</th>
            <th>Năm</th>
            <th>Thời lượng</th>
            <th>Đánh giá</th>
            <th>Nội dung</th>
            <th>Ngôn ngữ</th>
            <th>Hình ảnh</th>
            <th>Trailer</th>
            <th>Link phim</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php
            while($row=$result->fetch_assoc()){
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
            <td ><?php echo $row["Danh_Gia"]?></td>
            <td ><?php echo $row["Noi_Dung"]?></td>
            <td ><?php echo $row["Ngon_Ngu"]?></td>
            <td ><img src="../../phim/img/<?php echo $row["hinhanh"];?>" style="height:80px"></td>
            <td ><iframe width="70" height="60" src="<?php echo $row["trailerlink"]?>"></iframe></td>
            <td ><iframe width="70" height="60" src="<?php echo $row["linkphim"]?>"></iframe></td>
            <td><a href="admin.php?pid=6&id=<?php echo $row['maPhim'];?>" style="color:white">Sửa</a></td>
            <td><a onclick="return confirm('Bạn có muốn xoá phim?')" href="admin.php?pid=5&id=<?php echo $row['maPhim']?>"style="color:white">Xóa</a></td>
            <td></td>
        </tr>
            <?php 
            }
            ?>
    </table>
    </div>
</div>
