<?php
    require 'auth.php';

    $fname="";$lname="";$email="";$password="";$id="";$message="";
        $db = mysqli_connect('localhost', 'root', '', 'casestudy');
        $sql = "SELECT * FROM users where email = '$userCheck'";
        $result = mysqli_query($db, $sql);
        foreach($result as $row)
        {
            $fname= $row["firstName"];
            $lname= $row["lastName"];
            $email= $row["email"];
            $password= $row["password"];
            $id=$row["userID"];
        }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C:\Users\LENOVO-PC\Desktop\signin</title>
    <link rel="stylesheet" href="assets/front.css">
</head>

<body>
    <?php
        readfile('navReg.tmpl.html');
    ?>
    <h4 class="text-center">Manage your Account</h4>

    <?php     
        if (isset($_POST['submit']))
        {
            $db = mysqli_connect('localhost', 'root', '', 'casestudy');
            if (password_verify($_POST['oldPass'], $password))
            {
                if ($_POST["newPass"] == $_POST["confirmPass"])
                {
                    $message ='Updated';
                    $sql = sprintf("UPDATE users SET firstName='".$_POST['firstName']."', lastName='".$_POST['lastName']."', email='".$_POST['email']."', password='".password_hash($_POST['newPass'], PASSWORD_DEFAULT)."' WHERE userID='".$id."'");
                    mysqli_query($db, $sql);
                    mysqli_close($db); 
                }
                else
                   $message = 'Something is wrong'; 
            }
            else
                $message = 'Something is wrong';
        }
    ?>

    <div id="signin">
        <form method="POST" action="settings.php">

            <label>First Name </label>
            <input class="form-control" type="text" name="firstName" autocomplete="on" value="<?php echo $fname;?>">

            <label>Last Name </label>
            <input class="form-control" type="text" name="lastName" autocomplete="on" value="<?php echo $lname;?>">

            <label>E-Mail </label>
            <input class="form-control" type="text" name="email" autocomplete="on" value="<?php echo $email ?>">

            <label>Old Password </label>
            <input class="form-control" type="password" name="oldPass" required="" autocomplete="off">

            <label>New Password </label>
            <input class="form-control" type="password" name="newPass" required="" autocomplete="off">

            <label>Confirm Password </label>
            <input class="form-control" type="password" name="confirmPass" required="" autocomplete="off">

            <input type="submit" name="submit" value="Update"><br><br>
        <?php
            echo "$message"; 
        ?>
        </form>
    </div>

</body>

</html>