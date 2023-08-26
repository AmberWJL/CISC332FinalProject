<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>search</title>

</head>
<body>
<?php include 'connectdb.php'; ?>
	<h1>Finding the patient in our database:</h1>
	<?php
        //Q1 - step 1 Check if the patient in the database or not
        // get user input OHIP number
        $OHIP = $_POST["OHIP"];
        $query1 = 'SELECT OHIP FROM Patient WHERE OHIP = "' . $OHIP . '"';
        $result1 = $connection->query($query1);
        $row1 =$result1->fetch();
        if ($row1){//if patient in database
            $query = 'SELECT OHIP, Lot.CName FROM Vaccination, Lot WHERE Vaccination.LotID = Lot.LotID AND Vaccination.OHIP = "' . $OHIP . '"';
            $result = $connection->query($query);
            echo "Found the patient in the database!<br>";
            echo "<br>";
            echo "Input the Clinic info: <br>";
            echo '<form method = "post" action = "addVaccination.php">';
            include 'getSiteData'.php';
            echo '<input type = "hidden" name = "OHIP" value = "'. $OHIP .'" >
                    <input type = "submit" value = "Select Lot ID" > 
                    </form>';
            }
        else{ //if can't find patient in the database, then ask patient to input information
            echo "Patient is not in the database<br>";
            echo "add new patient information";
            echo '<form method = "post" action = "inputNewPatient.php">
                    <input type = "submit" value = "Add New Patient"> 
                    </form>';
            }
            ?>
<?php $connection = NULL; ?>
</body>
</html>