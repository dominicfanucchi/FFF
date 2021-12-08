<?php
	include_once('config.php');

	$db = get_connection();
	$tableQuery = "SELECT * FROM user_adoptions";
	$result = mysqli_query($db, $tableQuery);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Previous User Adoptions</title>
</head>
<body>
	<table align="center" border="1px" style="width:800px; line-height: 30px;">
		<tr>
			<th colspan="6"><h2>Previous User Adoptions</h2></th>
		</tr>
		<tr>
			<th>UserID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>AnimalID</th>
			<th>Animal Name</th>
            <th>Adoption Date</th>
		</tr>
	<?php
		while($rows = mysqli_fetch_assoc($result)) {
	?>
			<tr>
				<td><?php echo $rows['UserID']; ?></td>
				<td><?php echo $rows['FName']; ?></td>
				<td><?php echo $rows['LName']; ?></td>
				<td><?php echo $rows['AnimalID']; ?></td>
				<td><?php echo $rows['Name']; ?></td>
                <td><?php echo $rows['AdoptionDate']; ?></td>
			</tr>		
	<?php	
		}
	?>
	</table>
</body>
</html>