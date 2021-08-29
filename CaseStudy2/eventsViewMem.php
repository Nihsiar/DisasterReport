<?php
    require 'auth.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
</head>

<body>
	<?php
        readfile('navMem.tmpl.html');
    ?>
    <h4 class="text-center">List of Joined Events</h4>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db = mysqli_connect('localhost', 'root', '', 'casestudy');
                        $sql = "SELECT * FROM users where email = '$userCheck'";
                        $result = mysqli_query($db, $sql);
        				foreach($result as $row)
            				$id=$row["eventID"];

            			$sqli = "SELECT * FROM events where eventID = '$id'";
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
                        }
                        echo "</tr>";
                        ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>