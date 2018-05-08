
<!doctype html>
<html>
    <head>
        <title>CSRF Demo</title>   
    </head>
    <body>
        <?php
        if(isset($_COOKIE['session_cookie'])){
                echo "<a href='logout.php'>Logout</a>";
            }
        ?>
        
        <?php
        
            if(isset($_COOKIE['session_cookie'])){
                
                session_start();
                
                if ($_POST['CSRF_Token'] == $_COOKIE['CSRF_token']){
                    
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $address = $_POST['address'];
                    
                    echo "Your name is ".$name."<br><br>";
                    echo "Your age is ".$age."<br><br>";
                    echo "Your address is ".$address."<br><br>";
                }
                else{
                    echo "<script>alert('CSRF Found!')</script>";
                }
            }
            
        ?>
    </body>
</html>

