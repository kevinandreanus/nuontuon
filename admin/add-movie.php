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
        <h1 class="mt-5">ADD MOVIE</h1>
        <?php
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <hr>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label class="form-label">Judul Alternatif</label>
                <input type="text" class="form-control" name="alt_name">
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" class="form-control" name="description">
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="text" class="form-control" name="year">
            </div>
            <div class="mb-3">
                <label class="form-label">Poster</label>
                <input type="file" class="form-control" name="image"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Episode</label>
                <input type="text" class="form-control" name="episode">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe</label>
                <select name="type" class="form-select">
                    <option value="TV Series">TV Series</option>
                    <option value="Movie">Movie</option>
                    <option value="OVA">OVA</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Tambahkan">
            </form>

            <?php
                if(isset($_POST['submit'])){
                    $title = $_POST['title'];
                    $year = $_POST['year'];
                    $episode = $_POST['episode'];
                    $status = $_POST['status'];
                    $type = $_POST['type'];
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
                                $_SESSION['upload'] = "<div class='text-danger'>Failed to Upload Image</div>";
                                header('Location: '.SITEURL.'admin/add-movie.php');
                                die();
                            }
                        }
                    }else{
                        $image_name = "";
                    }

                    $sql = "INSERT INTO movie SET
                        movie_name = '$title',
                        movie_year = $year,
                        poster = '$image_name',
                        total_episode = $episode,
                        type = '$type',
                        alt_name = '$alt_name',
                        description = '$description',
                        status = '$status'
                    ";

                    $res = mysqli_query($conn, $sql);

                    if($res == true){
                        $_SESSION['add'] = "<div class='text-success'>Movie Berhasil Ditambahkan</div>";
                        header("Location: ".SITEURL."admin/manage-movie.php");
                    }else{
                        $_SESSION['add'] = "<div class='text-danger'>Movie Gagal Ditambahkan</div>";
                        header("Location: ".SITEURL."admin/add-movie.php");
                    }
                }
            ?>

        </div>
        
    </div>
</body>
</html>