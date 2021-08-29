<?php
    require 'auth.php';
?>
<?php
    if(isset($_GET['eventtID']) && ctype_digit($_GET['eventtID']))
        {
            $id = $_GET['eventtID']; $userID="";    
            $db = mysqli_connect('localhost', 'root', '', 'casestudy');
            $sqli = "SELECT * FROM users where email='".$userCheck."'";
            $results = mysqli_query($db, $sqli);
            foreach($results as $row)
            { 
                $userID=$row["userID"];
            }
        }
    else
        header('Location: joinMem.php');

        readfile('navMem.tmpl.html');
        $db = mysqli_connect('localhost', 'root', '', 'casestudy');
        $holder="";
        $sqli = "SELECT * FROM events where eventID=$id";
        $results = mysqli_query($db, $sqli);
        foreach($results as $row)
        { 
            $holder= $row["participants"]+1;
        }
        $sqlite= sprintf("UPDATE events SET participants='".$holder."' WHERE eventID='".$id."'");
        mysqli_query($db, $sqlite);
        $sql = sprintf("UPDATE users SET eventID='".$id."' WHERE userID='".$userID."'");
        mysqli_query($db, $sql);
        mysqli_close($db);
        header('Location: joinMem.php');
    ?>
