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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
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
				<td><?php echo $rows['First Name']; ?></td>
				<td><?php echo $rows['Last Name']; ?></td>
				<td><?php echo $rows['AnimalID']; ?></td>
				<td><?php echo $rows['Animal Name']; ?></td>
                <td><?php echo $rows['AdoptionDate']; ?></td>
			</tr>		
	<?php	
		}
	?>
	</table>
	<br><br>
	<div class="d-flex justify-content-center">
		<form action="prev_adoptions.php" method="post">
			<button class="btn btn-dark btn-lg" type="submit" value="print" name="print">Print!</button>
		</form>
	</div>

	<?php
	require('fpdf.php');

	$db = get_connection();
	if (isset($_POST['print'])) {
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(40,10,'Hello World!');
		$pdf->Output();
	}
	?>
</body>
</html>