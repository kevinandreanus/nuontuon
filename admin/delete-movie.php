<?php include('../config/constants.php') ?>

<?php
    if(isset($_GET['id']) && isset($_GET['image_name'])){
        // echo "Get Value and ID";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ""){
            $path = "../images/movie/".$image_name;
            $remove = unlink($path);
        }
        $sql = "DELETE FROM movie WHERE movie_id = $id";
        $res = mysqli_query($conn, $sql);

        if($res == true){
            $_SESSION['delete'] = "<div class='text-success'>Movie Berhasil dihapus</div>";
            header('Location: '.SITEURL.'admin/manage-movie.php');
        }else{
            $_SESSION['delete'] = "<div class='text-danger'>Category Failed to Delete</div>";
            header('Location: '.SITEURL.'admin/add-movie.php');
        }
    }else{  
        header('Location: '.SITEURL.'admin/manage-movie.php');
    }
?>