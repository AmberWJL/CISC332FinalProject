
<?php
   $query = "SELECT * FROM Patient";
   $result = $connection->query($query);
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="patientName" value="';
        echo $row["OHIP"];
        echo '">' . $row["FirstName"] . " " . $row["LastName"] . "<br>";   
   }
?>