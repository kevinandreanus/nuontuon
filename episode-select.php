<?php include('partials/menu.php') ?>

<?php

    $type = $_GET['type'];
    $movie_id = $_GET['movie_id'];

    $sql = "SELECT * FROM eps_movie WHERE movie_id = $movie_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($res);

    $sql2 = "SELECT * FROM movie WHERE movie_id = $movie_id";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $episode = $row2['total_episode'];

    if($type == 'Movie'){
        ?>
        <div class="container">
            <div class="embed-responsive embed-responsive-4by3">
                <iframe class="embed-responsive-item" width="100%" height="550" src="<?= $link ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <?php
    }else{
        ?>
        <div class="mt-5 mb-5">
            <table class="table table-hover table-sm m-auto" style="width: 50%;">
                <thead>
                    <tr>
                    <th scope="col">Episode</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php


                    for($i = 0; $i < count($row); $i++){
                        
                        ?>
                        <tr>
                            <th scope="row"><?= $row[$i][2] ?></th>
                            <td>
                                <a href="<?= SITEURL ?>selected-episode.php?movie_id=<?= $movie_id ?>&episode=<?= $row[$i][2] ?>">Nonton</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    }

?>



<?php include('partials/footer.php') ?>