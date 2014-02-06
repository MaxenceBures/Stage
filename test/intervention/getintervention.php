<?php
$q = $_GET['q'];
//var_dump($q);
require("function.php");
$result = infosIntervention($q);
var_dump($result);
echo "<table border='1'>
<tr>
<th>Num</th>
<th>Libelle</th>
<th>Description</th>
<th>DateDemande</th>
<th>Etat</th>
</tr>";
$i = 0;
while($row[$i] = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row[$i]['INC_CODE'] . "</td>";
  echo "<td>" . $row[$i]['INC_LIBELLE'] . "</td>";
  echo "<td>" . $row[$i]['INC_DESCRIPTION'] . "</td>";
  echo "<td>" . $row[$i]['INC_DATEDEMANDE'] . "</td>";
  echo "<td>" . $row[$i]['ETA_LIBELLE'] . "</td>";
  echo "</tr>";
  $i = $i +1;
  }
echo "</table>";

?>
