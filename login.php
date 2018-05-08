
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
        <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
        <div class="col-md-6 col-offset-3" align="center">
            
            <form action="login.php" method="POST" >
                Username : <input type="text" id="uname" name="uname" placeholder="Username" class="form-control"><br>
                Password : <input type="password" id="pass" name="pass" placeholder="Password" class="form-control"><br>
            
                <input type="submit" value="Login" id="submit" name="submit" class="btn btn-info">
            
            </form>
        </div>
        </div>
        </div>
        
    </body>
</html>

<?php
    if(isset($_POST['submit'])){
	login();
    }
?>

<?php
	
    function login()
    {
        $user='User123';
	$password='1234';

	
	$in_user = $_POST['uname'];
	$in_pass = $_POST['pass'];

		
	if(($in_user == $user)&&($in_pass == $password))
	{
            session_set_cookie_params(300);
            session_start();
            session_regenerate_id();
			
			
            setcookie('session_cookie', session_id(), time() + 300, '/');

            $token = generate_token();

            setcookie('CSRF_token', $token, time() + 300, '/');
			
            header("Location:profile.php");
            exit;
			
        }
	else
	{
            echo "<script>alert('Username and Password does not match. Please try again!')</script>";
        }


    }
	
function generate_token()
{
    
    return sha1(base64_encode(openssl_random_pseudo_bytes(30)));
    
}


?>


