<?php
    require 'auth.php';
    $event = ""; $location = "";$message=""; $id=""; $date=""; $des="";
    $db = mysqli_connect('localhost', 'root', '', 'casestudy');
    $sql = "SELECT * FROM users where email = '$userCheck'";
    $result = mysqli_query($db, $sql);
        foreach($result as $row)
            $id=$row["userID"];
    mysqli_close($db);     

    if (isset($_POST['submit'])) 
        { 
            $event=$_POST['event'];
            $location=$_POST['location'];
            $date=$_POST['date'];
            $des = $_POST['description'];
            
            $db = mysqli_connect('localhost', 'root', '', 'casestudy');

            $sqli = sprintf("INSERT INTO events (name, location, date, description,participants, userID) VALUES ('$event','$location', '$date', '$des', 1 , '$id')");
            mysqli_query($db, $sqli);
            mysqli_close($db);
            $message="Event Added";
        }
?> 

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C:\Users\LENOVO-PC\Desktop\homeagain</title>
    <link rel="stylesheet" href="assets/front.css">
</head>

<body>
    <?php
        readfile('navReg.tmpl.html');
    ?>

    <div id="signin">
        <form method="POST" action="events.php">
            <label>Event Name</label>
            <input class="form-control" type="text" name="event" required="">
            <label>Location</label>
            <input class="form-control" name="location" type="text" required="">
            <label>Date</label>
            <input class="form-control" type="date" name="date" required="">
            <label>Short Description</label>
            <textarea class="form-control input-sm" name="description" required=""></textarea>

            <input type="submit" name="submit" value="Add"><br><br>
        <?php
            echo "$message"; 
        ?>

        </form>
    </div>
</body>

</html>

