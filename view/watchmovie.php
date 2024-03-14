<?php
session_start();
@include 'config.php';

// Kiểm tra xem có phải phương thức POST không
if (isset($_GET['id'])) {
    // Lấy id phim từ dữ liệu được gửi qua POST
    $idPhim = $_GET['id'];
    
    // Lấy id user từ session đã được lưu trữ khi người dùng đăng nhập
    $idUser = $_SESSION['user_id'];

    // Thời gian hiện tại
    $thoiGian = date("Y-m-d H:i:s");

    // Kiểm tra xem idPhim đã tồn tại trong bảng lichsuxemphim chưa
    $sql_check = "SELECT * FROM lichsuxemphim WHERE idPhim = '$idPhim' AND id = '$idUser'";
    $result_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result_check) > 0) {
        // Nếu idPhim đã tồn tại, chỉ cập nhật lại thời gian
        $sql_update = "UPDATE lichsuxemphim SET thoigian = '$thoiGian' WHERE idPhim = '$idPhim' AND id = '$idUser'";
        if (mysqli_query($conn, $sql_update)) {
            echo "Thời gian đã được cập nhật!";
        } else {
            echo "Lỗi khi cập nhật thời gian: " . mysqli_error($conn);
        }
    } else {
        // Nếu idPhim chưa tồn tại, thực hiện insert mới
        $sql_insert = "INSERT INTO lichsuxemphim (id, idPhim, thoigian) VALUES ('$idUser', '$idPhim', '$thoiGian')";
        if (mysqli_query($conn, $sql_insert)) {
            echo "Dữ liệu đã được insert thành công!";
        } else {
            echo "Lỗi khi insert dữ liệu mới: " . mysqli_error($conn);
        }
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>
<?php
$link = new mysqli("localhost", "root", "", "webphim");
$id = $_GET['id'];
$sql = "SELECT * FROM phim WHERE maPhim = $id";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tenPhim = $row['Ten'];
    $linkVideo = $row['linkphim'];


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Xem phim: <?php echo $tenPhim; ?></title>
    </head>

    <body>

        <div style="display:flex">
            <div style="flex-basis: 70%;" align="center">
                <h1><?php echo $tenPhim; ?></h1>
                <iframe width="800" height="500" src="<?php echo $linkVideo; ?>"></iframe>
            </div>
            <div style="flex-basis: 30%;">
                <h3>Phim đề cử</h3>
                <div>
                    <?php
                    $phim = $row["MaTheloai"];
                    $sql = "select * from phim where maTheloai=$phim limit 0,4";
                    $result = $link->query($sql);
                    ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <a href="index.php?pid=1001&id=<?php echo $row["maPhim"] ?>" style="text-decoration:none;color:black">
                            <div class="phimtuongtu">
                                <div>
                                    <img src="img/<?php echo $row["hinhanh"] ?> " style="width:75px;height:130px;float:left">
                                </div>
                                <div align="left" style="flex-basis:60%;padding-left:10px">
                                    <span><b><?php echo $row["Ten"] ?></b></span>
                                    <br>
                                    <span class="green star"><?php echo $row["Danh_Gia"] ?> &#9733;</span>
                                </div>
                                <br>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

    <?php
} else {
    echo "Không tìm thấy thông tin về phim.";
}

$link->close();
    ?>
    </body>

    </html>
