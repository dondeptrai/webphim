<?php
$link = new mysqli("localhost", "root", "", "webphim");
$id=$_GET["id"]; 
$sql = "SELECT * FROM phim WHERE maPhim = $id";
$query = mysqli_query($link,$sql); 
$row = mysqli_fetch_assoc($query);

    if($row) {
        if (isset($_POST["submit"])) {
            // Lấy thông tin từ form
            $ten = $_POST["ten"];
            $quoc_gia = $_POST["quoc_gia"];
            $phan_loai = $_POST["phan_loai"];
            $dien_vien = $_POST["dien_vien"];
            $nam = $_POST["nam"];
            $thoi_luong = $_POST["thoi_luong"];
            $danh_gia = $_POST["danh_gia"];
            $noi_dung = $_POST["noi_dung"];
            $ngon_ngu = $_POST["ngon_ngu"];
            $hinhanh = $_POST["hinhanh"];
            $trailerlink = $_POST["trailerlink"];

            // Cập nhật thông tin phim trong CSDL
            //Thực thi câu truy vấn cập nhật thông tin phim vào cơ sở dữ liệu và kiểm tra xem có thành công hay không.
            $sql_update = "UPDATE phim SET Ten='$ten', Quoc_Gia='$quoc_gia', Phan_Loai='$phan_loai', Dien_Vien='$dien_vien', Nam=$nam, Thoi_Luong='$thoi_luong', Danh_Gia=$danh_gia, Noi_Dung='$noi_dung', Ngon_Ngu='$ngon_ngu', hinhanh='$hinhanh', trailerlink='$trailerlink' WHERE maPhim = $id";
            if ($link->query($sql_update) === TRUE) {
                echo "Cập nhật thông tin thành công";
                // Redirect về trang chính hoặc trang danh sách phim
                exit();
            } else {
                echo "Lỗi: " . $link->error;
            }
        }

        // Hiển thị form chỉnh sửa thông tin phim
?>

            <h1 align="center" style="color:aliceblue;" >Chỉnh sửa thông tin phim</h1>
            <div class ="fx">

                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $row['maPhim']; ?>">
                    
                    <label class ="c" for="ten" >Tên phim:</label>
                    <input type="text" id="ten" name="ten" value="<?php echo $row['Ten']; ?>">

                    <label class ="c" for="quoc_gia">Quốc gia:</label>
                    <input type="text" id="quoc_gia" name="quoc_gia" value="<?php echo $row['Quoc_Gia']; ?>">

                    <label class="c" for="phan_loai">Phân loại:</label>
                    <select id="phan_loai" name="phan_loai" style="font-size: 1.2em; margin-bottom: 10px;margin-top: 10px;">
                    <option value="Phim bộ" <?php if($row['Phan_Loai'] == "Phim bộ") echo "selected"; ?>>Phim bộ</option>
                    <option value="Phim lẻ" <?php if($row['Phan_Loai'] == "Phim lẻ") echo "selected"; ?>>Phim lẻ</option>
                    </select>
                    <br>

                    <label class ="c" for="dien_vien">Diễn viên:</label>
                    <input type="text" id="dien_vien" name="dien_vien" value="<?php echo $row['Dien_Vien']; ?>">

                    <label class ="c" for="nam">Năm:</label>
                    <input type="text" id="nam" name="nam" value="<?php echo $row['Nam']; ?>">

                    <label class ="c" for="thoi_luong">Thời lượng:</label>
                    <input type="text" id="thoi_luong" name="thoi_luong" value="<?php echo $row['Thoi_Luong']; ?>">

                    <label class ="c" for="danh_gia">Đánh giá:</label>
                    <input type="text" id="danh_gia" name="danh_gia" value="<?php echo $row['Danh_Gia']; ?>">

                    <label class ="c" for="noi_dung">Nội dung:</label><br>
                    <textarea id="noi_dung" name="noi_dung"><?php echo $row['Noi_Dung']; ?></textarea><br>

                    <label class ="c" for="ngon_ngu">Ngôn ngữ:</label><br>
                    <input type="text" id="ngon_ngu" name="ngon_ngu" value="<?php echo $row['Ngon_Ngu']; ?>"><br>

                    <label class ="c" for="hinhanh">Hình ảnh:</label><br>
                    <img<img src="../../phim/img/<?php echo $row["hinhanh"];?>" style="height:90px">
                    <input type="file" id="hinhanh" name="hinhanh" value="<?php echo $row['hinhanh']; ?>"><br>

                    <label class ="c" for="trailerlink">Trailer link:</label><br>
                    <input type="text" id="trailerlink" name="trailerlink" value="<?php echo $row['trailerlink']; ?>"><br>
                    
                    <br>
                    <input type="submit" name="submit" value="Lưu" class="btn">
                </form>
            </div>
<?php
    } else {
        echo "Không tìm thấy thông tin phim";
    }
?>
