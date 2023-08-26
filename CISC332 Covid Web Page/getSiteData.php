<?php
   $query = "SELECT * FROM VaccinationSite";
   $result = $connection->query($query);
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="site" value="';
        echo $row["SiteName"];
        echo '">' . $row["SiteName"] . "<br>";
   }
?>