<!DOCTYPE html>
<html>

<head>
    <title>Covid</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
   
</head>

<body>
    <?php include 'connectdb.php';?>    
     
     <!-- Function 1: allow user to input the OHIP to input patient vaccination information -->
      <ol>
            <h4><li>Record vaccination for patient, if patient not exist in the database then add </li></h4>
                <form action="patientFinding.php" method="post">
                    please enter patient's OHIP number to insert vaccination information:<br>
                    <input type="txt" name="OHIP">
                    <input type="submit" value="Search the Patient OHIP">
                </form>
                <?php $connection = NULL;?>
            <!--Function 2: Check vaccination sites' available dose according to the type of vaccines -->
            <h4><li>Check vaccination sites' available dose according to the type of vaccines</li></h4>
                <form action = "getClinic.php" method = "post">
                    <?php include 'f2_displayData.php'; ?>
                    <input type = "submit" value = "Get Clinic">
                </form>
                <?php $connection = NULL; ?>
            <!--Function 3: Choose patient to see patient's vaccination status-->
            <h4><li>Choose patient, show vaccination status(name, ohip, vaccine date, vaccine type)</li></h4>
                <form action = "getPatientStatus.php" method = "post">
                    <?php include 'f3_displayPatient.php'; ?>
                    <input type = "submit" value = "Get Patient Status">
                </form>
                <?php $connection = NULL; ?>
            <!--Function 4: show all worker name in vaccination site-->
            <h4><li>function 4: show all worker name in vaccination site</li></h4>
                <form action = "getWorker.php" method = "post">
                    <?php include 'f4_displayWorker.php'; ?>
                    <input type = "submit" value = "Get Worker">
                </form>
                <?php $connection = NULL; ?>
        </ol>


</body>

</html>