<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style type="text/css">
        .btn-huge{
            padding-top:50px;
            padding-bottom:50px;
            font-size: 35px;
        }
        .row{
            display: flex;
          align-items: center;
          justify-content: center;
        }
        .error{
        font-size:20px;
        color:#5C5C5C;
        }
    </style>
  <title>Clock-In/Out</title>
</head>
<body onload="setTime()">

<?php
if (isset($_GET['a'])){
if($_GET['a']=='y'){
    echo "<div class=error><center><b>This employee ID doesn't exist.</b></center><div>";
}
else if($_GET['a']=='b'){
    echo "<div class=error><center><b>Need to Clock-In first.</b></center><div>";
}
else if($_GET['a']=='c'){
    echo "<div class=error><center><b>You already Clocked-In for today.</b></center><div>";
}
else{
    echo "No value received.";
}
}
?>
    <form method="POST" action="clockcheck.php">
        <form id="loginform" class="form-horizontal" role="form">
            <div class="container">
                <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title"><center><b>Clock-In/Out</b></center></div>
                        </div>
                        <div style="padding-top:30px" class="panel-body" >
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="number" name="ID" class="form-control" placeholder=" Employee ID / Empliado ID">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <div class="row"><p>
                    <div class="col-md-3">
                        <button type="submit" value="0" class="btn btn-success btn-lg btn-block btn-huge" name="clock"><b>Clock-In</b></button>
                    </div></p><p>
                    <div class="col-md-3">
                        <button type="submit" value="1" class="btn btn-success btn-lg btn-block btn-huge" name="clock"><b>Clock-Out</b></button>
                    </div></p>
                </div>
            </center>
        </form>
    </form>
</body>
</html>