<?php
	include_once('config.php');
	$tableQuery="select * from Shelter";
	$result=mysql_query($tableQuery);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Furry Friend Finder | Shelters</title>
</head>
<body>
	<table>
		<tr>
			<th><h2>Animal Shelters</h2></th>
		</tr>
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</table>
</body>
</html>