<?php
   $query = "SELECT * FROM Company";
   $result = $connection->query($query);
   echo "Select a vaccine type: </br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="type" value="';
        echo $row["CName"];
        echo '">' . $row["CName"] . "<br>";
   }
?>