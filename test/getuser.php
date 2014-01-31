<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','root','stage');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }
if ($q == 99){
  mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM utilisateur where uti_desactive ='0'";
}
else{
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM utilisateur WHERE Uti_Code = '".$q."'";
}
$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>Id</th>
<th>Login</th>
<th>Nom</th>
<th>Prenom</th>
<th>Fonction</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Uti_Code'] . "</td>";
  echo "<td>" . $row['Uti_Login'] . "</td>";
  echo "<td>" . $row['Uti_Nom'] . "</td>";
  echo "<td>" . $row['Uti_Prenom'] . "</td>";
  echo "<td>" . $row['Uti_Fonction'] . "</td>";
//  echo "<td>" . $row['Job'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>