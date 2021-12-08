<?php

date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set("log_errors", 1);
ini_set("display_errors", 1);
ini_set("error_log", "/home/dfanucchi/php_errors.log");
ini_set('session.cookie_httponly', 1);

function get_connection() {
	static $connection;

	if (!isset($connection)) {
		$configPath = "/home/stu/dfanucchi/.db-config.ini";

		if (!file_exists($configPath)) {
			die("Unable to find config file");
		}

		%dbconfig = parse_ini_file($configPath);

		$connection = mysqli_connect('localhost', $dbconfig['username'], $dbconfig['password'], $dbconfig['database']) or die(mysqli_connect_error());
		// $connection = mysqli_connect('localhost', 'furryfriendfinder', 'rednifdneirfyrruf3420', 'furryfriendfinder') or die(mysqli_connect_error());
	}
	if ($connection === false) {
		echo "Unable to connect to database<br/>";
		echo mysqli_connect_error();
	}
	return $connection;
}

?>