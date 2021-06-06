<?php include('../config/constants.php') ?>

<?php
    $movie_id = $_GET['movie_id'];
    $episode = $_GET['episode'];
    
    $sql = "SELECT * FROM movie WHERE movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    if($count == 1){
        $title = $row['movie_name'];
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Link</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/1b71a3858f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-4">
        <h2>Anime Name: <?= $title ?></h2>
        <h4>Episode: <?= $episode ?></h4>
        <hr>
        <div class="container">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text" name="link" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="6"></textarea>
                </div>
                <input type="submit" class="btn btn-secondary" value="Next" name="next">
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>

            <?php

                if(isset($_POST['next'])){
                    $link = $_POST['link'];
                    $description = $_POST['description'];
                    $next_eps = $episode + 1;

                    $sql2 = "INSERT INTO eps_movie SET
                        movie_id = $movie_id,
                        episode = $episode,
                        link = '$link',
                        description = '$description'
                    ";
                    $res2 = mysqli_query($conn, $sql2);
                    if($res == true){
                        $_SESSION['eps_link'] = "<div class='text-success'>Berhasil Menambahkan Link</div>";
                        header("Location: ".SITEURL."admin/link-episode.php?movie_id=".$movie_id."&episode=".$next_eps);
                    }else{
                        $_SESSION['eps_link'] = "<div class='text-danger'>Gagal Menambahkan Link</div>";
                        header('Location: '.SITEURL.'admin/manage-movie.php');
                    }
                }

                if(isset($_POST['submit'])){
                    $link = $_POST['link'];
                    $description = $_POST['description'];

                    $sql2 = "INSERT INTO eps_movie SET
                        movie_id = $movie_id,
                        episode = $episode,
                        link = '$link',
                        description = '$description'
                    ";
                    $res2 = mysqli_query($conn, $sql2);
                    if($res == true){
                        $_SESSION['eps_link'] = "<div class='text-success'>Berhasil Menambahkan Link</div>";
                        header("Location: ".SITEURL."admin/add-episode.php?id=".$movie_id);
                    }else{
                        $_SESSION['eps_link'] = "<div class='text-danger'>Gagal Menambahkan Link</div>";
                        header('Location: '.SITEURL.'admin/manage-movie.php');
                    }
                }

            ?>

        </div>
</body>
</html>