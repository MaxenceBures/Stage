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
  echo "<td>" . $row[$i]['Uti_Code'] . "</td>";
  echo "<td>" . $row[$i]['Uti_Login'] . "</td>";
  echo "<td>" . $row[$i]['Uti_Nom'] . "</td>";
  echo "<td>" . $row[$i]['Uti_Prenom'] . "</td>";
  echo "<td>" . $row[$i]['Uti_Fonction'] . "</td>";
//  echo "<td>" . $row['Job'] . "</td>";
  echo "</tr>";
  $i = $i +1;
  }
echo "</table>";


?>