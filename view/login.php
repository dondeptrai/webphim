<?php   
    session_start();
    @include 'config.php';
    if(isset($_POST['dangnhap'])) {
        // Thực hiện xử lý khi người dùng ấn nút submit và điền đầy đủ thông tin
        $email = $_POST['email'];
        $pass = md5($_POST['password']);

        // Kiểm tra xem tài khoản đã tồn tại hay chưa
        $check_query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
        $result = mysqli_query($conn, $check_query);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);

            // Lưu thông tin người dùng vào session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_type'] = $row['user_type'];

            // Chuyển hướng đến trang phù hợp dựa trên loại người dùng
            if ($row['user_type'] == 'admin'){
                $_SESSION['user_name'] = $row['name'];
                header('location: ../admin.php');
            } elseif ($row['user_type'] == 'user'){
                $_SESSION['user_name'] = $row['name'];
                header('location:../index.php');
            }
        } else {
            echo "<script>alert('Email hoặc mật khẩu không đúng. Vui lòng thử lại.'); window.location.href='../index.php'</script>";
        }
    }
   
?>
