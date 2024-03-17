<?php
    $link = new mysqli("localhost", "root", "", "webphim");
    $sqlMovies = "SELECT * FROM phim";
    $resultMovies = $link->query($sqlMovies);
?>
<br>
<h1 align="center" style="color: white;"><b>Quản lý bình luận</b></h1>
<div class="cmt">
    <form method="" action="">
        <?php while ($movie = $resultMovies->fetch_assoc()) { ?>
            <h2><?php echo $movie['Ten']; ?></h2>
            <?php
                $movieId = $movie['maPhim'];
                $sqlComments = "SELECT comment.*, users.name AS username, comment.id_user AS id_user FROM comment 
                                INNER JOIN users ON comment.id_user = users.id
                                WHERE comment.id_product = $movieId";
                $resultComments = $link->query($sqlComments);
                
                if ($resultComments->num_rows > 0) {
            ?>
                    <table >
                        <tr style="font-size: small;">
                            <th style="width:55px; height: 40px;">ID_cmt</th>
                            <th style="width:55px; height: 40px;">ID_user</th>
                            <th style="width:71px; height: 40px;">Username</th>
                            <th style="width:200; height: 40px;">Bình luận</th>
                            <th style="width:139px; height: 40px;">Thời gian</th>
                            <th style="width:70px; height: 40px;">Hành động</th>
                        </tr>
                        <?php while ($comment = $resultComments->fetch_assoc()) { ?>
                            <tr align="center">
                                <td><?php echo $comment["id_comment"]; ?></td>
                                <td><?php echo $comment["id_user"]; ?></td>
                                <td><?php echo $comment["username"]; ?></td>
                                <td><?php echo $comment["article"]; ?></td>
                                <td><?php echo $comment["date_comment"]; ?></td>
                                <td><a onclick="return confirm('Bạn có muốn xoá bình luận này không?')" href="admin.php?pid=9&id=<?php echo $comment['id_comment']; ?>">Xóa</a></td>
                            </tr>
                        <?php  
                        } ?>
                    </table>
                <?php 
                    }else { 
                        echo "Không có bình luận nào cho phim này.";
                    }
                }
                ?>
    </form>
    </div>
</div>
