<?php
$per_page = 10; // Số lượng phim hiển thị trên mỗi trang

// Xác định trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Nếu trang hiện tại không được đặt hoặc bằng 1, sử dụng LIMIT để chỉ lấy 10 phim đầu tiên
if (!isset($_GET['page']) || $_GET['page'] == 1) {
    $start_from = 0; // Bắt đầu từ phim đầu tiên
} else {
    $start_from = ($current_page - 1) * $per_page;
}

// Truy vấn SQL để lấy danh sách phim cho trang hiện tại
$sql = "SELECT * FROM `phim` LIMIT $start_from, $per_page";
$result = $link->query($sql);

// Lấy tổng số phim
$total_movies_sql = "SELECT COUNT(*) as total FROM `phim`";
$total_movies_result = $link->query($total_movies_sql);
$total_movies_row = $total_movies_result->fetch_assoc();
$total_movies = $total_movies_row['total'];

// Tính tổng số trang
$total_pages = ceil($total_movies / $per_page);
?>

<!-- Hiển thị danh sách phim -->
<div>
    <?php
    while ($row = $result->fetch_assoc()) {
    ?>
        <div  align="center"  class="main" style="float:left">
            <div class="movie">
                <a href="index.php?pid=1001&id=<?php echo $row["maPhim"] ?>" style="text-decoration:none;color:black">
                    <img src="img/<?php echo $row["hinhanh"] ?>" style="width:220px;height:310px">
                    <br>
                    <div class="movie-info">
                        <span><b><?php echo $row["Ten"] ?></b></span>
                        <span class="green"><?php echo $row["Danh_Gia"] ?></span>
                    </div>
                    <span class="overview"><?php echo $row["Noi_Dung"] ?></span>
                </a>
            </div>
        </div>
    <?php
    }
    include("view/pagi_view.php");
    ?>
</div>


