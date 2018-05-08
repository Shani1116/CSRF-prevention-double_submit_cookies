
<!doctype html>
<html>
    <head>
        <title>CSRF Demo</title>
    </head>
    <body>
        <form action="login.php" method="POST" >
            Username : <input type="text" id="uname" name="uname"><br><br>
            Password : <input type="password" id="pass" name="pass"><br><br>
            
            <input type="submit" value="Login" id="submit" name="submit">
            
        </form>
        
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


