<?php
require("function.php");


$q2 = "";
if(isset($_GET['q2'])){
  $q2 = $_GET['q2'];
  
 }

$q4 = $_GET['q4'];
$q = $_GET['q'];
//$q2 = $_GET['q2'];
$q3 = $_GET['q3'];
var_dump($q4);

$function = $_SESSION['fonction'];
if ($function == "utilisateur"){
$result = infosInterventioncli($q,$q3);
echo"</br><b>infosInterventioncli</b></br>";
}
elseif ($function == "responsablecli"){
	if ($q4 == "respcli"){
		$result = infosMesInterventionrespcli($q,$q3);
		echo"</br><b>infosMesInterventionrespcli</br></b>";
	}
	else{
		$result = infosInterventionrespcli($q,$q2,$q3);
		echo"</br><b>infosInterventionrespcli</br></b>";
	}
}
else {
$result = infosIntervention($q,$q2,$q3);
echo"</br><b>infosIntervention</br></b>";  
}
var_dump($result);
echo "<hr>";
echo "<table border='1'>
<tr>
<th>Num</th>
<th>Libelle</th>
<th>Description</th>
<th>DateDemande</th>
<th>Etat</th>";
if ($function == "responsablecli"){
echo "<th>Type</th><th>Urgence</th>";
if ($q4 == "cli"){
		echo "<th>Login</th>";
	}
}

echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
      
  echo "<tr>";
  echo "<td>" . $row['INC_CODE'] . "</td>";
  echo "<td>" . $row['INC_LIBELLE'] . "</td>";
  echo "<td>" . $row['INC_DESCRIPTION'] . "</td>";
  echo "<td>" . substr($row['INC_DATEDEMANDE'],0,10) . "</td>";
  echo "<td>" . $row['ETA_LIBELLE'] . "</td>";
  if ($function == "responsablecli"){
	  echo "<td>" . $row['LIB_LIBELLE'] . "</td>";
  	  echo "<td>" . $row['URG_LIBELLE'] . "</td>";
  	  if ($q4 == "cli"){
		echo "<td>" . $row['UTI_LOGIN'] . "</td>";
	}
  	  
	}
  echo "</tr>";
  
  }
echo "</table>";

?>
