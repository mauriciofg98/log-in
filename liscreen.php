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

<form method="post" action="logincheck.php">
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title"><center><b>Login</b></center></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="id" type="text" class="form-control" name="ID" value="" placeholder=" Employee ID / Empliado ID">
                        
                                    </div>
                <div style="margin-top:10px" class="form-group">
                  <div class="input-group">
                    <button type="submit" class="btn btn-success" name="week">Login</button>
                  </div>
                </div>
              </center> 
                            </form>     
                        </div>                     
                    </div>  
        </div>
    </div>
</form>
</body>
</html>
</html>