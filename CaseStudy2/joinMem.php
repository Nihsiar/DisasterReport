<?php
    require 'auth.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Events</title>
</head>

<body>
	<?php
        readfile('navMem.tmpl.html');
    ?>
    <h4 class="text-center">List of Events</h4>
	<div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                    	<th>Date</th>
                        <th>Event Name </th>
                        <th>Location </th>
                        <th>Short Description</th>
                        <th>Participants</th>
                        <th>Hosted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $current="";
                        $db = mysqli_connect('localhost', 'root', '', 'casestudy');

            			$sqli = "SELECT * FROM events";
                        $results = mysqli_query($db, $sqli);
                        foreach($results as $row)
                        {
                        	echo "<tr><td>";
                            printf( $row["date"]);
                            echo "</td><td>";
                            printf( $row["name"]);
                            echo"</td><td>";
                            printf( $row["location"]);
                            echo"</td><td>";
                            printf( $row["description"]);
                            echo"</td><td>";
                            printf( $row["participants"]);
                            echo"</td><td>";
                            $current=$row["eventID"];

                            

                            $fname=""; $lname="";
                            $sql = "SELECT * FROM users where userID='".$row["userID"]."'";
                            $result = mysqli_query($db, $sql);
                            foreach($result as $row)
                            {
                                $fname= $row["firstName"];
                                $lname= $row["lastName"];
                            }
                            printf( $fname." ". $lname );
                            echo "</td><td>";

                            $sqli = "SELECT eventID FROM events where eventID = $current";
                            $results = mysqli_query($db, $sqli);
                            foreach($results as $row)
                            
                            printf( "<a href = 'joinEvent.php?eventtID=%s '> "  ."Join</a>", $row['eventID'], $row['eventID']);

                        }
                        echo "</tr>";
                        ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>