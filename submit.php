
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
    <body style="background-image: url('images/profile.jpg'); color: white; background-size: cover;">
        <?php
        if(isset($_COOKIE['session_cookie'])){
                echo "<a href='logout.php' style='font-family:Georgia'>Logout</a>";
            }
        ?>
        <div class="container">
        <div class="row" align="center" style="padding-top: 100px;">
        <div class="col-12">
            
        <?php
        
            if(isset($_COOKIE['session_cookie'])){
                
                session_start();
                
                if ($_POST['CSRF_Token'] == $_COOKIE['CSRF_token']){
                    
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $address = $_POST['address'];
                    
                    echo "<div class='alert alert-danger' role='alert'>Your name is ".$name."</div><br><br>";
                    echo "<div class='alert alert-danger' role='alert'>Your age is ".$age."</div><br><br>";
                    echo "<div class='alert alert-danger' role='alert'>Your address is ".$address."</div><br><br>";
                }
                else{
                    echo "<script>alert('CSRF Found!')</script>";
                }
            }
            
        ?>
        </div>
        </div>
        </div>
    </body>
</html>

