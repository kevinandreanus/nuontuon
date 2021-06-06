<?php include('../config/constants.php') ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Movie</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/1b71a3858f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">MANAGE MOVIE</h1>
        <hr>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['failed-remove'])){
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['eps_link'])){
                echo $_SESSION['eps_link'];
                unset($_SESSION['eps_link']);
            }
        ?>
        <a href="<?= SITEURL ?>admin/add-movie.php" class="btn btn-primary mb-3">Add Movie</a>
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">No.</th>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Poster</th>
                <th scope="col">Year</th>
                <th scope="col">Total Episode</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $sql = "SELECT * FROM movie";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn = 1;

                if($count > 0){
                    // Ada data movie di database
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['movie_id'];
                        $title = $row['movie_name'];
                        $year = $row['movie_year'];
                        $image_name = $row['poster'];
                        $episode = $row['total_episode'];
                        $status = $row['status'];
                        $type = $row['type'];

                        ?>
                        <tr>
                            <th scope="row"><?= $sn++ ?></th>
                            <td><?= $id ?></td>
                            <td><?= $title ?></td>
                            <td>
                            <?php 
                                if($image_name != ""){
                            ?>
                                <img src="<?= SITEURL ?>images/movie/<?= $image_name ?>" width="120px">
                            <?php
                                }else{
                                    echo "<div class='error'>Poster Unavailable</div>";
                                }
                            ?>
                            </td>
                            <td><?= $year ?></td>
                            <td><?= $episode ?></td>
                            <td><?= $type ?></td>
                            <td><?= $status ?></td>
                            
                            <td>
                                <a href="<?= SITEURL ?>admin/update-movie.php?id=<?= $id ?>&image_name=<?= $image_name ?>" class="btn btn-secondary btn-sm">Update Movie</a> 
                                <a href="<?= SITEURL ?>admin/delete-movie.php?id=<?= $id ?>&image_name=<?= $image_name ?>" class="btn btn-danger btn-sm">Delete Movie</a>
                                <a href="<?= SITEURL ?>admin/add-episode.php?id=<?= $id ?>" class="btn btn-info btn-sm">Episode</a>
                            </td>
                        </tr>
                        <?php
                    }
                    
                }else{
                    // Ga ada data movie di database
                    echo "<tr><td colspan='9' class='text-danger'>Belum ada Movie</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>