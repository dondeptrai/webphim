<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <title>MOVIE APP</title>
</head>

<body class="body">
    <header class="index">
        <?php include("view/logo.php"); ?>
        <div class="both">
            <?php include("view/search.php"); ?>
            <?php include("view/user.php")?>
        </div>
    </header>
    <br>    
    <div align="center">
        <?php include("view/theloai.php"); ?>
         <?php
   if(!isset($_GET['pid'])) {
    include("view/phimnoibat.php");
   }
  ?>
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
            // case 1005:
            //     include("view/login.php");
            //     break;
            case 1006:
                include("view/logout.php");
                break;
            // case 1007:
            //     include("view/register.php");
            //     break;
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
            case 1014:
                include("view/bole.php");
                break;
        }
    } else {
        include("view/pagination.php");
    }
    ?>
    <script src="script.js"></script>
</body>
</html>
