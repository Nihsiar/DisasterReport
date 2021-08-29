<?php
    require 'auth.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Report</title>
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
                        <th>Incident </th>
                        <th>Location </th>
                        <th>Status</th>
                        <th>Sended By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db = mysqli_connect('localhost', 'root', '', 'casestudy');
                        $sql = "SELECT * FROM report";
                        $result = mysqli_query($db, $sql);
                        foreach($result as $row)
                        {
                            $userid=$row["userID"];
                            echo "<tr><td>";
                            printf( $row["dated"]);
                            echo "</td><td>";
                            printf( $row["incident"]);
                            echo"</td><td>";
                            printf( $row["location"]);
                            echo"</td><td>";
                            printf( "<a href = 'manageReps.php?reportID=%s '> " . $row["status"]  ."</a>", $row['reportID'], $row['reportID'] );
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