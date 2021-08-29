<?php
    require 'auth.php';

    if(isset($_GET['reportID']) && ctype_digit($_GET['reportID']))
        $id = $_GET['reportID'];
    else
        header('Location: manageRep.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Report</title>
    <link rel="stylesheet" href="assets/front.css">
    

</head>

<body>

    <?php
        readfile('navigation.tmpl.html');
    ?>

    <h4 class="text-center">Manage the Reports</h4>
    <?php
        $incident="";$lname="";$sended=""; $message="";$userid="";$fname=""; $lname="";
        $db = mysqli_connect('localhost', 'root', '', 'casestudy');
        $sql = "SELECT * FROM report where reportID = '$id'";
        $result = mysqli_query($db, $sql);
        foreach($result as $row)
        {
            $incident= $row["incident"];
            $location= $row["location"];
            $userid = $row["userID"];
            $status= $row["status"];
            
            $sqli = "SELECT * FROM users where userID='$userid'";
            $results = mysqli_query($db, $sqli);
            foreach($results as $row)
            {
                $fname= $row["firstName"];
                $lname= $row["lastName"];
            }            
        }    
        
        if(isset($_POST['submit']))
        {
            $sqlite = sprintf("UPDATE report SET status='".$_POST['newStatus']."' WHERE reportID = ".$id."");
            mysqli_query($db, $sqlite);
            mysqli_close($db);
            header("Location: manageRep.php");
        }

    ?>

    <div id="signin">
        <form method="POST" action="manageReps.php?reportID=<?php echo $id; ?>">
            <label>Incident </label>
            <input class="form-control" type="text" name="incidents" value="<?php echo $incident;?>" disabled>
        
            <label>Location </label>
            <input class="form-control" type="text" name="locations" value="<?php echo $location;?>" disabled>

            <label>Sended by </label>
            <input class="form-control" type="text" name="sended" value="<?php echo $fname." ".$lname; ?>" disabled>

            <label>Current Status </label>
            <input class="form-control" type="text" name="current" value="<?php echo $status; ?>" disabled>


            <label>New Status </label>
            <select class="form-control" name="newStatus" value="newStatus" required="">
                <option></option>
                <option value="Finished">Finished</option>
                <option value="Working">Working</option>
                <option value="Read">Read</option> 
                <option value="Fake">Fake</option>           
            </select>

            <input type="submit" name="submit" value="Update"><br><br>
        <?php
            echo "$message"; 
        ?>
        </form>
    </div>
</body>

</html>