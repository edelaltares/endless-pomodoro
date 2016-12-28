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
    <div class="container" width="65%">

        <div class="row">
            <div class="col-sm-12">
                <h1>Endless Pomodoro</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <button class="btn" id="pomoStart">Start</button>
                <button class="btn" id="stop">Stop</button>
             </div>
        </div> 
    </div>

   
    <!-- JQUERY -->
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
