<?php include('partials/menu.php') ?>

<?php
    $movie_id = $_GET['movie_id'];
    $episode = $_GET['episode'];

    $sql = "SELECT * FROM eps_movie WHERE movie_id = $movie_id AND episode = $episode";
    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);
    $link = $row['link'];

?>

<div class="text-center mt-5 mb-3">
<?php

    $sql = "SELECT MIN(episode) AS min_eps FROM eps_movie WHERE movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);

    $sql2 = "SELECT MAX(episode) AS max_eps FROM eps_movie WHERE movie_id = $movie_id";
    $res2 = mysqli_query($conn, $sql2);

    $row = mysqli_fetch_assoc($res);
    $row2 = mysqli_fetch_assoc($res2);

    if($episode == $row['min_eps']){
        ?>
            <a class="bg-light rounded p-2" href="<?= SITEURL ?>selected-episode.php?movie_id=<?= $movie_id ?>&episode=<?= $episode+1 ?>">Next</a>
        <?php
    }else if($episode == $row2['max_eps']){
        ?>
            <a class="bg-light rounded p-2" href="<?= SITEURL ?>selected-episode.php?movie_id=<?= $movie_id ?>&episode=<?= $episode-1 ?>">Previous</a>
        <?php
    }else{
        ?>
            <a class="bg-light rounded p-2" href="<?= SITEURL ?>selected-episode.php?movie_id=<?= $movie_id ?>&episode=<?= $episode-1 ?>">Previous</a>
            <a class="bg-light rounded p-2" href="<?= SITEURL ?>selected-episode.php?movie_id=<?= $movie_id ?>&episode=<?= $episode+1 ?>">Next</a>
        <?php
    }

?>
    
    
</div>

<div class="container">
    <div class="embed-responsive embed-responsive-4by3">
        <iframe class="embed-responsive-item" width="100%" height="550" src="<?= $link ?>" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

