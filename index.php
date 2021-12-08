<?php
session_start();
?>

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
<body>
	<div class="d-flex flex-column min-vh-100 sticky-footer-wrapper">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-md navbar-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"><img id="logo" src="images/fourth_logo_round.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<h2><center>Furry Friend Finder</center></h2>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="tables.php">Tables</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="register.php">Register with Us!</a>
					</li>
					<li class="nav-item"> 
						<button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#loginModal">Login</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<hr class="my-4">

	<main class="flex-fill">
	<!-- Login Modal -->
	<div id="loginModal" class="modal fade">
		<div class="modal-dialog modal-login">
			<div class="modal-content">
				<div class="modal-header">				
					<h4 class="modal-title">Member Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<form action="index.php" method="post">
						<div class="form-group">
							<i class="fa fa-user"></i>
							<input type="text" class="form-control" placeholder="Username" required="required" name="USERNAME">
						</div>
						<div class="form-group">
							<i class="fa fa-lock"></i>
							<input type="password" class="form-control" placeholder="Password" required="required" name="PASSWORD">					
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-block btn-lg" value="Login" name="Login">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a href="#">Forgot Password?</a>
				</div>
			</div>
		</div>
	</div>

	<!-- PHP -->
	<?php

	require_once "config.php";

	if (isset($_SESSION["error"])) {
	    echo $_SESSION["error"];
	    unset($_SESSION["error"]);
	    die();
	}

	// If true, user is trying to log in
	if (isset($_POST['Login'])) {
	    unset($_POST['Login']);
	    $db = get_connection();
	    $username = $_POST['USERNAME'];
	    $password = $_POST['PASSWORD'];
	    $validation = $db->prepare("SELECT UserID, Username, Password FROM User WHERE Username=?");
	    $validation->bind_param('s', $username);
	    if ($validation->execute()) {
	        //if ($valid_result = $validation->get_result()) {
	        if (mysqli_stmt_bind_result($validation, $res_id, $res_user, $res_password)) {

	            $result_count = 0;

	            while ($validation->fetch()) {
	                $result_count++;
	            }

	            if ($result_count == 0) {
	                $_SESSION["error"] = "Error: the username and/or password combination was not found";
	                header("Location: index.php");
	            }
	            else {
	                // Verify user password
	                //$resx = $valid_result->fetch_array(MYSQLI_ASSOC);
	                $isGood = password_verify($password, $res_password);
	                
	                if ($isGood) {
	                    $_SESSION["UserID"] = $res_id;
	                    $_SESSION["Username"] = $res_user;

	                    header("Location: usersplash.php");
	                }
	                else {
	                    $_SESSION["error"] = "Error: the username and/or password combination was not found";
	                    header("Location: index.php");
	                }
	            }
	        }
	        else {
	            echo "Error getting result: " . mysqli_error($db);
	            die();
	        }
	    }
	    else {
	        echo "Error executing query: " . mysqli_error($db);
	        die();
	    }
	}

	?>

	<div id="auth_result"></div>

	<!-- Meet The Animals -->
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4">Meet the Animals!</h1>
			</div>
			<hr>
		</div>
	</div>

	<!-- Cards -->
	<!-- <div class="container-fluid padding">
		<div class="row row-cols-6 row-cols-md-2 padding text-center card-deck">
			<div class="col">
				<div class="card">
					<img class="card-imd-top" src="images/dog.png">
					<div class="card-body">
						<h4 class="card-title">Dog</h4>
						<p class="card-text">Some Text</p>
						<a href="#" class="btn btn-outline-secondary">See Profile</a>
					</div>
				</div>
			</div>
			<div class=" col">
				<div class="card" >
					<img class="card-imd-top" src="images/dog.png">
					<div class="card-body">
						<h4 class="card-title">Dog</h4>
						<p class="card-text">Some Text</p>
						<a href="#" class="btn btn-outline-secondary">See Profile</a>
					</div>
				</div>
			</div>
			<div class=" col">
				<div class="card" >
					<img class="card-imd-top" src="images/dog.png" id="animal">
					<div class="card-body">
						<h4 class="card-title">Dog</h4>
						<p class="card-text">Some Text</p>
						<a href="#" class="btn btn-outline-secondary">See Profile</a>
					</div>
				</div>
			</div>
			<div class=" col">
				<div class="card">
					<img class="card-imd-top" src="images/cat.jpg">
					<div class="card-body">
						<h4 class="card-title">Cat</h4>
						<p class="card-text">Some Text</p>
						<a href="#" class="btn btn-outline-secondary">See Profile</a>
					</div>
				</div>
			</div>
			<div class=" col">
				<div class="card">
					<img class="card-imd-top" src="images/cat.jpg" id="animal">
					<div class="card-body">
						<h4 class="card-title">Kitty</h4>
						<p class="card-text">Some Text</p>
						<a href="#" class="btn btn-outline-secondary">See Profile</a>
					</div>
				</div>
			</div>
			<div class=" col">
				<div class="card">
					<img class="card-imd-top" src="images/cat.jpg">
					<div class="card-body">
						<h4 class="card-title">Cat</h4>
						<p class="card-text">Some Text</p>
						<a href="#" class="btn btn-outline-secondary">See Profile</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->

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


	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>