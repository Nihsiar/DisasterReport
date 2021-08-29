<?php
    require 'auth.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Incident</title>
</head>

<body>
	<?php
        readfile('navMem.tmpl.html');
    ?>
    <h4 class="text-center">List of Reported Incidents</h4>
	<div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                    	<th>Date</th>
                        <th>Incident </th>
                        <th>Location </th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db = mysqli_connect('localhost', 'root', '', 'casestudy');
                        $sql = "SELECT * FROM users where email = '$userCheck'";
                        $result = mysqli_query($db, $sql);
        				foreach($result as $row)
            				$id=$row["userID"];

            			$sqli = "SELECT * FROM report where userID = '$id'";
                        $results = mysqli_query($db, $sqli);
                        foreach($results as $row)
                        {
                        	echo "<tr><td>";
                            printf( $row["dated"]);
                            echo "</td><td>";
                            printf( $row["incident"]);
                            echo"</td><td>";
                            printf( $row["location"]);
                            echo"</td><td>";
                            printf( $row["status"]);
                        }
                        echo "</tr>";
                        ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>