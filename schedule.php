<?php
	session_start();
	require '_dbconnect.php';
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!-- data table css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

	<title>Blood Donation Camp</title>
</head>

<body>
	<?php require 'nav.php'; ?>
	<div class="container my-3" style="height:69vh;">

		<h2>Future Blood Donation Camp</h2>
		<table id="myTable">
			<thead>
				<tr>
					<!-- <th>S.no.</th> -->
					<th>Email</th>
					<th>Primary_number</th>
					<th>Secondary_Number</th>
					<th>Date</th>
					<th>Time</th>
					<th>Address</th>
					<th>City</th>
					<th>Apply</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql= "SELECT * FROM `camp`";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($result)) {
					$id = explode('@',$row[1])[0];
					echo "<tr>
					<td>".$row[1]."</td>
					<td>".$row[2]."</td>
					<td>".$row[3]."</td>
					<td>".$row[4]."</td>
					<td>".$row[5]."</td>
					<td>".$row[6]."</td>
					<td>".$row[7]."</td>
						<td><a href='apply.php?id=";echo $id."'>Apply Now</a></td>
					</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<?php include "footer.php" ?>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<!-- data table script -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script>
</body>

</html>