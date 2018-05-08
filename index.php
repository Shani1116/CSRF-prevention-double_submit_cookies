
<!doctype html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        
        <title>CSRF Demo</title>   
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background-image: url('images/LoginPage2.jpg'); color: white; background-size: cover; ">
      <div class="container">
        <div class="row" align="center" style="padding-top: 100px;">
        <div class="col-12">  
        <?php 
            if(isset($_COOKIE['session_cookie'])){
                echo "<a href='profile.php' style='font-size:5vw; font-family:Georgia'><b>Profile</b></a>";
            }
            
            if(!isset($_COOKIE['session_cookie'])){
                echo "<a href='login.php' style='font-size:5vw; font-family:Georgia'>Login</a>";
            }
            
            if(isset($_COOKIE['session_cookie'])){
                echo "<a href='logout.php' style='font-size:5vw; font-family:Georgia'><b>Logout</b></a>";
            }
        ?>
        </div>
        </div>
      </div>
    </body>
</html>

