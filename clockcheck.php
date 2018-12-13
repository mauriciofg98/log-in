<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Authentication</title>
</head>
<body>
<?php
$id = mysqli_real_escape_string($db, $_REQUEST['ID']);
$sql = "SELECT ID FROM Employee WHERE ID='$id'";
$result = $db->query($sql);
if ($result->num_rows > 0){}
else{
    header('Location: clockpage.php?a=y');
}
?>

<br>
<a href="reg.php" class="btn btn-success">Go to Register Page</a><br><br>
<a href="liscreen.php" class="btn btn-success">Go to Log-In Page</a><br><br>
<a href="clockpage.php" class="btn btn-success">Go to Clock-In Page</a><br><br>

</body>
</html>