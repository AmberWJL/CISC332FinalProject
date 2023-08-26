<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<title>Checking OHIP</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<table>

<?php
        $OHIP = $_POST["OHIP"];
        $query1 = 'SELECT OHIP FROM Patient WHERE OHIP = "' . $OHIP . '"';
        $result1 = $connection->query($query1);
        $row1 =$result1->fetch();
        if ($row1){//if patient in database
            $query = 'SELECT OHIP, Lot.CName FROM Vaccination, Lot 
                        WHERE Vaccination.LotID = Lot.LotID AND Vaccination.OHIP = "' . $OHIP . '"';
            $result = $connection->query($query);
            echo "<h3> Found the patient in the database! </h3>";
            echo '<form method = "post" action = "addVaccination.php">';
            echo "Select the vaccination site you get vaccined at:</br>";
            include 'getSiteData.php';
            echo "<br>";
            echo 'Select date of vaccination: 
                <input type ="date" name= "VDate" class = "from-control"></br></br>';
            echo 'Select time of vaccination: 
                <input type ="time" name= "VTime" class = "from-control"></br></br>';
            echo 'Input Lot Number: <input type="txt" name="lotNum"></br></br>';
            echo '<input type = "hidden" name = "OHIP" value = "'. $OHIP .'" >
                    <input type = "submit" value = "Submit" > 
                    </form>';
            }
        else{ //if can't find patient in the database, then ask patient to input information
            echo "<h3> Patient is not in the database. </h3>";
            echo "Add new patient information:";
            echo '<form method = "post" action = "addNewPatient.php"></br>';
            echo 'Input Last Name: <input type = "txt" name = lName></br>';
            echo 'Input First Name: <input type = "txt" name = fName></br>';
            echo 'Select Date of Birth: 
                <input type ="date" name= "dob" class = "from-control"></br></br>';
            echo '<input type = "hidden" name = "OHIP" value = "'. $OHIP .'" >
                    <input type = "submit" value = "Add New Patient"> 
                    </form>';
            }
?>

</table>
<?php $connection = NULL; ?>
</body>
</html>