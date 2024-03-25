<div class="container">
    <h2 class="mt-5 mb-3 text-light">Leave a Comment</h2>
    <form action="" method="POST">
        <?php
            if(isset($_SESSION['user_id'])){
                echo '<div class="mb-3">
                        <label for="comment" class="form-label">Your Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Enter your comment"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" name="cmt-btn">Submit</button>';
            } else {
                echo '<div class="mb-3">
                        <label for="comment" class="form-label">Your Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="BẠN PHẢI ĐĂNG NHẬP MỚI CÓ THỂ BÌNH LUẬN!" disabled></textarea>
                      </div>';
            }
        ?>
    </form>
    <ul class="list-group mt-5">
    <?php
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                if(isset($_SESSION['user_id'])){
                    if($row2['id'] == $_SESSION['user_id']){
                        echo '<li class="list-group-item d-flex justify-content-between">
                                <h3 class="comment-name">'.$row2['name'].'</h3>
                                <h3 class="comment-article">'.$row2['article'].'</h3>
                                <h3 class="comment-date">'.$row2['date_comment'].'</h3>
                                <a href="index.php?pid=1010&id='.$_GET['id'].'&del='.$row2['id_comment'].'">Xóa</a>
                              </li>';
                    } else {
                        echo '<li class="list-group-item d-flex justify-content-between">
                                <h3 class="comment-name">'.$row2['name'].'</h3>
                                <h3 class="comment-article">'.$row2['article'].'</h3>
                                <h3 class="comment-date">'.$row2['date_comment'].'</h3>
                              </li>';
                    }
                }
            }
        }
    ?>
    </ul>
</div>
