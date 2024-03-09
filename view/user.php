<?php
session_start();
$link=new mysqli("localhost","root","","webphim");
$sql1="SELECT * FROM `users` WHERE `name` LIKE '".$_SESSION['user_name']."'";

$result = $link->query($sql1);
$roww=$result->fetch_assoc();


if (!isset($_SESSION['user_name'])) {
    header('Location: view/login.php');
    exit();
}else{
    ?>
        <div align="center"style="height:540px;padding-top:30px;color:white">
            <h1>Hello: <?php echo $_SESSION['user_name']?></h1>
            <h3><b>User name:</b> <?php echo $roww['name']?></h3>
            <a href="view/logout.php" style="color:red;font-size: 1.3rem;"><b>Đăng xuất</a>
            <br>
        </div>
    <?php
}
    
?>

