<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>View All Employees</title>
</head>
<body>

<table>
	<tr>
		<th>Employee_ID</th>
		<th>Employee_Name</th>
		<th>Employee_Gender</th>
		<th>Employee_Age</th>
		<th>Employee_DOB</th>
		<th>Employee_Race</th>
		<th>Employee_Social</th>
		<th>Employee_Address</th>
		<th>Employee_HRS/w</th>
		<th>Employee_Email</th>
		<th>Employee_Phone</th>
		<th>Employee_Work_Description</th>
		<th>Project_ID</th>
		<th>User_Login</th>
		<th>Employed_Date</th>
	</tr>

	<?php 
	$conn = mysqli_connect("localhost", "gfonsec2", "LuckyFonsec1", "project");
	if ($conn-> connect_error) {
		die("Connection Failed:". $conn-> connect_error);
	}

	$sql = "SELECT Employee_ID, Employee_Name from Employee";
	$result = $conn-> query($sql);

	if ($result-> num_rows > 0) {
		while ($row = $result-> fetch_assoc()) {
			echo "<tr><td>". $row["Employee_ID"] . "</td><td>". $row["Employee_Name"] . "</td><td>". $row["Employee_Gender"] . "</td><td>" . $row["Employee_Age"] . "</td><td>". $row["Employee_DOB"] . "</td><td>". $row["Employee_Race"] . "</td><td>". $row["Employee_Social"] . "</td><td>". $row["Employee_Address"] . "</td><td>". $row["Employee_HRS/w"] . "</td><td>". $row["Employee_Email"] . "</td><td>". $row["Employee_Phone"] . "</td><td>". $row["Employee_Work_Description"] . "</td><td>". $row["Project_ID"] . "</td><td>". $row["User_Login"] . "</td><td>". $row["Employed_Date"] . "</td></tr>";
		}
		echo "</table>";
	}
	else {
		echo "0 result";
	}
	$conn-> close();
	?>
</table>

</body>
</html>