<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<title>Covid Vaccination</title>
</head>

<body>

<?php
include 'connectdb.php';
?>

<h1>Welcome to the Covid Vaccination Page</h1>
<img src="covid.jpeg" alt="Covid">
<!-- Question 1 -->
<h2>Record a Vaccination</h2>
Record vaccination for patient, if patient not exist in the database then add.
<form action="checkOHIP.php" method="post">
Input OHIP: <input type="text" name="OHIP"><br>
<input type="submit" value="Search Patient's OHIP">
</form>

<p>
<hr>
<p>

<!-- Question 2 -->
<h2> Find Vaccination Site</h2>
<form action="findSiteByType.php" method="post">
<?php
include 'getCompanyData.php';
?>
<input type="submit" value="Find Site">
</form>

<p>
<hr>
<p>

<!-- Question 3 -->
<h2> Check Patient's Vaccination History</h2>
<!-- getPatientVaccData.php not done-->
<form action="getPatientVaccData.php" method="post">
<?php
include 'displayPatient.php';
?>

<input type="submit" value="Check Patient">
</form>

<p>
<hr>
<p>

<!-- Question 4 -->
<h2> Check Vaccination Workers Information</h2>
Choose a Vaccination Site to check workers:
<form action="showWorkers.php" method="post">
<?php
include 'getSiteData.php';
?>
<input type="submit" value="Check Workers">
</form>

<?php
$connection = NULL;
?>
</body>