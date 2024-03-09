<?php
	if(isset($_POST["search"])){
		$tukhoa=$_POST["search"];
		$link = new mysqli("localhost","root","","webphim");
		$sql = "SELECT * FROM phim WHERE Ten LIKE '%$tukhoa%'";
		$resul=$link->query($sql);
		if($resul->num_rows>0){
			while($row=$resul->fetch_assoc()){
			?>
				<div class="main" style="float:left">
					<div class="movie">
					<a href="index.php?pid=1001&id=<?php echo $row["maPhim"]?>" style="text-decoration:none;color:black">
						<img src="img/<?php echo $row["hinhanh"]?> "style="width:220px;height:310px">
						<br>
						<div class="movie-info">
						<span><b><?php echo $row["Ten"]?></b></span>
						<span class="green"><?php echo $row["Danh_Gia"]?></span>
						</div>
						<span class="overview"><?php echo $row["Noi_Dung"]?></span>
					</div>
    			</div>	
			<?php
			}
		}else echo "Không tìm thấy !";
	}
?>