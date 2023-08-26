<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<title>Add New Patient to Database</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>

<?php
   $lName= $_POST["lName"];
   $fName = $_POST["fName"];
   $OHIP = $_POST["OHIP"];
   $dob = date('Y-m-d', strtotime($_POST["dob"]));
   $query = 'INSERT INTO Patient values ("' . $OHIP . '","' . $fName . '","' . $lName . '","' . $dob . '")';
   $result = $connection->exec($query);
   echo "<h3> The patient data is added! </h3>";
   echo "Your OHIP is " . $OHIP . ". <br> Name is " . $fName. " " . $lName . "<br>";
   echo "Your date of birth is " . $dob . ". </br>";
   echo '<form action="covid.php" method="post">';
   echo "<input type='submit' value='Return to Main Page'> </form>";

?>

<?php $connection = NULL; ?>

</body>
</html>