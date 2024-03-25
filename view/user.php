<?php
session_start();
if(isset($_SESSION['user_id'])) {
    $link=new mysqli("localhost","root","","webphim");
    $sql1="SELECT * FROM `users` WHERE `id` LIKE '".$_SESSION['user_id']."'";
    $result = $link->query($sql1);
    $roww=$result->fetch_assoc();

    include("view/unon.php");
} else {
    include("view/non.php");
}
?>