<?php
   SESSION_START();
    $link=new mysqli("localhost","root","","webphim");
    $sql1="SELECT * FROM `users` WHERE `id` LIKE '".$_SESSION['user_id']."'";
    $result = $link->query($sql1);
    $roww=$result->fetch_assoc();


if (!isset($_SESSION['user_name'])) {
    header('Location: view/login.php');
}else{ 
    ?>
        <div align="center"style="height:540px;padding-top:30px;color:white">
            <h1>Xin chào: <?php echo $roww['name']?></h1>
            <a href="index.php?pid=1011"style="font-size: 24px; color: white;" >Lịch sử xem phim</a>
            <br>
            <br>
            <a href="view/logout.php" style="color:red;font-size: 1.3rem;"><b>Đăng xuất</b></a>
            <br>
            <br>
            <a href="view/capnhat.php"style="color:gray;font-size: 1.1rem;"><b>Cập nhật thông tin</b></a>
            <br>
        </div>
    <?php
}
    
?>

