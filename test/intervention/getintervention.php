<?php
require("function.php");


$q2 = "";
if(isset($_GET['q2'])){
  $q2 = $_GET['q2'];
  
 }
$q5 = "";
if(isset($_GET['q5'])){
  $q5 = $_GET['q5'];
  
 }
$q6 = "";
if(isset($_GET['q6'])){
  $q6 = $_GET['q6'];
  
 }
 var_dump($q6);
$q4 = $_GET['q4'];
$q = $_GET['q'];
//$q2 = $_GET['q2'];
$q3 = $_GET['q3'];
//$q5 = $_GET['q5'];
var_dump($q4);

$function = $_SESSION['fonction'];
if ($function == "utilisateur"){
$result = infosInterventioncli($q,$q3);
echo"</br><b>infosInterventioncli</b></br>";
}
elseif ($function == "responsablecli"){
	if ($q4 == "respcli"){
		$result = infosMesIncidentsrespcli($q,$q3);
		echo"</br><b>infosMesInterventionrespcli</br></b>";
	}
	else{
		$result = infosInterventionResp($q,$q2,$q3);
		echo"</br><b>infosInterventionResp</br></b>";
	}
}
elseif ($function == "intervenant" AND $q4 !="inter"){
		$result = infosIncidentintervenant($q,$q3,$q5);
		echo"</br><b>infosIncidentintervenant</br></b>";
}
elseif ($q4 == "inter") {
	$result = infosInterventionintervenant($q,$q3,$q5,$q6);
	echo"</br><b>infosInterventionintervenant</br></b>";
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
<th>Libelle</th> ";
if ($q4 =="inter") {
	echo "<th>Date</th> ";
	echo "<th>Incident</th> ";
	echo "<th>Type</th> ";
	echo "<th>Client</th> ";
	echo "<th>Intervenant</th> ";
	
}
else { echo"
<th>Description</th>
<th>DateDemande</th>
<th>Etat</th>";
}
if ($function == "responsablecli"){
echo "<th>Type</th><th>Urgence</th>";
if ($q4 == "cli"){
		echo "<th>intervenant</th>";
	}
}
if ($function == "intervenant" AND $q4 !="inter"){
		echo "<th>Type</th><th>Urgence</th><th>Entreprise</th>";
}

echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
if ($function == "responsablecli" AND $q4 !="respcli"){

	echo "<tr>";
	echo "<td>" . $row['INT_CODE'] . "</td>";
	echo "<td>" . $row['INT_LIBELLE'] . "</td>";
	echo "<td>" . $row['INC_LIBELLE'] . "</td>";
	echo "<td>" . substr($row['INT_DATEINTER'],0,10) . "</td>";
	echo "<td>" . $row['ETA_LIBELLE'] . "</td>";
  	echo "<td>" . $row['LIB_LIBELLE'] . "</td>";
  	echo "<td>" . $row['URG_LIBELLE'] . "</td>";
  	echo "<td>" . $row['UTI_LOGIN'] . "</td>";
  	 
	}
elseif ($q4 == "inter") {
  echo "<tr>";
  echo "<td>" . $row['INT_CODE'] . "</td>";
  echo "<td>" . $row['INT_LIBELLE'] . "</td>";
  echo "<td>" . $row['INC_LIBELLE'] . "</td>";
  echo "<td>" . substr($row['INT_DATEINTER'],0,10) . "</td>";
  echo "<td>" . $row['LIB_LIBELLE'] . "</td>";
  echo "<td>" . $row['INC_DEMANDE'] . "</td>";
  echo "<td>" . $row['INT_TECHNICIEN'] . "</td>";
 
 
}
else {		      
  echo "<tr>";
  echo "<td>" . $row['INC_CODE'] . "</td>";
  echo "<td>" . $row['INC_LIBELLE'] . "</td>";
  echo "<td>" . $row['INC_DESCRIPTION'] . "</td>";
  echo "<td>" . substr($row['INC_DATEDEMANDE'],0,10) . "</td>";
  echo "<td>" . $row['ETA_LIBELLE'] . "</td>";
if ($q4 =="respcli"){ 
	echo "<td>" . $row['LIB_LIBELLE'] . "</td>";
  	echo "<td>" . $row['URG_LIBELLE'] . "</td>";
  	}
if ($function == "intervenant"){
		echo "<td>" . $row['LIB_LIBELLE'] . "</td>";
  	    echo "<td>" . $row['URG_LIBELLE'] . "</td>";
  	    echo "<td>" . $row['ENT_RAISONSOCIALE'] . "</td>";
}  	  
if ($q4 == "inter" ) {
	echo "test";
}
}	
  echo "</tr>";
  
  }
echo "</table>";

?>
