<?php
	include_once('config.php');

	$db = get_connection();
	$tableQuery = "select * from Animal";
	$result = mysqli_query($db, $tableQuery);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Furry Friend Finder | Animals</title>
</head>
<body>
	<table align="center" border="1px" style="width:800px; line-height: 30px;">
		<tr>
			<th colspan="9"><h2>All Animals</h2></th>
		</tr>
		<tr>
			<th>Shelter ID</th>
			<th>Animal ID</th>
			<th>Animal Name</th>
			<th>Adoption Status</th>
			<th>Sex</th>
            <th>Species</th>
			<th>Breed</th>
			<th>Bio</th>
			<th>Health Checkup</th>
		</tr>
	<?php
		while($rows = mysqli_fetch_assoc($result)) {
	?>
			<tr>
				<td><?php echo $rows['ShelterID']; ?></td>
				<td><?php echo $rows['AnimalID']; ?></td>
				<td><?php echo $rows['Name']; ?></td>
				<td><?php echo $rows['AdoptionStatus']; ?></td>
				<td><?php echo $rows['Sex']; ?></td>
                <td><?php echo $rows['Species']; ?></td>
				<td><?php echo $rows['Breed']; ?></td>
				<td><?php echo $rows['Bio']; ?></td>
				<td><?php echo $rows['HealthCheckup']; ?></td>

			</tr>		
	<?php	
		}
	?>
	</table>
</body>
</html>