<?php 
    $link = new mysqli("localhost","root","","webphim");
    $sql = "SELECT * FROM theloai";
    $result_theloai = $link->query($sql);
?>

<style>
    a:link{text-decoration:none;color:black;}
    a:hover{color:white}
</style>

<?php
    while($row_theloai = $result_theloai->fetch_assoc()){
?>
    <div class="tag">
        <a href="index.php?pid=1002&id=<?php echo $row_theloai["maTheloai"] ?>"><?php echo $row_theloai["tenTheloai"] ?></a>
    </div>
    
<?php
    }
?>

<div class="tag">
    <a href="index.php?pid=1014&Phan_Loai=Phim bộ">Phim Bộ</a>
</div>

<div class="tag">
    <a href="index.php?pid=1014&Phan_Loai=Phim lẻ">Phim Lẻ</a>
</div>
