<?php
    @include 'config.php';

    if(isset($_POST['dangky'])) {
        // Thực hiện xử lý khi người dùng ấn nút submit và điền đầy đủ thông tin
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);

        // Kiểm tra xem tài khoản đã tồn tại hay chưa
        $check_query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check_query);

        if(mysqli_num_rows($result) > 0) {
            echo 'Tài khoản đã tồn tại. Vui lòng chọn địa chỉ email khác.';
        } elseif($pass != $cpass) {
            echo 'Mật khẩu nhập lại không trùng khớp.';
        }else {
            // Nếu tài khoản chưa tồn tại, thực hiện thêm vào cơ sở dữ liệu
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";
            if (mysqli_query($conn, $sql)) {
                header('Location:../index.php');
            } else {
                echo 'Lỗi: ' . $conn->error;
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>ĐĂNG KÝ</title>
</head>
<body>
    <div class ="re">
        <form action="register.php" method="post">
            <h3 >ĐĂNG KÝ</h3>
            <input type="text" name="name" required placeholder="nhập tên của bạn">
            <input type="email" name="email" required placeholder="nhập email của bạn">
            <input type="password" name="password" required placeholder="nhập mật khẩu">
            <input type="password" name="cpassword" required placeholder="nhập lại mật khẩu">
            <input  type="submit" name="dangky" value="Đăng ký" class="btn">
            <p>Bạn đã có tài khoản? <a style="color: crimson;" href="login.php">Đăng nhập</a></p>
        </form>
    </div>
        

</body>
</html>