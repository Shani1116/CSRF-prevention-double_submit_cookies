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
    <body style="background-image: url('images/profile.jpg'); color: white; background-size: cover;" >
        <?php 
            if(isset($_COOKIE['session_cookie'])){
                echo "<a href='logout.php' style='font-family:Georgia'>Logout</a>";
            }
        ?>
        
        <script>
            function getCookie(cname){
                
                var name = cname + "=";
                var dCookie = decodeURIComponent(document.cookie);
                var ca = dCookie.split(';');
                
                for(var i = 0; i <ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                
                return "";
            }
            
            function submitForm(oFormElement){
                document.getElementById("CSRF_Token").value=getCookie("CSRF_token");
            }
            
        </script>
        
        <?php
            
            if(isset($_COOKIE['session_cookie'])){
                
                echo " "
                . "<div class='container' style='margin-top: 100px'>
                    <div class='row justify-content-center'>
                    <div class='col-md-6 col-offset-3' align='center'>"
                        . "<form method='POST' action='submit.php' onsubmit='submitForm(this)'> "
                    . "<!--CSRF token-->"
                        . "<input type='hidden' name='CSRF_Token' id='CSRF_Token' value=''>"
                        . "Name : <input type='text' id='name' name='name' placeholder='Name' class='form-control'><br><br>"
                        . "Age : <input type='text' id='age' name='age' placeholder='Age' class='form-control'><br><br>"
                        . "Address : <input type='text' id='address' name='address' placeholder='Address' class='form-control'><br><br>"
                        . "<input type='submit' id='submit' name='submit' class='btn btn-info' value='Submit'><br><br>"
                        . "</form>"
                        . "</div></div></div>";
            }
        
        ?>
    </body>
</html>

