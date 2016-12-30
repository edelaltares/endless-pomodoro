<?php
ini_set('display_errors',1);
include('connect.php');

if(isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
}

if(isset($_POST['username']) and isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = new User();

    $result = $user->login($username, $password, $connection); 
    
    if($result) { 
        
    }
    else {
        echo "nooooooo";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Endless Pomodoro</title>
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

	</head>

<body>
    <!-- NAVIGATION -->

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false">
                    <span class="sr-only">Toggle</span>
                    <span class="icon-bar"></span>    
                    <span class="icon-bar"></span>    
                    <span class="icon-bar"></span>    
                </button>
            <a href="#" class="navbar-brand">Endless Pomodoro</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#login" data-toggle="modal">Login</a></li>
                <li><a href="#">Link</a></li>
            </ul>
        </div>
    </nav>

    <!-- LOGIN MODAL -->

    <div class="modal fade" id="login" tabindex="-1" role="dialog" arial-labelledby="LoginLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                    <h4 class="modal-title" id="LoginLabel">Login</h4>
                </div>
            
                <div class="modal-body">
                    <form action="index.php" method="post">
                        Username:<br />
                        <input type="text" name="username" /><br /><br />

                        Password:<br />
                        <input type="password" name="password" />
                </div>
        
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Register</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                </div>

            </div>
        </div>
    </div>
        
        <!-- CONTENT -->

    <div class="container" width="65%">

        <!-- HEADER -->        

        <div class="row">
            <div class="col-sm-12">
                <h1>Endless Pomodoro</h1>
            </div>
        </div>

        <div class="row">

            <!-- TIMERS -->

            <div class="col-xs-6">
                <div id="timer">0 min 0 sec</div>
                <button class="btn" id="pomoStart">Start</button>
                <button class="btn" id="stop">Stop</button>
            </div>

            <!-- STATISTICS -->

            <div class="col-xs-6">
                <div id="pomoCount">0 pomodoros</div>
            </div>

        </div> 
    </div>

   
    <!-- JQUERY SCRIPTS -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	
	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script>if(typeof($.fn.modal) === 'undefined') {document.write('<script src="js/bootstrap.min.js"><\/script>')}</script>

    <script src="pomodoro.js"></script> 
        
    <!-- CSS FAILOVER -->

    <script>
        $(document).ready(function() {
            var bodyColor = $('body').css('color');
            if(bodyColor != 'rgb(0,0,0)') {
                $("head").prepend('<link rel="styelsheet href="css/bootstrap.min.css">');
            }

        });
    </script>

</body>

</html>    
