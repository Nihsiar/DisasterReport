<?php
    $firstName = ""; $lastName = ""; $email="";$password=""; 
    if (isset($_POST['submit'])) 
        { 
            $firstName=$_POST['firstName'];
            $lastName=$_POST['lastName'];
            $email=$_POST['email'];
            $password=password_hash($_POST['password'], PASSWORD_DEFAULT);

            $db = mysqli_connect('localhost', 'root', '', 'casestudy'); 
            $sql = sprintf("INSERT INTO users (firstName, lastName, email, password, userLevel) VALUES ('$firstName', '$lastName', '$email', '$password', 0)");
            mysqli_query($db, $sql);
            mysqli_close($db); 
            header('Location: signIn.php');
        }
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C:\Users\LENOVO-PC\Desktop\signin</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/user2.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><a class="navbar-brand navbar-link"><strong>Dissaster</strong> </a></div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="news.html"><strong>News</strong> </a></li>
                    <li role="presentation"></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><strong>About </strong></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="aboutWho.html">Who we are?</a></li>
                            <li><a href="aboutWhat.html">What we do?</a></li>
                            <li><a href="aboutWhere.html">Where we work?</a></li>
                        </ul>
                    </li>
                    <li role="presentation"><a href="#"><strong>Contact</strong></a></li>
                    <li role="presentation"><a href="signin.php"><strong>Sign-In</strong> </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header></header>
    <h3 class="text-center">Connect and Convince to reduce disaster impacts </h3>
    <div id="signin">
        <form id="signin" method="post" action="signup.php">
            <label>First Name</label>
            <input class="form-control" type="text" name="firstName" required="" placeholder="Given Name" autocomplete="on">
            <label>Last Name</label>
            <input class="form-control" type="text" name="lastName" required="" placeholder="Family Name" autocomplete="on">
            <label>E-Mail </label>
            <input class="form-control" type="text" name="email" required="" placeholder="Email Address" autocomplete="on" inputmode="email">
            <label>Password </label>
            <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off"><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

