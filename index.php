
<!doctype html>
<html>
    <head>
        <title>CSRF Demo</title>   
    </head>
    <body>
        
        <?php 
            if(isset($_COOKIE['session_cookie'])){
                echo "<a href='profile.php'>Profile</a>";
            }
            
            if(!isset($_COOKIE['session_cookie'])){
                echo "<a href='login.php'>Login</a>";
            }
            
            if(isset($_COOKIE['session_cookie'])){
                echo "<a href='logout.php'>Logout</a>";
            }
        ?>
    </body>
</html>

