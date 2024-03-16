<?php
$id = $_GET['id'];
$link = new mysqli("localhost", "root", "", "webphim");
if (isset($_POST["save"])) {


    $uID = $link->real_escape_string($_POST['uID']);
    $id_product = $link->real_escape_string($_POST['id_product']);
    $ratedIndex = $link->real_escape_string($_POST['ratedIndex']);

    if (!$uID) {
        $link->query(query: "INSERT INTO ratings (rating,id_product) VALUES ('$ratedIndex','$id_product')");
        $sql = $link->query(query: "SELECT id FROM ratings ORDER BY id DESC LIMIT 1");
        $uData = $sql->fetch_assoc();
        $uID = $uData["id"];
    } else
        $link->query(query: "UPDATE ratings SET rating='$ratedIndex' WHERE id='$uID'");

    exit(json_encode(array('id' => $uID)));
}
$sql = $link -> query(query:"SELECT AVG(rating) AS avg FROM ratings WHERE id_product='$id'");
$result=$sql->fetch_array();
$avg = $result['avg'];
?>

<section style="display: flex;">
    <div class="green"><h2><?php echo round($avg, precision:2) ?></h2></div>
    <div align='center' style="padding:25px">       
        <i class="fa fa-star" data-index="1"></i>
        <i class="fa fa-star" data-index="2"></i>
        <i class="fa fa-star" data-index="3"></i>
        <i class="fa fa-star" data-index="4"></i>
        <i class="fa fa-star" data-index="5"></i>
        <i class="fa fa-star" data-index="6"></i>
        <i class="fa fa-star" data-index="7"></i>
        <i class="fa fa-star" data-index="8"></i>
        <i class="fa fa-star" data-index="9"></i>
        <i class="fa fa-star" data-index="10"></i>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        var ratedIndex = 0,
            uID = 0,
            id_product = <?php echo $id?>;
        $(document).ready(function() {
            resetStarColors();

            if (localStorage.getItem('ratedIndex') != null) {
                setStars(parseInt(localStorage.getItem('ratedIndex')));
                uID = localStorage.getItem('uId');
            }

            $('.fa-star').on('click', function() {
                alert("Thanks for yours feedback");
                window.location.reload();
                ratedIndex = parseInt($(this).data('index'));
                localStorage.setItem('ratedIndex', ratedIndex);
                saveToTheDB();             
            });

            $('.fa-star').mouseover(function() {
                resetStarColors();

                var currentIndex = parseInt($(this).data('index'));

                setStars(currentIndex);
            });

            $('.fa-star').mouseleave(function() {
                resetStarColors();

                if (ratedIndex != 0)
                    setStars(ratedIndex);

            });
        });

        function saveToTheDB() {
            $.ajax({
                url: "view/ratings.php",
                method: "POST",
                dataType: 'json',
                data: {
                    save: 1,
                    uID: uID,
                    id_product: id_product,
                    ratedIndex: ratedIndex
                },
                success: function(r) {
                    uID = r.id;
                    localStorage.setItem('uID', uID);
                }
            });
        }

        function setStars(max) {
            for (var i = 0; i < max; i++) {
                $('.fa-star:eq(' + i + ')').css('color', '#FFCC36');
            }
        };

        function resetStarColors() {
            $('.fa-star').css('color', '#ccc')
        }
    </script>
</section>