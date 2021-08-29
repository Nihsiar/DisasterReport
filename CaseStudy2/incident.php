<?php
    require 'auth.php';
    $incident = ""; $location = "";$message=""; $id=""; $date="";
    $db = mysqli_connect('localhost', 'root', '', 'casestudy');
    $sql = "SELECT * FROM users where email = '$userCheck'";
    $result = mysqli_query($db, $sql);
        foreach($result as $row)
            $id=$row["userID"];

    if (isset($_POST['submit'])) 
        { 
            $incident=$_POST['incident'];
            $location=$_POST['location'];
            $date=$_POST['date'];
 
            $sql = sprintf("INSERT INTO report (dated,incident, location, status,userID) VALUES ('$date','$incident', '$location', 'Report', '$id')");
            mysqli_query($db, $sql);
            mysqli_close($db);
            $message="Report Sended";
        }
?> 

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Incident</title>
    <link rel="stylesheet" href="assets/front.css">
</head>

<body>
    <?php
        readfile('navReg.tmpl.html');
    ?>

    <div id="signin">
        <form method="POST" action="incident.php">
            <label>Date</label>
            <input class="form-control" type="date" name="date" required="dd/mm/yyyy">
            <label>Incident </label>
            <select class="form-control" name="incident" value="incident" required="">
                <option></option>
                <option value="Earthquake">Earthquake</option>
                <option value="Landslide">Landslide</option>
                <option value="Volcanic Eruption">Volcanic Eruption</option>
                <option value="Typhoon">Typhoon</option>
                <option value="Tsunami">Tsunami</option>
                <option value="Tropical Strom">Tropical Storm</option>
            </select>
            <label>Location</label>
            <input class="form-control" name="location" type="text" required="">
            <input type="submit" name="submit" value="Submit"><br><br>
        <?php
            echo "$message"; 
        ?>

        </form>
    </div>
</body>

</html>

