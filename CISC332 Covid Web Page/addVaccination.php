<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Vaccination Data</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<ol>
<?php
    $OHIP= $_POST["OHIP"];
    $site = $_POST["site"];
    $lotNum = $_POST["lotNum"];
    $date = date('Y-m-d', strtotime($_POST["VDate"]));
    $time = date('H:i', strtotime($_POST["VTime"]));   
    $query = 'INSERT INTO Vaccination values
                ("' . $lotNum . '","' . $OHIP . '","' . $site . '","' . $date. '","' . $time. '")';
    $result = $connection->exec($query);
    echo "<h3> Your vaccination data is added! </h3>";
    echo "Your OHIP is " . $OHIP . ". <br>Your vaccination site is " . $site . ". <br>";
    echo "Your vaccination lot number is " . $lotNum . 
        ". Your vaccination date and time are " . $date . " " . $time . ". <br>";
    echo '<form action="covid.php" method="post">';
    echo "<input type='submit' value='Return to Main Page'> </form>";
?>
<?php $connection = NULL; ?>
</ol>
</body>
</html>