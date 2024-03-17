<?php
$link = new mysqli("localhost", "root", "", "webphim");

if ($link->connect_error) {
    die("Kết nối database thất bại: " . $link->connect_error);
}

$sql = "SELECT * FROM users";
$result = $link->query($sql);

if ($result === false) {
    die("Lỗi truy vấn: " . $link->error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";

    if ($link->query($sql) === true) {
        echo "<script>alert('User đã được xóa thành công '); history.back();</script>";
    } else {
        echo "Lỗi khi xóa user: " . $link->error;
    }
}
?>

<div align="center">
    <br>
    <div>
        <h1> Quản lý Users</h1>
        <table align="center" border="1" style="width:1000px; padding: 8px; border-collapse: collapse;">
            <tr style="background-color:gray" align="center">
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Password</th>
                <th>User_type</th>
                <th>Delete</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr align="center">
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["password"] ?></td>
                    <td><?php echo $row["user_type"] ?></td>
                    <td>
                        <a onclick="return confirm('Bạn có muốn xóa?')" 
                           href="admin.php?pid=8&id=<?php echo $row['id'] ?>"style="color:white">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
