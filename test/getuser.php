<?php



echo "<table border='1'>
<tr>
<th>Id</th>
<th>Login</th>
<th>Nom</th>
<th>Prenom</th>
<th>Fonction</th>
</tr>";

foreach ($result as $unresult)      
                {
//while($row = ($result))
  //{
  echo "<tr>";
  echo "<td>" . $unresult->Uti_Code . "</td>";
  echo "<td>" . $unresult->Uti_Login . "</td>";
  echo "<td>" . $unresult->Uti_Nom . "</td>";
  echo "<td>" . $unresult->Uti_Prenom . "</td>";
  echo "<td>" . $unresult->Uti_Fonction . "</td>";
//  echo "<td>" . $row['Job'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>