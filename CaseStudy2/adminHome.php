<?php
    require 'auth.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Members</title>
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
                        <th>Name </th>
                        <th>Email </th>
                        <th>User Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $db = mysqli_connect('localhost', 'root', '', 'casestudy');
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($db, $sql);
                        foreach($result as $row)
                        {
                            echo "<tr><td>";
                            printf( $row["firstName"] . " ". $row["lastName"]);
                            echo"</td><td>";
                            printf( $row["email"]);
                            echo"</td><td>";
                            if ($row["userLevel"] == 0)
                                $level = "Member";
                            if ($row["userLevel"] == 1)
                                $level = "Regional Head";
                            if ($row["userLevel"] == 2)
                                $level = "System Admin";
                            printf( "<a href = 'manageMem.php?userID=%s '> " . $level  ."</a>", $row['userID'], $row['userID'] );
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