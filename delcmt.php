<?php
@include 'config.php';

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    // Nếu chưa đăng nhập hoặc không phải là admin, chuyển hướng người dùng đến trang đăng nhập
    header("Location: login.php");
    exit();
}

// Xác định id của bình luận cần xóa
if (isset($_GET['id'])) {
    $id_comment = $_GET['id'];

    // Xóa bình luận từ cơ sở dữ liệu
    $sql = "DELETE FROM comment WHERE id_comment = $id_comment";
    if (mysqli_query($conn, $sql)) {
        // Nếu xóa thành công, chuyển hướng người dùng đến trang quản lý bình luận
        header("Location: admin.php?pid=10");
        exit();
    } else {
        echo "Lỗi khi xóa bình luận: " . mysqli_error($conn);
    }
} else {
    echo "Không có ID bình luận được cung cấp.";
}

// Đóng kết nối
mysqli_close($conn);
?>
