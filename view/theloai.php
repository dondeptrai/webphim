<?php 
    $link = new mysqli("localhost","root","","webphim");
    $sql = "SELECT * FROM theloai";
    $resul=$link->query($sql);
?>
<style>
    a:link{text-decoration:none;color:black;}
    a:hover{color:white}
</style>

<?php
    while($row=$resul->fetch_assoc()){
?>
    <div class="tag">
        <a href="index.php?pid=1002&id=<?php echo $row["maTheloai"]?>"><?php echo $row["tenTheloai"] ?></a>
    </div>
    
<?php
    }
?>