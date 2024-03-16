<?php
$link = new mysqli("localhost","root","","webphim");
$sql="SELECT * FROM users";
$result = mysqli_query($link,$sql);
if($result === false) {
        die("Lỗi truy vấn: " . mysqli_error($link));
    }
?>
<div align="center">
    <br>
    <div>
        <h1> Quản lý Users</h1>
        <form action="" method="post">
            <table align="center" border="1" style="width:1000px; padding: 8px; border-collapse: collapse;">
            <tr style="background-color:gray" align="center">
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Password</th>
                <th>User_type</th>
                <th>delete</th>
            </tr>
            <?php         
            while($row=$result->fetch_assoc()){
            ?>
            <tr align="center">
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["name"]?></td>
                <td><?php echo $row["email"]?></td>
                <td><?php echo $row["password"]?></td>
                <?php
            $phim=$row["user_type"];
            $sql1="select * from users where user_type='user'";
            $result1=$link->query($sql1);
            $row1=$result1->fetch_assoc();
            ?>
                <td><?php echo $row1["user_type"]?></td>
                <td><a onclick="return confirm('Bạn có muốn xóa?')" href="index.php?pid=7&id=<?php echo $row['id']?>"style="color:white">Xóa</a></td>
            </tr>
            <?php         
                }
            ?>       
            </table>
</form>
</div>