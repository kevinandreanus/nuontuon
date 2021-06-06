<?php include('../config/constants.php') ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Movie</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/1b71a3858f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">UPDATE MOVIE</h1>
        <hr>
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "SELECT * FROM movie WHERE movie_id = $id";
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);
                if($count == 1){
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['movie_name'];
                    $year = $row['movie_year'];
                    $current_image = $row['poster'];
                    $episode = $row['total_episode'];
                    $type = $row['type'];
                    $status = $row['status'];
                }
            }
        ?>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="title" value="<?= $title ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="text" class="form-control" name="year" value="<?= $year ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Current Poster</label>
                <?php 
                    if($current_image != ""){
                ?>
                    <img src="<?= SITEURL ?>images/movie/<?= $current_image ?>" width="120px">
                <?php
                    }else{
                        echo "<div class='error'>Poster Unavailable</div>";
                    }
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">New Poster</label>
                <input type="file" class="form-control" name="image"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Episode</label>
                <input type="text" class="form-control" name="episode" value="<?= $episode ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe</label>
                <select name="type" class="form-select">
                    <option <?php if($type == "TV Series"){echo "selected";} ?> value="TV Series">TV Series</option>
                    <option <?php if($type == "Movie"){echo "selected";} ?> value="Movie">Movie</option>
                    <option <?php if($type == "OVA"){echo "selected";} ?> value="OVA">OVA</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option <?php if($status == "Ongoing"){echo "selected";} ?> value="Ongoing">Ongoing</option>
                    <option <?php if($status == "Completed"){echo "selected";} ?> value="Completed">Completed</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Tambahkan">
            </form>

            <?php
                if(isset($_POST['submit'])){
                    $title = $_POST['title'];
                    $current_image = $_GET['image_name'];
                    $id = $_GET['id'];
                    $year = $_POST['year'];
                    $episode = $_POST['episode'];
                    $type = $_POST['type'];
                    $status = $_POST['status'];
                    $alt_name = $_POST['alt_name'];
                    $description = $_POST['description'];

                    if(isset($_FILES['image']['name'])){
                        $image_name = $_FILES['image']['name'];
                        if($image_name != ""){
                            $ext = end(explode('.', $image_name));
    
                            $image_name = "Movie_".rand(0000, 9999).'.'.$ext;
    
                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "../images/movie/".$image_name;
    
                            $upload = move_uploaded_file($source_path, $destination_path);
    
                            if($upload == false){
                                $_SESSION['upload'] = "<div class='text-danger'>Failed to Upload Poster</div>";
                                header('Location: '.SITEURL.'admin/manage-movie.php');
                                die();
                            }
    
                            if($current_image != ""){
                                $remove_path = "../images/movie/".$current_image;
                                $remove = unlink($remove_path);
    
                                if($remove == false){
                                    $_SESSION['failed-remove'] = "<div class='text-danger'>Failed to Remove Poster</div>";
                                    header('Location: '.SITEURL.'admin/manage-movie.php');
                                    die();
                                }
                            }
                            
                        }else{
                            $image_name = $current_image;
                        }
                    }else{
                        $image_name = $current_image;
                    }

                    $sql2 = "UPDATE movie SET 
                        movie_name = '$title',
                        movie_year = $year,
                        poster = '$image_name',
                        total_episode = $episode,
                        type = '$type',
                        alt_name = '$alt_name',
                        description = '$description',
                        status = '$status'
                        WHERE movie_id = $id
                    ";
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2 == true){
                        $_SESSION['update'] = "<div class='text-success'>Movie Berhasil Diupdate</div>";
                        header('Location: '.SITEURL.'admin/manage-movie.php');
                    }else{
                        $_SESSION['update'] = "<div class='text-danger'>Poster Failed to Update</div>";
                        header('Location: '.SITEURL.'admin/manage-movie.php');
                    }
                }
            ?>

        </div>
        
    </div>
</body>
</html>