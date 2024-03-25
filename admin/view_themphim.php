<?php
    $link=new mysqli("localhost","root","","webphim");
    $sql="SELECT * FROM theloai";
    $result = $link->query($sql);
    $row=$result->fetch_assoc();
?>

<h1 align="center" style="color: white;"><b>Thêm phim</b></h1>
<div class="up">
<form action="admin.php?pid=4" method="post" enctype="multipart/form-data">
    <!-- <table align="center" border="1" style="border-collapse:collapse;"> -->
    <!-- <tr>
        <td>Mã phim</td>
        <td><input type="text" name="maPhim"></td>
    </tr> -->
    <tr style="color: black">
        <td>Thể loại</td>
        <td>
            <select name="maTheloai">
                <option value="<?php echo $row["maTheloai"]?>"><?php echo $row["tenTheloai"]?></option>
                <?php
                    while($row=$result->fetch_assoc()){
                ?> 
                <option value="<?php echo $row["maTheloai"]?>"><?php echo $row["tenTheloai"]?></option>
                <?php
                    }
                ?> 
            </select>
        </td>
    </tr>
    <br>
    <tr>
        <td>Tên phim</td>
        <td><input type="text" name="Ten"></td>
    </tr>
    <tr>
        <td>Quốc gia</td>
        <td><input type="text" name="Quoc_Gia"></td>
    </tr>
    <tr>
    <td>Phân loại</td>
    <td>
        <select name="Phan_Loai">
            <option value="Phim bộ">Phim bộ</option>
            <option value="Phim lẻ">Phim lẻ</option>
        </select>
    </td>
    <br>
    </tr>
    <tr>
        <td>Diễn viên</td>
        <td><input type="text" name="Dien_Vien"></td>
    </tr>
    <tr>
        <td>Năm</td>
        <td><input type="text" name="Nam"></td>
    </tr>
    <tr>
        <td>Thời lượng</td>
        <td><input type="text" name="Thoi_Luong"></td>
    </tr>
    <tr>
        <td>Đánh giá</td>
        <td><input type="text" name="Danh_Gia"></td>
    </tr>
    <tr>
        <td>Nội dung</td>
        <td><input type="text" name="Noi_Dung"></td>
    </tr>
    <tr>
        <td>Ngôn ngữ</td>
        <td><input type="text" name="Ngon_Ngu"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
        <td>Trailer</td>
        <td><input type="text" name="trailerlink"></td>
    </tr>
    <tr>
        <td>Link Phim</td>
        <td><input type="text" name="linkphim"></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Lưu" class="btn"></td>
        
    </tr>

    <!-- </table> -->
</form>
</div>
