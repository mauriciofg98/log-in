<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Authentication</title>
</head>
<body>
<?php
//Create connection
$conn = mysqli_connect('localhost:3307', 'gfonsec2', 'LuckyFonsec1;', 'clock');
//Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$id = mysqli_real_escape_string($db, $_REQUEST['ID']);
$sql = "SELECT ID FROM Employee WHERE ID='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	// header("Location: hours.php?flag=0";
    	header('Location:hours.php?ID=' . $row['ID']);
    }
}
else{
    header('Location: liscreen.php?a=y');
}
$conn->close();
?>
</body>
</html>