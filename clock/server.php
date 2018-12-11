<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost:3307', 'gfonsec2', 'LuckyFonsec1;', 'project');

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else
{
  // echo "succesfull connection";
}