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
<!-- Hiển thị phân trang -->
<div class="pagination">
    <?php
    // Nút "First"
    if ($current_page != 1) {
        echo "<a href='index.php?pid=1009&page=1'>First</a> ";
    }

    // Nút "Previous"
    $previous_page = $current_page - 1;
    if ($current_page > 1) {
        echo "<a href='index.php?pid=1009&page=$previous_page'>Previous</a> ";
    }

    // Hiển thị các trang
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="index.php?pid=1009&page=' . $i . '"';
        if ($i == $current_page) {
            echo ' class="active"';
        }
        echo '>' . $i . '</a>';
    }

    // Nút "Next"
    $next_page = $current_page + 1;
    if ($current_page < $total_pages) {
        echo "<a href='index.php?pid=1009&page=$next_page'>Next</a> ";
    }

    // Nút "Last"
    if ($current_page != $total_pages) {
        echo "<a href='index.php?pid=1009&page=$total_pages'>Last</a> ";
    }
    ?>
</div>
