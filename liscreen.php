<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>Log-in</title>
</head>
<body>
<style>
    .error{
        font-size:20px;
        color:#5C5C5C;
    }
</style>
<?php
if (isset($_GET['a'])){
    if($_GET['a']=='y'){
        echo "<div class=error><center><b>This employee ID doesn't exist.</b></center><div>";
    }
    else{
    echo "No value received.";
    }
}
?>
<form method="POST" action="logincheck.php">
  <div class="container">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
      <div class="panel panel-info" >
        <div class="panel-heading">
          <div class="panel-title">
            <center><b>Login</b></center>
          </div>
        </div> 
        <div style="padding-top:30px" class="panel-body" >
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <form id="loginform" class="form-horizontal" role="form">
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="number" name="ID" class="form-control" placeholder=" Employee ID / Empliado ID">
              </div>
              <center>
                <div style="margin-top:10px" class="form-group">
                  <div class="input-group">
                    <button type="submit" class="btn btn-success" name="weekid">Login</button>
                  </div>
                </div>
              </center>
            </form>
          </div>                     
        </div>  
      </div>
    </div>
</form>
<br>
<a href="reg.php" class="btn btn-success">Go to Register Page</a><br><br>
<a href="clockpage.php" class="btn btn-success">Go to Clock-In Page</a><br><br>
</body>
</html>
</html>