<?php
    session_start(); 
    $message = ''; 
    if (isset($_POST['submit'])) 
    { 
        $db = mysqli_connect('localhost', 'root', '', 'casestudy'); 
        $sql = sprintf("SELECT * FROM users WHERE email='%s'", mysqli_real_escape_string($db, $_POST['email'])); 
        $result = mysqli_query($db, $sql); 
        $row = mysqli_fetch_assoc($result); 
        if ($row) 
            { 
                $hash = $row['password']; 
                $userlevel = $row['userLevel']; 
                if (password_verify($_POST['password'], $hash)) 
                { 
                    $_SESSION['email'] = $row['email']; 
                    if($userlevel==2)
                        header('Location: adminHome.php'); 
                    if($userlevel==1)
                        header('Location: regHome.php'); 
                    if($userlevel==0)
                        header('Location: memHome.php'); 
                } 
                else 
                    $message = 'Login failed.';  
            }
        else 
            $message = 'Login failed.';
                
        mysqli_close($db);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>

<body>

    <?php
        readfile('nav.tmpl.html');
    ?>
    
    <div id="signin">
        <form method="POST" action="signIn.php">
            <label>E-Mail </label>
            <input class="form-control" type="text" name="email" autocomplete="on">
            <label>Password </label>
            <input class="form-control" type="password" name="password" autocomplete="off">
            <input type="submit" name="submit" value="Login"><br><br>
            <p>Don't have account yet? <a href="signup.php">Sign Up here</a></p>
        <?php
            echo "$message"; 
        ?>
        </form>
    </div>
</body>

</html>