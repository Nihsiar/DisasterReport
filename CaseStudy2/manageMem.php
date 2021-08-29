<?php
    require 'auth.php';

    if(isset($_GET['userID']) && ctype_digit($_GET['userID']))
        $id = $_GET['userID'];
    else
        header('Location: adminHome.php');
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
        readfile('navigation.tmpl.html');
    ?>

    <h4 class="text-center">Manage your Members</h4>
    <?php
        $fname="";$lname="";$email=""; $message="";$userlevel="";
        $db = mysqli_connect('localhost', 'root', '', 'casestudy');
        $sql = "SELECT * FROM users where userID = '$id'";
        $result = mysqli_query($db, $sql);
        foreach($result as $row)
        {
            $fname= $row["firstName"];
            $lname= $row["lastName"];
            $email= $row["email"];
            $userlevel= $row["userLevel"];
        }    
        
        if ($row["userLevel"] == 0)
            $level = "Member";
        if ($row["userLevel"] == 1)
            $level = "Regional Head";
        if ($row["userLevel"] == 2)
            $level = "System Admin";

        if(isset($_POST['submit']))
        {
            $db = mysqli_connect('localhost', 'root', '', 'casestudy');
            $sql = sprintf("UPDATE users SET userLevel='".$_POST['newlevel']."' WHERE userID = ".$id."");
            mysqli_query($db, $sql);
            mysqli_close($db);

            header('Location: adminHome.php');
        }

    ?>

    <div id="signin">
        <form method="POST" action="manageMem.php?userID=<?php echo $id; ?>">
            <label>First Name </label>
            <input class="form-control" type="text" name="firstName" value="<?php echo $fname;?>" disabled>
        
            <label>Last Name </label>
            <input class="form-control" type="text" name="lastName" value="<?php echo $lname;?>" disabled>

            <label>E-Mail </label>
            <input class="form-control" type="text" name="email" value="<?php echo $email ?>" disabled>

            <label>Old Level </label>
            <input class="form-control" type="text" name="oldlevel" value="<?php echo $level ?>" disabled>


            <label>New Level </label>
            <select class="form-control" name="newlevel" value="newlevel" required="">
                <option></option>
                <option value="0">Member</option>
                <option value="1">Regional Head</option>
                <option value="2">System Admin</option>          
            </select>

            <input type="submit" name="submit" value="Update"><br><br>
        <?php
            echo "$message"; 
        ?>
        </form>
    </div>
</body>

</html>