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
						<!-- <li class="nav-item active">
							<a class="nav-link" href="#"></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>

		<main class="flex-fill">
			<div class="row" style="padding-left: 20px;">

			<form action="login.php" method="post">
				<div class="form-group">
					<i class="fa fa-user"></i>
					<input type="text" class="form-control" placeholder="Username" name="USERNAME">
				</div>
				<div class="form-group">
					<i class="fa fa-lock"></i>
					<input type="password" class="form-control" placeholder="Password" name="PASSWORD">					
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary btn-block btn-lg" value="Login" name="Login">
				</div>
			</form>

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
	                header("Location: login.php");
	            }
	            else {
	                // Verify user password
	                //$resx = $valid_result->fetch_array(MYSQLI_ASSOC);
	                $isGood = password_verify($password, $res_password);
	                
	                if ($isGood) {
	                    $_SESSION["UserID"] = $res_id;
	                    $_SESSION["Username"] = $res_user;

	                    header("Location: index.php");
	                }
	                else {
	                    $_SESSION["error"] = "Error: the username and/or password combination was not found";
	                    header("Location: login.php");
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
	
	
 
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>



