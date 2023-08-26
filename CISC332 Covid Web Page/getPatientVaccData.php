<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<title>Vet Clinic-Your Pets</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h2>Vaccination Status of Selected Patient:</h2>
<table class = "content-table">
<?php
    $patient = $_POST["patientName"];
    //echo $patient;
    $query = 'SELECT p.OHIP, v.VDate, CONCAT(FirstName, " ", LastName) as fullName, CName  FROM Patient p, Vaccination v, Lot l WHERE v.LotID = l.LotID AND p.OHIP = v.OHIP';
    $result = $connection->query($query);
    
    /*if ($row["VDate"]==""){
        echo "The person has not vaccinated.";
    }*/
    echo "<thead>
            <tr>
            <td> Name </td><td> OHIP </td>
            <td> Vaccination Date </td>
            <td> Vaccine Type </td>
            </tr>
        </thead>";
    while ($row = $result->fetch() and $row["OHIP"] != ""){
        //echo $row["fullName"];
        if ($row["OHIP"] == $patient  ){
            echo "<tbody>
            <tr>
            <td>".$row["fullName"]."</td>
            <td>".$row["OHIP"]."</td>
            <td>".$row["VDate"]."</td>
            <td>".$row["CName"]."</td>
            </tr>
            </tbody>";
        } 
    }
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