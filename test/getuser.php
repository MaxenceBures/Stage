<?php
$q = intval($_GET['q']);

require("function.php");
$result = infosUser($q);
echo "<table border='1'>
<tr>
<th>Id</th>
<th>Login</th>
<th>Nom</th>
<th>Prenom</th>
<th>Fonction</th>
</tr>";
$i = 0;
while($row[$i] = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row[$i]['UTI_CODE'] . "</td>";
  echo "<td>" . $row[$i]['UTI_LOGIN'] . "</td>";
  echo "<td>" . $row[$i]['UTI_NOM'] . "</td>";
  echo "<td>" . $row[$i]['UTI_PRENOM'] . "</td>";
  echo "<td>" . $row[$i]['ROL_LIBELLE'] . "</td>";
  echo "</tr>";
  $i = $i +1;
  }
echo "</table>";

?>
