<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<title>Find Vaccination Site</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h2>Here are the Sites:</h2>
<table class = "content-table">
<?php
    $type= $_POST["type"];
    $query = 'SELECT count(ShipLot.lotID) as count, SName FROM ShipLot, Lot 
                WHERE ShipLot.LotID = Lot.LotID AND Lot.CName= "' . $type . '" GROUP BY SName';
    $result = $connection-> query($query);
    echo "<thead>
            <tr>
                <td> Vaccination Site Name </td>
                <td> Number Of Lot Shipped to the site</td>
            </tr>
        </thead>";
    echo "<tbody>";
    while ($row=$result->fetch()) {
	echo "<tr><td>".$row["SName"]."</td><td>".$row["count"]."</td></tr>";
    }
    echo "</tbody>";
    
?>

<?php
    echo '<form action="covid.php" method="post">';
    echo "<input type='submit' value='Return to Main Page'> </form>";
?>
</table>
<?php
   $connection = NULL;
?>
</body>
</html>