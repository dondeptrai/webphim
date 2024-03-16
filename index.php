<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MOVIE APP</title>
</head>

<body class="body">
    <header class="index">
        <?php include("view/logo.php"); ?>
        <div>
            <?php include("view/search.php"); ?>
            <a href ="index.php?pid=1008"><img src="img/img2.jpg" style="height:45px;width:45px;padding-right:10px"></a>
        </div>
    </header>
    <br>    
    <a href="index.php?pid=1011">Lịch sử xem phim</a>
    <div align="center">
        <?php include("view/theloai.php"); ?>
    </div>
    <?php
    if(isset($_GET['pid'])) {
        switch($_GET['pid']) {
            case 1001:
                include("view/view_page.php");
                break;
            case 1002:
                include("view/movie.php");
                break;
            case 1003:
                include("view/search_phim.php");
                break;
            case 1004:
                include("view/hi.php");
                break;
            case 1005:
                include("view/login.php");
                break;
            case 1006:
                include("view/logout.php");
                break;
            case 1007:
                include("view/register.php");
                break;
            case 1008:
                include("view/user.php");
                break;
            case 1009:
                include("view/pagination.php");
                break;
            case 1010:
                include("view/watchmovie.php");
                break;
            case 1011:
                include("view/lichsuxemphim.php");
                break;
            case 1012:
                include("view/capnhat.php");
                break;
            case 1013:
                include("view/doipass.php");
                break;
        }
    } else {
        include("view/pagination.php");
    }
    ?>
    <script src="script.js"></script>
</body>
</html>
