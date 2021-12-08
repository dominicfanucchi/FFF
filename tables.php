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
</body>
</html>