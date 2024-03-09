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