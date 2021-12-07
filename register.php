<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, shrink-to-fit=no" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Furry Friend Finder | Register</title>
	<link rel="stylesheet" type="text/css" href="index.css">
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
						<!-- <li class="nav-item">
							<a class="nav-link" href="#"></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>

		<main class="flex-fill">
			<div class="row" style="padding-left: 20px;">
				<form method="post" action="register.php" name="signup-form" class="col-12">
					<div class="form-element">
						<label>Username</label>
						<i class="fa fa-user"></i>
						<input type="text" name="USERNAME" pattern="[a-zA-Z0-9]+" required />
					</div>
					<div class="form-element">
						<label>Password</label>
						<i class="fa fa-lock"></i>
						<input type="password" name="PASSWORD" required />
					</div>
					<div class="form-element">
						<label>Phone</label>
						<i class="fa fa-phone"></i>
						<input type="tel" name="NUMBER"/>
					</div>
					<button type="submit" name="Register" value="Register">Register</button>
				</form>
			</div>
		</main>

		<!-- Footer -->
		<footer class="navbar-light sticky-footer-wrapper">
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

	if (isset($_POST['Register'])) {
	    unset($_POST['Register']);
	    $db = get_connection();

	    $uName = $_POST['USERNAME'];
	    $pWord = $_POST['PASSWORD'];
	    $phone = $_POST['NUMBER'];

	    if (strlen($uName) == 0 || strlen($pWord) == 0) {
		    $_SESSION["error"] = "Username and/or password cannot be empty!";
		    header("Location: register.php");
	    }

	    $statement = $db->prepare("CALL RegisterUser(?, ?, ?)");
	    $statement->bind_param('ss', $uName, password_hash($pWord, PASSWORD_DEFAULT), $phone);

	    if ($statement->execute()) {
	        mysqli_stmt_bind_result($statement, $res_id, $res_error);

	        $statement->fetch();

	        // If user id is null, then something went wrong in registration
	        if (is_null($res_id)) {
	            $_SESSION["error"] = $res_error;
	            header("Location: register.php");
	        }
	        else {
	            echo "Registered!";     // User won't see this, header() right after redirects
	            header("Location: login.php");
	        }
	    }
	    else {
	        echo "Error getting result: " . mysqli_error($db);
	        die();
	    }
	}
	?>
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>