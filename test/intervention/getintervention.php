<?php
$q = intval($_GET['q']);

require("function.php");
$result = infosIntervention($q);
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
  echo "<td>" . $row[$i]['INT_CODE'] . "</td>";
  echo "<td>" . $row[$i]['INT_LIBELLE'] . "</td>";
  echo "<td>" . $row[$i]['INT_DESCRIPTION'] . "</td>";
  echo "<td>" . $row[$i]['INT_DATEDEMANDE'] . "</td>";
  echo "<td>" . $row[$i]['ETA_LIBELLE'] . "</td>";
  echo "</tr>";
  $i = $i +1;
  }
echo "</table>";

?>
