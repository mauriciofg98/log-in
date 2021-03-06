<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database


$db = mysqli_connect('localhost', 'root', '', 'project1');

date_default_timezone_set('America/Monterrey');
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
  // echo "succesfull connection";
}

// REGISTER USER
if (isset($_POST['reg_user'])){
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

if (isset($_POST['reg_employee']))
{
  $Employee_Name = mysqli_real_escape_string($db, $_REQUEST['Employee_Name']);
  $Employee_Email = mysqli_real_escape_string($db, $_REQUEST['Employee_Email']);
  $Employee_Gender = mysqli_real_escape_string($db, $_REQUEST['Employee_Gender']);  
  $Employee_Age = mysqli_real_escape_string($db, $_REQUEST['Employee_Age']);
  $Employee_DOB = mysqli_real_escape_string($db, $_REQUEST['Employee_DOB']);
  $Employee_Race = mysqli_real_escape_string($db, $_REQUEST['Employee_Race']);
  $Employee_Social = mysqli_real_escape_string($db, $_REQUEST['Employee_Social']);
  $Employee_Address = mysqli_real_escape_string($db, $_REQUEST['Employee_Address']);
  $Employee_Phone = mysqli_real_escape_string($db, $_REQUEST['Employee_Phone']);
  $Employee_Work_Description = mysqli_real_escape_string($db, $_REQUEST['Employee_Work_Description']);
  $Project_ID = mysqli_real_escape_string($db, $_REQUEST['Project_ID']);
  $User_Login = mysqli_real_escape_string($db, $_REQUEST['User_Login']);
  $Employed_Date = mysqli_real_escape_string($db, $_REQUEST['Employed_Date']);

  $sql = "INSERT INTO employee ( Employee_Name, Employee_Gender, Employee_Age, Employee_DOB, Employee_Race, Employee_Social, Employee_Address, Employee_Email, Employee_Phone, Employee_Work_Description, Project_ID, User_Login, Employed_Date) VALUES ( '$Employee_Name', '$Employee_Gender', '$Employee_Age', '$Employee_DOB', '$Employee_Race', '$Employee_Social','$Employee_Address', '$Employee_Email', '$Employee_Phone', '$Employee_Work_Description', '$Project_ID', '$User_Login', 'Employed_Date')";
  if(mysqli_query($db, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
}


if (isset($_POST['project']))
{
   $P_Name = mysqli_real_escape_string($db, $_REQUEST['P_Name']);
   $P_Address = mysqli_real_escape_string($db, $_REQUEST['P_Address']);

  $sql = "INSERT INTO project ( P_Name, P_Address) VALUES ( '$P_Name', '$P_Address')";
  if(mysqli_query($db, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

}
//////////////////////////////////////////////////////////////////////////
$race;
$gender;
$age;
$email;
$phone;
$address;

if (isset($_POST['reg']))
{
  $Name = mysqli_real_escape_string($db, $_REQUEST['Name']);

  $race = mysqli_real_escape_string($db, $_REQUEST['Race']);
  $gender = mysqli_real_escape_string($db, $_REQUEST['Gender']);
  $age = mysqli_real_escape_string($db, $_REQUEST['Age']);

  $email = mysqli_real_escape_string($db, $_REQUEST['email']);
  $phone = mysqli_real_escape_string($db, $_REQUEST['phone']);
  $address = mysqli_real_escape_string($db, $_REQUEST['address']);

  $sql = "INSERT INTO Employee ( Name) VALUES ( '$Name')";
  if(mysqli_query($db, $sql)){}
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
}

if (isset($_POST['weekid'])){

  $ID = mysqli_real_escape_string($db, $_REQUEST['ID']);


  $sql = "INSERT INTO contact ( ID, email, phone, address) VALUES ('$ID', '$email', '$phone', '$address')";
  if(mysqli_query($db, $sql)){}
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
$sql = "INSERT INTO Demographics ( ID, Race, Gender, Age) VALUES ('$ID', '$race', '$gender', '$age')";
if(mysqli_query($db, $sql)){}
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
  $sql = "INSERT INTO Week ( ID, Monday_Ci, Monday_Co, Tuesday_Ci, Tuesday_Co, Wednesday_Ci, Wednesday_Co, Thursday_Ci, Thursday_Co, Friday_Ci, Friday_Co, Saturday_Ci, Saturday_Co, Sunday_Ci, Sunday_Co) VALUES ('$ID', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00')";
  if(mysqli_query($db, $sql)){
    echo "Records added successfully.";
  }
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
  
}

if (isset($_POST['clock'])){
  $date = date('Y-m-d H:i:s');
  $id = mysqli_real_escape_string($db, $_REQUEST['ID']);
  $sql = "SELECT ID FROM Employee WHERE ID='$id'";
  $result = $db->query($sql);
    if ($result->num_rows > 0){
      $unixTimestamp = strtotime($date);
      $dayOfWeek = date("l", $unixTimestamp);
      $in;
      $out;
      if ($dayOfWeek == "Monday"){
        $in = "Monday_Ci";
        $out = "Monday_Co";
      }
      else if ($dayOfWeek == "Tuesday"){
        $in = "Tuesday_Ci";
        $out = "Tuesday_Co";
      }
      else if ($dayOfWeek == "Wednesday"){
        $in = "Wednesday_Ci";
        $out = "Wednesday_Co";
      }
      else if ($dayOfWeek == "Thursday"){
        $in = "Thursday_Ci";
        $out = "Thursday_Co";
      }
      else if ($dayOfWeek == "Friday"){
        $in = "Friday_Ci";
        $out = "Friday_Co";
      }
      else if ($dayOfWeek == "Saturday"){
        $in = "Saturday_Ci";
        $out = "Saturday_Co";
      }
      else if ($dayOfWeek == "Sunday"){
        $in = "Sunday_Ci";
        $out = "Sunday_Co";
      }
      else {
        echo "Error!";
      }
      $sql = "SELECT $in, $out FROM Week WHERE ID='$id'";
      $result = $db->query($sql);
      if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        //When they Clock-In Correctly
        if(($row[$in] == '0000-00-00 00:00:00' && $_POST['clock'] == '0') && ($row[$out] == '0000-00-00 00:00:00' && $_POST['clock'] == '0')){
          $sql = "UPDATE Week SET $in = '$date' WHERE ID = '$id'";
          header('Location: clocksuccess.php');
        }
        //When they Clock-Out Correctly
        else if(($row[$in] != '0000-00-00 00:00:00' && $_POST['clock'] == '1') && ($row[$out] == '0000-00-00 00:00:00' && $_POST['clock'] == '1')){
          $sql = "UPDATE Week SET $out = '$date' WHERE ID = '$id'";
          header('Location: clocksuccess2.php');
        }
        //When they "double" Clock-In for the day.
        else if(($row[$in] != '0000-00-00 00:00:00' && $_POST['clock'] == '0') && ($row[$out] == '0000-00-00 00:00:00' && $_POST['clock'] == '0') || ($row[$in] != '0000-00-00 00:00:00' && $_POST['clock'] == '0') && ($row[$out] != '0000-00-00 00:00:00' && $_POST['clock'] == '0')){
          header('Location: clockpage.php?a=c');
        }
        //When they "double" Clock_Out
        else if(($row[$in] == '0000-00-00 00:00:00' && $_POST['clock'] == '1') && ($row[$out] == '0000-00-00 00:00:00' && $_POST['clock'] == '1') || ($row[$in] != '0000-00-00 00:00:00' && $_POST['clock'] == '1') && ($row[$out] != '0000-00-00 00:00:00' && $_POST['clock'] == '1')){
          header('Location: clockpage.php?a=b');
        }
        else{
          echo "Default Case.";
        }
      }
    }
    else{
    echo "0 results";
    }
    if(mysqli_query($db, $sql)){}
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
  }
?>