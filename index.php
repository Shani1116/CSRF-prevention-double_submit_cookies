<!DOCTYPE html>

 <?php
 
    //start a session in users browser
    session_start();
    
    //setting a cookie
    $sessionID = session_id();
    
    setcookie("session_id",$sessionID, time()+3600,"/","localhost:81",false,true);
    
    //generating a CSRF token
    $token = bin2hex(openssl_random_pseudo_bytes(16));
    
    setcookie("CSRF_token",$token, time()+3600);
    
    
    /*if (isset($_POST["user"], $_POST["pass"]))
    {
        // Make sure the token from the login form is the same as in the cookie
        if (isset($_POST["CSRFtoken"], $_COOKIE["CSRFtoken"])){
            if ($_POST["CSRFtoken"] == $_COOKIE["CSRFtoken"]){
                // code for checking the user and password
            }
        }
    } else 
    {
        $token = bin2hex(openssl_random_pseudo_bytes(16));
        setcookie("CSRFtoken", $token, time() + 60 * 60 * 24);
        echo '
            <form method="post">
                <input name="user">
                <input name="pass" type="password">
                <input name="CSRFtoken" type="hidden" value="' . $token . '">
                <input type="submit">
            </form>
        ' ;
    }*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CSRF demo</title>
    </head>
    <body>
        
        <form action="submit.php" method="post">
        <input type="hidden" name="<?= $token_id; ?>" value="<?= $token_value; ?>" />
        Username : <input type="text" name="user" value="User123" /><br/><br/>
        Password : <input type="password" name="pass" value="1234"/><br/><br/>
        <input type="submit" value="Login"/>
        </form>
    </body>
</html>
