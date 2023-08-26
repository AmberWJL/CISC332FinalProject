<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<title>Check Workers by Vaccination Site</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h2>Here are the Workers:</h2>
<table class = "content-table">
<?php
    $site= $_POST["site"];
    $queryD = 'SELECT * FROM Worker w, DoctorWorks d WHERE d.DocID = w.ID AND d.SName = "' . $site . '"';
    $queryN = 'SELECT * from Worker w, NurseWorks n WHERE n.NurseID = w.ID And n.SName = "' . $site . '"';
    $resultD = $connection-> query($queryD);
    $resultN = $connection-> query($queryN);
    echo "<thead><tr><td> Name</td><td> Position </td></tr></thead>";  
    echo "<tbody>";
    while ($rowD=$resultD->fetch()) {
	    echo "<tr>
                <td>" . $rowD["FirstName"] . " " . $rowD["LastName"] . "</td>
                <td> Doctor </td>
            </tr>";
    }
    while ($rowN=$resultN->fetch()) {
        echo "<tr><td>".$rowN["FirstName"]." ".$rowN["LastName"]."</td>
                <td> Nurse </td>
                </tr>";
    }
    echo "</tbody>";
?>
</table>


<?php
    echo '<form action="covid.php" method="post">';
    echo "<input type='submit' value='Return to Main Page'> </form>";
?>

<?php
   $connection = NULL;
?>
</body>
</html>