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
                
                echo " <form method='POST' action='submit.php' onsubmit='submitForm(this)'> "
                . "<!--CSRF token-->"
                        . "<input type='hidden' name='CSRF_Token' id='CSRF_Token' value=''>"
                        . "Name : <input type='text' id='name' name='name'><br><br>"
                        . "Age : <input type='text' id='age' name='age'><br><br>"
                        . "Address : <input type='text' id='address' name='address'><br><br>"
                        . "<input type='submit' id='submit' name='submit'><br><br>"
                        . "</form>";
            }
        
        ?>
    </body>
</html>

