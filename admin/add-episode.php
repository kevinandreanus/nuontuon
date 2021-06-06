<?php include('../config/constants.php') ?>

<?php
    
    $movie_id = $_GET['id'];

    $sql = "SELECT * FROM movie WHERE movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);
    
    $title = $row['movie_name'];

    if($count == 1){
        $episode = $row['total_episode'];
    }

    $sql2 = "SELECT * FROM eps_movie WHERE movie_id = $movie_id";
    $res2 = mysqli_query($conn, $sql2);

    $row2 = mysqli_fetch_all($res2);
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Episode - <?=$title ?></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/1b71a3858f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>Anime Name: <?= $title ?></h2>
        <h4>Total Episode: <?= $episode ?></h4>
        <hr>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Episode</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

        <?php
            $sn = 1;
            $eps = 1;
            $movie_id = $row['movie_id'];
            
            

            for($i = 0; $i < $episode; $i++){
                
                ?>
                <tr>
                    <th scope="row"><?= $sn++ ?></th>
                    <td>
                        <?php 
                            // Tambahin isset() buat benerin undefined offset array
                            if(isset($row2[$i][2]) == $i+1){
                                echo $row2[$i][3];
                            }else{
                                false;
                            }
                        ?>
                    </td>
                    <td>
                        <a href="<?= SITEURL ?>admin/link-episode.php?movie_id=<?= $movie_id ?>&episode=<?= $eps++ ?>">Add Details</a>
                    </td>
                </tr>
                <?php
            }
            
        ?>
     
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>