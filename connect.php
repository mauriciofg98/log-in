<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Database Demo</title>
	</head>
	<body>
		<p>Here are some names from the database.</p>
		<br>

		<?php

		/* php file to establish mysql connection and query database */

		/* servername name should remain static,
		replace username, password, and dbname with proper parameters */
		$servername = "localhost";
		$username = "Mauricio";
		$password = "090198Mfg!";
		$dbname = "test";

		/* create connection,
		note this connection is using a mysqli connection,
		this connection is ONLY intended for MySQL databases,
		for other database connections use PDO */
		$conn = new mysqli($servername, $username, $password, $dbname);

		/* verify a unsuccessful connection */
		if ($conn->connect_error)
		    die("Connection failed: " . $conn->connect_error);

		/* build database query,
		everything between SELECT and FROM are your table columns,
		to the right of FROM is your table */
		$sql = "SELECT id, first_name, surname, company FROM sample";

		/* query database */
		$result = $conn->query($sql);

		/* more than zero results*/
		if ($result->num_rows > 0) {
		    /* fetch results */
		    while($row = $result->fetch_assoc()) {
					if (($row["id"] - 1) % 10 == 0) echo "<br>";
		        echo "id: " . $row["id"].
						" - Name: " . $row["first_name"]. " " . $row["surname"].
						" - Company  ".$row["company"]."<br>";
		    }
		} else {
		    echo "0 results";
		}
		$conn->close();
		?>
	</body>
</html>
