<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="index.css">
	<title>Furry Friend Finder | Home</title>
</head>
<style>
	.dropbtn {
	background-color: #4CAF50;
	color: white;
	margin: 30px;
	padding: 16px;
	font-size: 16px;
	border: none;
	cursor: pointer;
	}

	.dropdown {
	position: relative;
	display: inline-block;
	}

	.dropdown-content {
	display: none;
	position: absolute;
	background-color: #f9f9f9;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
	}

	.dropdown-content a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
	}

	.dropdown-content a:hover {background-color: #f1f1f1}

	.dropdown:hover .dropdown-content {
	display: block;
	}

	.dropdown:hover .dropbtn {
	background-color: #3e8e41;
	}
</style>
<body>
	<div class="d-flex flex-column min-vh-100 sticky-footer-wrapper">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-md navbar-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="usersplash.php"><img id="logo" src="fourth_logo_round.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<h2><center>Furry Friend Finder</center></h2>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<!-- <li class="nav-item active">
						<a class="nav-link" href="login.php">Login</a>
					</li> -->
					<li class="nav-item"> 
						<button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#logoutModal">Logout</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<hr class="my-4">

	<main class="flex-fill">

	<!-- Logout Modal -->
	<div id="logoutModal" class="modal fade">
		<div class="modal-dialog modal-logout">
			<div class="modal-content">
				<div class="modal-body">
					<form action="usersplash.php" method="post">
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-block btn-lg" value="Logout" name="">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Dashboard -->
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4">Dashboard</h1>
			</div>
			<hr>
		</div>
	</div>

<!--Can add Potential Sidebar or just add clickable tabs on the side. Potentially a dropdown view -->

	<!-- User Menu -->
	<div class="dropdown">
		<button class="dropbtn">Menu</button>
		<div class="dropdown-content">
		<a href="tables.php">Find A Shelter</a>
		<a href="animals.php">View Animals</a>
	</div>
</div>
	<hr class="my-4">



	<!-- Connect -->
	<div class="container-fluid">
		<div class="row text-center padding">
			<div class="col-12">
				<h4>Connect with the Developers!</h4>
			</div>
			<div class="col-12 social padding">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="#"><i class="fa fa-youtube"></i></a>
			</div>	
		</div>
	</div>
	</main>

	<!-- Footer -->
	<footer class="navbar-light">
		<div class="container-fluid padding nope">
			<div class="row text-center">
				<div class="col-12">
					<hr class="light-100">
					<h5>&copy; Furry Friend Finder</h5>
				</div>
			</div>
		</div>
	</footer>
	</div>

	<!-- PHP -->
<?php

require_once "config.php";

if (isset($_SESSION["error"])) {
	echo $_SESSION["error"];
	unset($_SESSION["error"]);
	die();
}

?>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>