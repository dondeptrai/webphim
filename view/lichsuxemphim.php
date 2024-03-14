<h2>Lịch sử xem phim</h2>
<?php
$link = new mysqli("localhost", "root", "", "webphim");

// Kiểm tra kết nối
if ($link->connect_error) {
    die("Kết nối tới cơ sở dữ liệu thất bại: " . $link->connect_error);
}
$idUser = $_SESSION['user_id'];
 $sql = "SELECT phim.*, lichsuxemphim.thoigian 
        FROM phim 
        INNER JOIN lichsuxemphim ON phim.maPhim = lichsuxemphim.idPhim 
        WHERE lichsuxemphim.id = $idUser";
        $result = $link->query($sql);
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