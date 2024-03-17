<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ADMIN</title>
</head>
<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'webphim');
    mysqli_set_charset($conn, "utf8");

    // Kiểm tra xem người dùng đã đăng nhập chưa và có phải là admin không
    if (!isset($_SESSION['user_name']) || $_SESSION['user_type'] !== 'admin') {
        // Nếu chưa đăng nhập hoặc không phải là admin, chuyển hướng về trang đăng nhập
        header('location: view/login.php');
        exit(); // Đảm bảo kết thúc quá trình thực thi sau khi chuyển hướng
    }

    // Tiếp tục với nội dung của trang admin.php sau khi đã đăng nhập là admin
?>
<body class="body1">
    <div class="admin">
        <li><a href="admin.php" style="color:white;text-decoration:none">Trang chủ</a></li>
        <li><a href="admin.php?pid=2" style="color:white;text-decoration:none">Quản lý phim</a></li>
        <li><a href="admin.php?pid=8"style="color:white;text-decoration:none">Người đăng nhập</a></li>
        <li><a href="admin.php?pid=10"style="color:white;text-decoration:none">Quản lý bình luận</a></li>
        <li><a href="view/logout.php"style="color:white;text-decoration:none"> Đăng xuất</a></li>
    </div>
    <div class="dsphim">
        <?php
            if(isset($_GET['pid'])){
                switch($_GET['pid']){
                    case 2:
                        include("admin/qliphim.php");
                        break;
                    case 3:
                        include("admin/view_themphim.php");
                        break;
                    case 4:
                        include("admin/ctrl_themphim.php");
                        break;
                    case 5:
                        include("admin/xoaphim.php");
                        break;
                    case 6: 
                        include("admin/sua_phim.php");
                        break;
                    case 7:
                        include("view/logout.php");
                        break;
                    case 8:
                        include("admin/qliusers.php");
                        break;
                    case 9:
                        include("admin/delcmt.php");
                        break;
                    case 10:
                        include("admin/qlicmt.php");
                        break;
                }
            }
        ?>
    </div>
</body>
