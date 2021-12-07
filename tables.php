<?php
	include_once('config.php');

	$db = get_connection();
	$tableQuery = "select * from Shelter";
	$result = mysqli_query($db, $tableQuery);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Furry Friend Finder | Shelters</title>
</head>
<body>
	<table align="center" border="1px" style="width:600px; line-height: 30px;">
		<tr>
			<th colspan="4"><h2>Animal Shelters</h2></th>
		</tr>
		<tr>
			<th>Shelter ID</th>
			<th>Second Header</th>
			<th>Third Header</th>
			<th>Fourth Header</th>
		</tr>
	<?php
		while($rows = mysqli_fetch_assoc($result)) {
	?>
			<tr>
				<td><?php echo $rows['ShelterID']; ?></td>
			</tr>		
	<?php	
		}
	?>
	</table>
</body>
</html>