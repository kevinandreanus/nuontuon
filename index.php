<?php include('partials/menu.php') ?>

<div class="container mt-5 mb-5">
	<div class="row justify-content-center">

<?php
	$sql = "SELECT * FROM movie";
    $res = mysqli_query($conn, $sql);

    $user = $_SESSION['user'];

	while($row = mysqli_fetch_assoc($res)){
        $title = $row['movie_name'];
        $image_name = $row['poster'];
        $movie_id = $row['movie_id'];
		$year = $row['movie_year'];
        $type = $row['type'];
		$status = $row['status'];
		$description = $row['description'];
		$alt_name = $row['alt_name'];
		?>
			
		<?php
			if($image_name != ""){
		?>
			<style>
				.notify-badge{
					position: absolute;
					background: black;
					height:2rem;
					top: 0%;
					right:0%;
					width:30%;
					border-radius: 5px;
					text-align: center;
					line-height: 2rem;;
					font-size: 1rem;
					color:white;
				}
			</style>
			<div class="card movie_card">
			<?php
				if($description != ""){
					?>
					<span class="notify-badge"><?= $description ?></span>
					<?php
				}
			?>
			
			<a href="<?= SITEURL ?>episode-select.php?movie_id=<?= $movie_id ?>&type=<?=$type ?>"><img src="<?= SITEURL ?>images/movie/<?= $image_name ?>" class="card-img-top" alt="..."></a>
		<?php
			}else{
				echo "<div class='error'>Poster Unavailable</div>";
			}
		?>
			<div class="card-body">
			<a href="<?= SITEURL ?>episode-select.php?movie_id=<?= $movie_id ?>&type=<?=$type ?>"><i class="fas fa-play play_button" data-toggle="tooltip" data-placement="bottom" title="Nonton">
		  	</i></a>
		    <h5 class="card-title"><?= $title ?></h5>
		   		<span class="movie_info"><?= $year ?></span>
				<?php
					if($status == 'Ongoing'){
						?>
						<span class="movie_info float-right badge badge-pill badge-primary p-2" style="color: white;"><?= $status ?></span>
						<?php
					}else{
						?>
							<span class="movie_info float-right badge badge-pill badge-success p-2" style="color: white;"><?= $status ?></span>
						<?php
					}
				?>
		  	</div>
		</div>
		<?php
	}
?>
	</div>

</div>

	<script>
		var visited = localStorage.getItem('visited');
		if (!visited) {
		alert("Selamat Datang <?= $_SESSION['user'] ?>, Website ini masih sangat baru dan sedang dalam tahap Pengembangan.");
		localStorage.setItem('visited', true);
		}
	</script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script>
		$(function () {
  		$('[data-toggle="tooltip"]').tooltip()
	})
	</script>

<?php include('partials/footer.php') ?>

</html>