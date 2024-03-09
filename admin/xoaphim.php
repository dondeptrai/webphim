<?php
    $link = new mysqli("localhost", "root", "", "webphim");
    // Kiểm tra kết nối
    if ($link->connect_error) {
        die("Kết nối đến database thất bại: " . $link->connect_error);
    }
    // Kiểm tra xem có tham số 'id' được truyền qua URL không
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Chuẩn bị truy vấn DELETE
        $sql = "DELETE FROM phim WHERE maPhim = $id";

        // Thực thi truy vấn
        if ($link->query($sql)) {
            // Nếu xoá thành công, chuyển hướng về trang admin.php với pid=2
            header("location: admin.php?pid=2");
            exit(); // Kết thúc script sau khi chuyển hướng
        } else {
            // Nếu xoá không thành công, hiển thị thông báo và quay lại trang trước đó
            echo "<script>alert('Delete không thành công, kiểm tra lại! '); history.back();</script>";
        }
    } else {
        // Nếu không có tham số 'id' được truyền qua URL
        echo "<script>alert('Không có id được truyền qua URL! '); history.back();</script>";
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $link->close();
?>