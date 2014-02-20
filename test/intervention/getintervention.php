<?php
session_start();
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
$q7 = "";
if(isset($_GET['q7'])){
  $q7 = $_GET['q7'];
  
 } 
 var_dump($q7);echo"<br>";
$q4 = $_GET['q4'];
$q = $_GET['q'];
//$q2 = $_GET['q2'];
$q3 = $_GET['q3'];
//$q5 = $_GET['q5'];
var_dump($q4);

$function = $_SESSION['fonction'];
if ($function == "utilisateur"){
  $result = infosIncidentcli($q,$q3);
  echo"</br><b>infosIncidentcli</b></br>";
}
elseif ($function == "responsableint") {
  if($q4 != "inter" AND $q4 !="cli"){
	$result = infosUtilisateurrespint($q7);
	echo"</br><b>infosUtilisateurrespint</br></b>";
  }
  elseif ($q4 == "cli") {
  $result = infosIncidentintervenant($q,$q3,$q5);
    echo"</br><b>infosIncidentintervenant</br></b>";
  }
  elseif ($q4 == "inter") {
  $result = infosInterventionintervenant($q,$q3,$q5,$q6);
  echo"</br><b>infosInterventionintervenant</br></b>";
  }
}
elseif ($function == "responsablecli"){
	if ($q4 == "respcli"){
		$result = infosMesIncidentsrespcli($q,$q3);
		echo"</br><b>infosMesIncidentsrespcli</br></b>";
	}
	else{
		$result = infosInterventionResp($q,$q2,$q3);
		echo"</br><b>infosInterventionResp</br></b>";
		var_dump($q2);
	}
}
elseif ($function == "intervenant" ){
  if ($q4 != "inter") {
    $result = infosIncidentintervenant($q,$q3,$q5);
    echo"</br><b>infosIncidentintervenant</br></b>";
  }
	elseif ($q4 == "inter") {
    $result = infosInterventionintervenant($q,$q3,$q5,$q6);
    echo"</br><b>infosInterventionintervenant</br></b>";
    }	
}
else {
$result = infosIntervention($q,$q2,$q3);
echo"</br><b>infosIntervention</br></b>";  
}

var_dump($result);
echo "<hr>";
echo "<table border='1'>
<tr> ";
if($function == "responsableint" and $q4!= "inter" and $q4 != "cli"){
  echo "
  <th>id</th>
  <th>Login</th>
  <th>Entreprise</th>
  <th>Fixe</th>
  <th>Mail</th>
  <th>Type</th>
  <th>TEst</th>
  ";
}
else
{	
  echo "
  <th>Num</th>
  <th>Libelle</th> ";
if ($q4 =="inter") {
	echo "<th>Date</th> ";
	echo "<th>Incident</th> ";
	echo "<th>Type</th> ";
	echo "<th>Client</th> ";
	echo "<th>Intervenant</th> ";
  echo "<th>Afficher</th> ";
	
}
elseif ($function =="responsablecli") {
  echo"
  <th>Description</th>
  <th>DateInter</th>
  <th>EtatIncid</th>";
}
else {
  echo"
  <th>Description</th>
  <th>DateDemande</th>
  <th>Etat</th>";
}
if ($function == "responsablecli" OR ($function == "responsableint" AND $q4 =="cli")){
  echo "<th>TypeInter</th>
        <th>Urgence</th>";   
    if($function == "responsableint"){
        echo "<th>Entreprise</th>";
    }    
    if ($q4 == "cli" AND $function != "responsableint"){
    		echo "<th>intervenant</th>";
        echo "<th>Utilisateur</th>";
        echo "<th>FicheInter2</th>";
    	}
}
if ($function == "intervenant" AND $q4 !="inter"){
	echo "<th>Type</th>
        <th>Urgence</th>
        <th>Entreprise</th>";
}
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
  echo "<td>" . $row['INC_DEMANDE'] . "</td>";?>
  <td>
  <form action="?page=afficheintervention" method="POST">
                
                <input type="submit" name="test" id="test" value="<?php echo ($row['INT_CODE']); ?>" onClick="
                  if(confirm('Vous allez consulter les informations concernant les stations'))
                  {
                    submit()
                  }
                  else{
                  return false;
                  }
                  "/>
              </form>
  <?php
echo "</td>";
  	 
}
elseif ($function == "responsableint" and $q4 !="inter" and $q4 !="cli") {
  echo "<tr>";
  echo "<td>" . $row['UTI_CODE'] . "</td>";
  echo "<td>" . $row['UTI_LOGIN'] . "</td>";
  echo "<td>" . $row['ENT_RAISONSOCIALE'] . "</td>";
  echo "<td>" . $row['UTI_TELEPHONEFIXE'] . "</td>";
  echo "<td>" . $row['UTI_MAIL'] . "</td>";
  echo "<td>" . $row['ROL_LIBELLE'] . "</td>";?>
  <td>
  <form action="?page=modifutilisateur" method="POST">
                
                <input type="submit" name="test" id="test" value="<?php echo ($row['UTI_LOGIN']); ?>" onClick="
                  if(confirm('Vous allez consulter les informations concernant les stations'))
                  {
                    submit()
                  }
                  else{
                  return false;
                  }
                  "/>
              </form>
  <?php
echo "</td>";
 
}
elseif ($q4 == "inter") {
  echo "<tr>";
  echo "<td>" . $row['INT_CODE'] . "</td>";
  echo "<td>" . $row['INT_LIBELLE'] . "</td>";
  echo "<td>" . $row['INC_LIBELLE'] . "</td>";
  echo "<td>" . substr($row['INT_DATEINTER'],0,10) . "</td>";
  echo "<td>" . $row['LIB_LIBELLE'] . "</td>";
  echo "<td>" . $row['INC_DEMANDE'] . "</td>";
  echo "<td>" . $row['INT_TECHNICIEN'] . "</td>";?>
  <td>
  <form action="?page=afficheintervention" method="POST">
                
                <input type="submit" name="test" id="test" value="<?php echo ($row['INT_CODE']); ?>" onClick="
                  if(confirm('Vous allez consulter les informations concernant les interventions'))
                  {
                    submit()
                  }
                  else{
                  return false;
                  }
                  "/>
              </form>
  <?php
echo "</td>";
 
}
else {		      
    echo "<tr>";
    echo "<td>" . $row['INC_CODE'] . "</td>";
    echo "<td>" . $row['INC_LIBELLE'] . "</td>";
    echo "<td>" . $row['INC_DESCRIPTION'] . "</td>";
    echo "<td>" . substr($row['INC_DATEDEMANDE'],0,10) . "</td>";
    echo "<td>" . $row['ETA_LIBELLE'] . "</td>";
  if ($function == "responsableint") {
    echo "<td>" . $row['LIB_LIBELLE'] . "</td>";
    echo "<td>" . $row['URG_LIBELLE'] . "</td>";
    echo "<td>" . $row['ENT_RAISONSOCIALE'] . "</td>";?>
  <td>
  <form action="ficheincident.php" method="POST">
                
                <input type="submit" name="test" id="test" value="<?php echo ($row['INC_CODE']); ?>" onClick="
                  if(confirm('Vous allez consulter les informations concernant les stations'))
                  {
                    submit()
                  }
                  else{
                  return false;
                  }
                  "/>
              </form>
  <?php
echo "</td>";
    }  
  if ($q4 =="respcli" ){ 
  	echo "<td>" . $row['LIB_LIBELLE'] . "</td>";
    echo "<td>" . $row['URG_LIBELLE'] . "</td>";?>
    <td> <form action="ficheincident.php" method="POST">
<input type="submit" value="PDF"></input>
<input type="hidden" name="test" id="test" value="<?php echo ($row['INC_CODE'])?>">
</form></td><?php
    	}
  if ($function == "intervenant" ){
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