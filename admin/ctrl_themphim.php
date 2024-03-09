<?php
    $link = new mysqli("localhost","root", "", "webphim");
?>

<?php
    $thu_muc = "../img/";
    $ten_file = $thu_muc . $_FILES["hinhanh"]["name"];
    move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $ten_file);

    $id=$_POST["maPhim"];
    $maLP=$_POST["maTheloai"];
    $ten = $_POST["Ten"];
    $quocgia=$_POST["Quoc_Gia"];
    $phanloai=$_POST["Phan_Loai"];
    $dienvien=$_POST["Dien_Vien"];
    $nam=$_POST["Nam"];
    $thoiluong=$_POST["Thoi_Luong"];
    $danhgia=$_POST["Danh_Gia"];
    $thongtin = $_POST["Noi_Dung"];
    $ngonngu=$_POST["Ngon_Ngu"];
    $hinhanh = $_FILES["hinhanh"]["name"];
    $trailer=$_POST["trailerlink"];
    $linkphim = $_POST["linkphim"];
    $themsp_qr = "INSERT INTO phim (maPhim,maTheloai,Ten,Quoc_Gia,Phan_Loai,Dien_Vien,Nam,Thoi_Luong,Danh_Gia,Noi_Dung,Ngon_Ngu,hinhanh,trailerlink,linkphim) VALUES ('$id','$maLP','$ten', '$quocgia', '$phanloai','$dienvien','$nam','$thoiluong','$danhgia','$thongtin','$ngonngu','$hinhanh','$trailer','$linkphim')";

    if ($link->query($themsp_qr)){
        echo "<script>alert('Thêm phim thành công'); window.location.href='admin.php?pid=2';</script>";
    } else {
        echo "<script>alert('Thêm không thành công, kiểm tra lại! Lỗi: '); history.back();</script>";
    }
?>