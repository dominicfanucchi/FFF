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
			<a class="navbar-brand" href="index.php"><img id="logo" src="images/fourth_logo_round.png"></a>
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
						<a href="logout.php" class="btn btn-outline-success" role="button">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
	
	<!-- welcome employee -->
	<hr class="my-4">

	<main class="flex-fill">
	
	<h1>
	<?php

	require_once "config.php";

	if (isset($_SESSION["error"])) {
		echo $_SESSION["error"];
		unset($_SESSION["error"]);
		die();
	}

	if (isset($_SESSION['UserID'])) {
		echo "Welcome, " . $_SESSION["Username"];
		// Code to handle registered user interactions
	}
	else {
		header("Location: index.php");
	}
	
	?>
	</h1>	

	<!-- Shelter Nav -->
	<div class="dropdown">
		<button class="dropbtn">Shelters</button>
		<div class="dropdown-content">
		<a href="owlbearsrus.php">Owlbears R Us</a>
		<a href="chickensanon.php">Chickens Anonymous</a>
		<a href="shelturtles.php">Shelturtles</a>
		<a href="fuzzywuzzy.php">Fuzzy Wuzzy Wugglebears</a>
		<a href="labs2love.php">Labs 2 Love Rescue</a>
		<a href="hamsters.php">2Many Hamsters</a>
		<a href="dalmations.php">Dalmations May Cry</a>
		<a href="furrealfriends.php">Fur Real Friends</a>
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
	    $validation = $db->prepare("SELECT * FROM user WHERE username=?");
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
	                    $_SESSION["user_id"] = $res_id;
	                    $_SESSION["username"] = $res_user;

	                    header("Location: register.php");
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

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
