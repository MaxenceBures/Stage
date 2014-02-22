<?php
session_start();
require("INC/function.inc.php");

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
  ?></br><b>infosIncidentcli</b></br><?php
}
elseif ($function == "responsableint") {
  if($q4 != "inter" AND $q4 !="cli"){
	$result = infosUtilisateurrespint($q7);
?></br><b>infosUtilisateurrespint</br></b><?php
  }
  elseif ($q4 == "cli") {
  $result = infosIncidentintervenant($q,$q3,$q5);
   ?></br><b>infosIncidentintervenant</br></b><?php
  }
  elseif ($q4 == "inter") {
  $result = infosInterventionintervenant($q,$q3,$q5,$q6);
 ?></br><b>infosInterventionintervenant</br></b><?php
  }
}
elseif ($function == "responsablecli"){
	if ($q4 == "respcli"){
		$result = infosMesIncidentsrespcli($q,$q3);
	?></br><b>infosMesIncidentsrespcli</br></b><?php
	}
	else{
		$result = infosInterventionResp($q,$q2,$q3);
	?></br><b>infosInterventionResp</br></b><?php
		var_dump($q2);
	}
}
elseif ($function == "intervenant" ){
  if ($q4 != "inter") {
    $result = infosIncidentintervenant($q,$q3,$q5);
   ?></br><b>infosIncidentintervenant</br></b><?php
  }
	elseif ($q4 == "inter") {
    $result = infosInterventionintervenant($q,$q3,$q5,$q6);
   ?></br><b>infosInterventionintervenant</br></b><?php
    }	
}
else {
$result = infosIntervention($q,$q2,$q3);
?></br><b>infosIntervention</br></b><?php  
}

var_dump($result);
?><hr>
<table border='1'>
<tr> <?php
if($function == "responsableint" and $q4!= "inter" and $q4 != "cli"){
  ?>
  <th>id</th>
  <th>Login</th>
  <th>Entreprise</th>
  <th>Fixe</th>
  <th>Mail</th>
  <th>Type</th>
  <th>TEst</th>
  <?php
}
else
{	
 ?>
  <th>Num</th>
  <th>Libelle</th>
 <?php 
if ($q4 =="inter") {
 ?>
	<th>Date</th> 
	<th>Incident</th> 
	<th>Type</th> 
	<th>Client</th> 
	<th>Intervenant</th> 
  <th>Afficher</th>
 <?php
	
}
elseif ($function =="responsablecli") {
 ?>
  <th>Description</th>
  <th>DateInter</th>
  <th>EtatIncid</th>
 <?php 
}
else {
 ?>
  <th>Description</th>
  <th>DateDemande</th>
  <th>Etat</th>
 <?php 
}
if ($function == "responsablecli" OR ($function == "responsableint" AND $q4 =="cli")){
 ?>
  <th>TypeInter</th>
  <th>Urgence</th>
 <?php         
    if($function == "responsableint"){
      ?>
       <th>Entreprise</th>
      <?php
    }    
    if ($q4 == "cli" AND $function != "responsableint"){
    	?>
       <th>intervenant</th>
       <th>Utilisateur</th>
       <th>FicheInter2</th>
      <?php
    	}
}
if ($function == "intervenant" AND $q4 !="inter"){
	    ?>  
        <th>Type</th>
        <th>Urgence</th>
        <th>Entreprise</th>
      <?php  
}
}
?>
 </tr>
 <?php
while($row = mysqli_fetch_array($result))
  {
if ($function == "responsablecli" AND $q4 !="respcli"){
?>
	<tr>
	<td><?php echo ($row['INT_CODE']);?></td>
	<td><?php echo ($row['INT_LIBELLE']);?></td>
	<td><?php echo ($row['INC_LIBELLE']);?></td>
	<td><?php echo (substr($row['INT_DATEINTER'],0,10));?></td>
	<td><?php echo ($row['ETA_LIBELLE']);?></td>
  <td><?php echo ($row['LIB_LIBELLE']);?></td>
  <td><?php echo ($row['URG_LIBELLE']);?></td>
  <td><?php echo ($row['UTI_LOGIN']);?></td>
  <td><?php echo ($row['INC_DEMANDE']);?></td>
  <td>
  <form action="?page=afficheintervention" method="POST">
                
                <input type="submit" name="test" id="test" value="<?php echo ($row['INT_CODE']); ?>" onClick="
                  if(confirm('Vous allez consulter les informations concernant les incidents'))
                  {
                    submit()
                  }
                  else{
                  return false;
                  }
                  "/>
              </form>
 </td>
<?php  	 
}
elseif ($function == "responsableint" and $q4 !="inter" and $q4 !="cli") {
?>  
  <tr>
  <td><?php echo ($row['UTI_CODE']);?></td>
  <td><?php echo ($row['UTI_LOGIN']);?></td>
  <td><?php echo ($row['ENT_RAISONSOCIALE']);?></td>
  <td><?php echo ($row['UTI_TELEPHONEFIXE']);?></td>
  <td><?php echo ($row['UTI_MAIL']);?></td>
  <td><?php echo ($row['ROL_LIBELLE']);?></td>
  <td>
  <form action="?page=modifutilisateur" method="POST">
                
                <input type="submit" name="test" id="test" value="<?php echo ($row['UTI_LOGIN']); ?>" onClick="
                  if(confirm('Vous allez consulter les informations concernant les incidents'))
                  {
                    submit()
                  }
                  else{
                  return false;
                  }
                  "/>
              </form>
  
</td>
<?php 
}
elseif ($q4 == "inter") {
?>  
  <tr>
  <td><?php echo ($row['INT_CODE']);?></td>
  <td><?php echo ($row['INT_LIBELLE']);?></td>
  <td><?php echo ($row['INC_LIBELLE']);?></td>
  <td><?php echo (substr($row['INT_DATEINTER'],0,10));?></td>
  <td><?php echo ($row['LIB_LIBELLE']);?></td>
  <td><?php echo ($row['INC_DEMANDE']);?></td>
  <td><?php echo ($row['INT_TECHNICIEN']);?></td>
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
 </td>
<?php 
}
else {		      
?>
    <tr>
    <td><?php echo ($row['INC_CODE']);?></td>
    <td><?php echo ($row['INC_LIBELLE']);?></td>
    <td><?php echo ($row['INC_DESCRIPTION']);?></td>
    <td><?php echo (substr($row['INC_DATEDEMANDE'],0,10));?></td>
    <td><?php echo ($row['ETA_LIBELLE']);?></td>
  if ($function == "responsableint") {
    <td><?php echo ($row['LIB_LIBELLE']);?></td>
    <td><?php echo ($row['URG_LIBELLE']);?></td>
    <td><?php echo ($row['ENT_RAISONSOCIALE']);?></td>
  <td>
  <form action="?page=ficheincident" method="POST">
                
                <input type="submit" name="test" id="test" value="<?php echo ($row['INC_CODE']); ?>" onClick="
                  if(confirm('Vous allez consulter les informations concernant les incidents'))
                  {
                    submit()
                  }
                  else{
                  return false;
                  }
                  "/>
              </form>
  </td>
 <?php 
    }  
  if ($q4 =="respcli" ){ 
    ?>
  	<td><?php echo ($row['LIB_LIBELLE'] );?></td>
    <td><?php echo ($row['URG_LIBELLE'] );?></td>
    <td> 
      <form action="?page=ficheincident" method="POST">
      <input type="submit" value="PDF"></input>
      <input type="hidden" name="test" id="test" value="<?php echo ($row['INC_CODE'])?>">
      </form>
    </td>
  <?php
    	}
  if ($function == "intervenant" ){
    ?>
  	<td><?php echo ($row['LIB_LIBELLE'] );?></td>
    <td><?php echo ($row['URG_LIBELLE'] );?></td>
    <td><?php echo ($row['ENT_RAISONSOCIALE'] );?></td>
  <td>
  <form action="?page=ficheincident" method="POST">
                
                <input type="submit" name="test" id="test" value="<?php echo ($row['INC_CODE']); ?>" onClick="
                  if(confirm('Vous allez consulter les informations concernant les incidents'))
                  {
                    submit()
                  }
                  else{
                  return false;
                  }
                  "/>
              </form>
  <?php

  }  	  
  if ($q4 == "inter" ) {
  	echo "test";
  }
}	
  echo "</tr>";
  
  echo "</table>";
?>