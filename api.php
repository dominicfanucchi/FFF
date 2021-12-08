<?php

require_once "api_config.php";

if (isset($_POST['Register'])) {
	header('Content-type: application/json');

	unset($_POST['Register']);
	$db = get_connection();
	$username = $_POST['USERNAME'];
	$password = $_POST['PASSWORD'];
	$number = $_POST['NUMBER'];
	$hash = password_hash($password, PASSWORD_DEFAULT);
	if (strlen($username) == 0 || strlen($password) == 0 || strlen($number) == 0) {
		echo json_encode(array("error" => "Username and/or Password and/or Number cannot be empty!"));
		return;
	}

	$statement = $db->prepare("CALL RegisterUser(?,?,?)");
	$statement->bind_param('ss', $username, $hash, $number);

	if ($statement->execute()) {
		mysqli_stmt_bind_result($statement, $res_id, $res_error);

		$statement->fetch();

		if (is_null($res_id)) {
			echo json_encode(array("error" => $res_error));
			return;
		}
		else {
			echo json_encode(array("UserID" => $res_id));
			return;
		}
	}
	else {
		echo json_encode(array("error" => mysqli_error($db)));
		return;
	}
}
else if (isset($_POST["Login"])) {
	header('Content-type: application/json');
	unset($_POST['Login']);
	$db = get_connection();
	$username = $_POST['USERNAME'];
	$password = $_POST['PASSWORD'];
	$validation = $db->prepare("SELECT * FROM user WHERE username=?");
	$validation->bind_param('s', $username);
	$validation->execute();
	mysqli_stmt_bind_result($validation, $res_id, $res_user, $res_password);

	$genericErrorMsg = "Invalid username and/or password";

	if ($validation->fetch() && password_verify($password, $res_password)) {
		session_start();

		$_SESSION["UserID"] = $res_id;
		$_SESSION["Username"] = $res_user;

		$validation->close(); 
	}
	else {
		echo json_encode(array("error" => $genericErrorMsg));
	}
}
/*else if (isset($_POST["Logout"])) {
	header('Content-type: application/json');
	unset($_POST['Logout']);

	if (!isset($_POST["session_id"]) || !isset($_POST["UserID"])) {
		echo json_encode(array("error" => "no session_id or UserID"));
		return;
	}

	session_id($_POST["session_id"]);
	session_start();

	if ($_POST["UserID"] != $_SESSION["UserID"]) {
		echo json_encode(array("message" => "User logged out"));
		return;
	}

	session_destroy();
	echo json_encode(array("message" => "User logged out"));
}*/

else {
	header("Location: index.php");
}

?>