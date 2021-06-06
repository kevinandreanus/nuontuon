<?php
	include('config/constants.php');
	include('login-check.php');
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Selamat Datang - <?= $_SESSION['user'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<style>
		*{
			font-family: 'Poppins', sans-serif;
			 -webkit-user-select: none;
    		-moz-user-select: -moz-none;
    		-o-user-select: none;
    		user-select: none;
		}
		img {
  			-webkit-user-drag: none;
  			-moz-user-drag: none;
  			-o-user-drag: none;
  			user-drag: none;
		}
		img {
			pointer-events: none;
		}
		.movie_card{
			padding: 0 !important;
			width: 22rem;
			margin:14px; 
			border-radius: 10px;
			box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0 rgba(0, 0, 0, 0.19);
		}
		.movie_card img{
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
			height: 33rem;
		}
		.movie_info{
			color: #5e5c5c;
		}

		.movie_info i{
			font-size: 20px;
		}
		.card-title{
			width: 80%;
			height: 4rem;
		}
		.play_button{
			background-color: #ff3d49;
   			position: absolute;
			width: 60px;
			height: 60px;
			border-radius: 50%;
			right: 20px;
			bottom: 111px;
			font-size: 27px;
			padding-left: 21px;
			padding-top: 16px;
			color: #FFFFFF;
			cursor: pointer;
		}

		.credits{
			margin-top: 20px;
			margin-bottom: 20px;
			border-radius: 8px;
			border: 2px solid #8e24aa;
			font-size: 18px;
		}
		.credits .card-body{
			padding: 0;
		}
		.credits p{
			padding-top: 15px;
			padding-left: 18px;
		}
		.credits .card-body i{
			color: #8e24aa;
		}
	</style>

	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Meestakes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
	<div>
		<p class="text-danger text-center mt-4">WEBSITE BELUM SEPENUHNYA JADI</p>
	</div>

	<script src="../js/jquery.min.js"></script>
  	<script src="../js/popper.js"></script>
  	<script src="../js/bootstrap.min.js"></script>
  	<script src="../js/main.js"></script>
	<script src="../js/jquery.cookie.js"></script>