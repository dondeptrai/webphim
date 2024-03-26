<?php
// session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: view/login.php');
    exit(); 
}

$link = new mysqli("localhost", "root", "", "webphim");

if ($link->connect_error) {
    die("Kết nối tới cơ sở dữ liệu thất bại: " . $link->connect_error);
}

$idUser = $_SESSION['user_id'];

// Kiểm tra nếu có yêu cầu xem phim từ người dùng
if (isset($_GET['id_phim'])) {
    $idPhim = $_GET['id_phim'];
    $thoiGian = date("Y-m-d H:i:s");

    // Chèn dữ liệu vào bảng lịch sử xem phim
    $sql_insert = "INSERT INTO lichsuxemphim (id, idPhim, thoigian) VALUES ('$idUser', '$idPhim', '$thoiGian')";
    $result_insert = $link->query($sql_insert);
    if ($result_insert === false) {
        die("Lỗi khi lưu lịch sử xem phim: " . $link->error);
    }
}

// Truy vấn lịch sử xem phim của người dùng
$sql = "SELECT phim.*, lichsuxemphim.thoigian 
        FROM phim 
        INNER JOIN lichsuxemphim ON phim.maPhim = lichsuxemphim.idPhim 
        WHERE lichsuxemphim.id = $idUser";
$result = $link->query($sql);

// Kiểm tra kết quả truy vấn
if ($result === false) {
    die("Lỗi truy vấn: " . $link->error);
}

// Hiển thị lịch sử xem phim của người dùng
if ($result->num_rows > 0) {
    echo "<div class='phim-container1'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='phim1'>";
        echo "<h4>" . $row['Ten'] . "</h4>";
        echo "<p>Thời gian xem: " . $row['thoigian'] . "</p>";
        echo "<iframe width='200' height='200' src='" . $row['linkphim'] . "' frameborder='0' allowfullscreen></iframe>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "Bạn chưa xem bất kỳ phim nào.";
}

// Đóng kết nối
$link->close();
?>
<style>
    .phim-container1 {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 20px;
    }

    .phim1 {
        color: black;
        flex: 0 1 calc(25% - 70px);
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        background-color: white;
    }

    .phim1 h4 {
        margin-top: 0;
        font-size: 18px;
        /* color: white; */
    }

    .phim1 p {
        margin: 5px 0;
        font-size: 14px;
        /* color: white; */
    }

    .phim1 iframe {
        width: 100%;
        height: 150px;
    }

    .phim1:nth-child(1) {
        order: 1;
    }

    .phim1:nth-child(2) {
        order: 2;
    }

    .phim1:nth-child(3) {
        order: 3;
    }

    .phim1:nth-child(4) {
        order: 4;
    }
</style>

