<?php 
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message'] ="<div class='error'>Please Login First</div>";
        header("Location:".SITEURL."login.php");
    }
?>