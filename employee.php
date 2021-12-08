<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, shrink-to-fit=no" />
     
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="index.css">
	<title>Furry Friend Finder | Employee</title>
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
						<a class="nav-link" href="prev_adoptions.php">Previous Adoptions</a>
					</li>
					<li class="nav-item">
						<a href="logout.php" class="btn btn-outline-success" role="button">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	
	<!-- welcome employee -->
	<hr class="my-4">

	<main class="flex-fill">

	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
	
	<h1>
	<?php

	require_once "config.php";

	if (isset($_SESSION["error"])) {
		echo $_SESSION["error"];
		unset($_SESSION["error"]);
		die();
	}

	if (isset($_SESSION['UserID'])) {
		echo "Welcome, " . $_SESSION["Username"] . ".";
		// Code to handle registered user interactions
	}
	else {
		header("Location: index.php");
	}
	
	?>
	</h1>	
			</div>
			<hr>
		</div>
	</div>

	<!-- PHP -->
	<?php

	$db = get_connection();
	$query = $db->prepare("SELECT Name FROM Shelter");
	$query->execute();

	$result = $query->get_result();
	$rows = [];

	while ($row = $result->fetch_assoc()) {
		$rows []= $row;
		$rowtext = "\n";

		foreach($row as $column) {
			$rowtext = $rowtext . "$column";
		}

		//echo "$rowtext <br>";
	}
	?>

	<form action="employee.php" method="POST">
		<label>Choose a Shelter:</label>
	
	<?php

	// Now let's build a select option dropdown from the rows
	echo "<select name='dropdown'>";

	foreach($rows as $row) {
		$rowid = $row['Name'];
		$rowdata = $row['Name'];
		echo "<option value='$rowid'>$rowdata</option>";
	}

	echo "</select>";
	?>
		<input type="submit">
	</form>

	<?php
	if (isset($_POST["something"])) {
		echo "You entered: " . $_POST['something'] . " <br>";
	}

	if (isset($_POST["dropdown"])) {
		for($i = 0; $i < count($rows); $i++) {
			if ($rows[$i]['Name'] == $_POST['dropdown']) {
				echo "You chose " . $_POST['dropdown'] . " <br>";
				//echo "$rowtext <br>"
			}
		}
	}	
	?>
	<?php
	include_once('config.php');

	$db = get_connection();
	$tableQuery = "select * from Shelter";
	$result = mysqli_query($db, $tableQuery);
	?>

	<table align="center" border="1px" style="width:800px; line-height: 30px;">
		<tr>
			<th colspan="5"><h2>Animal Shelters</h2></th>
		</tr>
		<tr>
			<th>Shelter ID</th>
			<th>Shelter Name</th>
			<th>Address</th>
			<th>City</th>
			<th>Phone #</th>
		</tr>
	<?php
		while($rows = mysqli_fetch_assoc($result)) {
	?>
			<tr>
				<td><?php echo $rows['ShelterID']; ?></td>
				<td><?php echo $rows['Name']; ?></td>
				<td><?php echo $rows['Address']; ?></td>
				<td><?php echo $rows['City']; ?></td>
				<td><?php echo $rows['PhoneNumber']; ?></td>
			</tr>		
	<?php	
		}
	?>
	</table>
	<hr class="my-4">
	<form name="my_form" method="post" action="employee.php">
		Select a User to delete: <input type="text" name="Username" placeholder="username"><br/>
		<input type="submit" name="btn_delete" value="delete user"/>
	</form>	

	<?php
	if (isset($_POST['btn_delete'])) {
		$db = get_connection();
		$deletion = $_POST['Username'];
		$sql = "CALL DeleteUser('$deletion')";
		$result = $db->query($sql);

		if ($deletion) {
			echo "User Deleted";
		}
	}
	?>

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
