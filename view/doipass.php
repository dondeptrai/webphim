<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
    exit();
}

$link = new mysqli("localhost", "root", "", "webphim");
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id=$user_id";
$query = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST["submit"])) {
    // Lấy thông tin từ form
    $matkhaucu = md5($_POST["matkhaucu"]);
    $matkhaumoi = $_POST["matkhaumoi"];
    $nhaplai =$_POST["nhaplai"];
    
    // Ktra mật khẩu cũ
    $sql1 = "SELECT password FROM users WHERE id = $user_id";
    $query1 = mysqli_query($link, $sql1);
    $row1 = mysqli_fetch_assoc($query1);
    $stored1 = $row1['password'];
    
    // Ktra mật khẩu cũ 
    if($matkhaucu === $stored1) {
        // Ktra mật khẩu mới và nhập lại mật khẩu
        if($matkhaumoi == $nhaplai) {
            // Mã hóa mật khẩu mới
            $hashed_password = md5($matkhaumoi); 
            
            // Cập nhật mật khẩu mới vào csdl
            $sql_update = "UPDATE users SET password='$hashed_password' WHERE id =$user_id";
            if ($link->query($sql_update) === TRUE) {
                echo "<script>alert('Đổi mật khẩu thành công'); window.location.href='../index.php'</script>";
                exit();
            } else {
                echo "Lỗi: " . $link->error;
            }
        } else {
            echo "<script>alert('Mật khẩu mới không khớp. Vui lòng nhập lại.'); window.location.href='doipass.php'</script>";
            exit();
        }
    } else {
        echo "<script>alert('Mật khẩu cũ không đúng. Vui lòng thử lại.'); window.location.href='doipass.php'</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Đổi mật khẩu</title>
</head>
<body style="margin:0%">
<div class="pass">
    <form method="post" action="">

        <h3>Đổi mật khẩu</h3>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <table>
            <tr>
                <td nowrap="nowrap">Tên đăng nhập</td>
                <td><input name="name" id="name" value="<?php echo $row['name']; ?>" disabled></td>
            </tr>
            <tr>
                <td nowrap="nowrap">Mật khẩu cũ</td>
                <td><input type="password" id="matkhaucu" name="matkhaucu" value=""></td>
            </tr>
            <tr>
                <td nowrap="nowrap">Mật khẩu mới</td>
                <td><input type="password" id="matkhaumoi" name="matkhaumoi" value=""></td>
            </tr>
            <tr>
                <td nowrap="nowrap">Nhập lại mật khẩu mới</td>
                <td><input type="password" id="nhaplai" name="nhaplai" value=""></td>
            </tr>
        </table>
        <br>
        <br>
        <input type="submit" name="submit" value="Lưu" class="btn">

    </form>
</div>
</body>
</html>
