<?php
session_start();
$link = new mysqli("localhost", "root", "", "webphim");
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id=$id";
$query = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($query);

if (!isset($_SESSION['user_name'])) { 
    header('Location: view/login.php');
} else {
    if ($row && $row['user_type'] == 'user') {
        if (isset($_POST["btn_submit"])) {
            // Lấy thông tin từ form
            $ten = $_POST["name"];
            $email = $_POST["email"];

            $sql_update = "UPDATE `users` SET `name`='$ten',`email`='$email' WHERE id=$id;";
            if ($link->query($sql_update) === TRUE) {
                echo "<script>alert('Cập nhật thành công'); window.location.href='../index.php?pid=1008'</script>";
                exit();
            } else {
                echo "Lỗi: " . $link->error;
            }
        }
    } else {
        echo "<script>alert('Bạn không có quyền cập nhật'); window.location.href='../index.php?pid=1008'</script>";
        exit();
    }
}
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Chỉnh sửa</title>
</head>
<body style="margin:0%">
<div class="capnhat">
    <form action="capnhat.php" method="post">
        <table>
            <tr>
                <td colspan="4">
                    <h3>Chỉnh sửa thông tin</h3>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                </td>
            </tr>    
            <tr>
                <td nowrap="nowrap">Tên :</td>
                <td><input name="name" id="name" value="<?php echo $row['name']; ?>"></td>
            </tr>
            <tr>
                <td nowrap="nowrap">Địa chỉ email :</td>
                <td><input id="email" name="email" value="<?php echo $row['email']; ?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" value="Cập nhật thông tin" class="btn"></td>
            </tr>
        </table>
        <br>
        <a href="doipass.php" style="color:black;font-size:20px" ><b>Đổi mật khẩu</b></a>
    </form>
</div>
</body>
</html>
