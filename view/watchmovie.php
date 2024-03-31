<?php
// session_start();
@include 'config.php';

if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
    
    $maPhim = $_GET['id'];
    $idUser = $_SESSION['user_id'];
    $thoiGian = date("Y-m-d H:i:s");

    // Kiểm tra xem lịch sử xem phim đã tồn tại chưa
    $sql_check = "SELECT * FROM lichsuxemphim WHERE maPhim = '$maPhim' AND id = '$idUser'";
    $result_check = mysqli_query($conn, $sql_check);

    // Kiểm tra kết quả của truy vấn
    if ($result_check) {
        if (mysqli_num_rows($result_check) > 0) {
            $sql_update = "UPDATE lichsuxemphim SET thoigian = '$thoiGian' WHERE maPhim = '$maPhim' AND id = '$idUser'";
            $result_update = mysqli_query($conn, $sql_update);
        } else {
            $sql_insert = "INSERT INTO lichsuxemphim (id, maPhim, thoigian) VALUES ('$idUser', '$maPhim', '$thoiGian')";
            $result_insert = mysqli_query($conn, $sql_insert);
        }
    } else {
        echo "Lỗi truy vấn: " . mysqli_error($conn);
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
if(isset($_GET['del'])){
    $id_comment=$_GET['del'];
    $sql3 = "DELETE comment FROM comment WHERE id_comment=$id_comment";
    $result3 = $link->query($sql3);
}
if(isset($_POST['cmt-btn'])){
    $id_product=$_GET['id'];
    $id_user=$_SESSION['user_id'];
    $article=$_POST['comment'];
    $sql1 = "INSERT INTO comment(id_product, id_user, article) VALUES ($id_product, $id_user, '$article')";
    $result1 = $link->query($sql1);
}
$sql2="SELECT * FROM comment INNER JOIN users ON comment.id_user=users.id WHERE comment.id_product=$id";
$result2 = $link->query($sql2);


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
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>

        <div style="display:flex">
            <div style="flex-basis: 70%;" align="center">
                <h1 style="color: white;"><?php echo $tenPhim; ?></h1>
                <iframe width="800" height="500" src="<?php echo $linkVideo; ?>"></iframe>
                <?php include('view/cmt.php')?>
            </div>
            <div style="flex-basis: 30%;">
                <h3 style="color: white;">Phim đề cử</h3>
                <div>
                    <?php
                    $phim = $row["maTheloai"];
                    $sql = "select * from phim where maTheloai=$phim limit 0,4";
                    $result = $link->query($sql);
                    ?>
                    <?php while ($row = $result->fetch_assoc()) 
                    {
                        $id=$row['maPhim'];
                        $sql1 = $link -> query(query:"SELECT AVG(rating) AS avg FROM ratings WHERE id_product='$id'");
                        $result1=$sql1->fetch_array();
                        $avg = $result1['avg'];
                    ?>
                        <a href="index.php?pid=1001&id=<?php echo $row["maPhim"] ?>" style="text-decoration:none;color:white;">
                            <div class="phimtuongtu">
                                <div>
                                    <img src="img/<?php echo $row["hinhanh"] ?> " style="width:75px;height:130px;float:left">
                                </div>
                                <div align="left" style="flex-basis:60%;padding-left:10px">
                                    <span><b><?php echo $row["Ten"] ?></b></span>
                                    <br>
                                    <span class="green star"><?php echo round($avg, precision:2)?>&#9733;</span>
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
