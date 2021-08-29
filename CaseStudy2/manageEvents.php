<?php
    require 'auth.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
</head>

<body>
    <?php
        readfile('navigation.tmpl.html');
    ?>

    <div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Date </th>
                        <th>Event </th>
                        <th>Location </th>
                        <th>Desciption</th>
                        <th>Participants</th>
                        <th>Hosted By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db = mysqli_connect('localhost', 'root', '', 'casestudy');
                        $sql = "SELECT * FROM events";
                        $result = mysqli_query($db, $sql);
                        foreach($result as $row)
                        {
                            $userid=$row["userID"];
                            echo "<tr><td>";
                            printf( $row["date"]);
                            echo "</td><td>";
                            printf( $row["name"]);
                            echo"</td><td>";
                            printf( $row["location"]);
                            echo"</td><td>";
                            printf( $row["description"] );
                            echo"</td><td>";
                            printf( $row["participants"] );
                            echo"</td><td>";

                            $fname=""; $lname="";
                            $sqli = "SELECT * FROM users where userID='$userid'";
                            $results = mysqli_query($db, $sqli);
                            foreach($results as $row)
                            {
                                $fname= $row["firstName"];
                                $lname= $row["lastName"];
                            }
                            printf( $fname." ". $lname );

                            echo"<br>";
                        }
                        echo "</tr>";
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>