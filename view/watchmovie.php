<?php
session_start();
@include 'config.php';

if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
    
    $idPhim = $_GET['id'];
    $idUser = $_SESSION['user_id'];
    $thoiGian = date("Y-m-d H:i:s");

    $sql_check = "SELECT * FROM lichsuxemphim WHERE idPhim = '$idPhim' AND id = '$idUser'";
    $result_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result_check) > 0) {
        // Nếu idPhim đã tồn tại, chỉ cập nhật lại thời gian
        $sql_update = "UPDATE lichsuxemphim SET thoigian = '$thoiGian' WHERE idPhim = '$idPhim' AND id = '$idUser'";
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
            </div>
            <div style="flex-basis: 30%;">
                <h3 style="color: white;">Phim đề cử</h3>
                <div>
                    <?php
                    $phim = $row["MaTheloai"];
                    $sql = "select * from phim where maTheloai=$phim limit 0,4";
                    $result = $link->query($sql);
                    ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <a href="index.php?pid=1001&id=<?php echo $row["maPhim"] ?>" style="text-decoration:none;color:white;">
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
        <div class="container">
    <h2 class="mt-5 mb-3 text-light">Leave a Comment</h2>
    <form action="" method="POST">
        <?php
if(isset($_SESSION['user_id'])){
                echo'<div class="mb-3">
                <label for="comment" class="form-label">Your Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Enter your comment"></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="cmt-btn">Submit</button>';
            }else{
                echo'<div class="mb-3">
                <label for="comment" class="form-label">Your Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="BẠN PHẢI ĐĂNG NHẬP MỚI CÓ THỂ BÌNH LUẬN!" disabled></textarea>
              </div>
              ';
            }
        ?>
    </form>
    <ul class="list-group mt-5">
    <?php
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                if(isset($_SESSION['user_id'])){
                    if($row2['id']==$_SESSION['user_id']){
                        echo'<li class="list-group-item d-flex justify-content-between"><h3>'.$row2['name'].':  '.$row2['article'].'</h3><h3>'.$row2['date_comment'].'</h3><a href="index.php?pid=1010&id='.$_GET['id'].'&del='.$row2['id_comment'].'">Xóa</a></li>';
                    }else{
                        echo'<li class="list-group-item d-flex justify-content-between"><h3>'.$row2['name'].':  '.$row2['article'].'</h3><h3>'.$row2['date_comment'].'</h3></li>';
                    }
                    
                }
                
            }
        }
    ?>
</ul>
    
  </div>

    <?php
} else {
    echo "Không tìm thấy thông tin về phim.";
}

$link->close();
    ?>
    </body>

    </html>
