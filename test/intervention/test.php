<?php
$test = $_POST['test'];
var_dump($test);
$enreg = mysql_fetch_assoc(mysql_query("SELECT ENT_RAISONSOCIALE FROM ENTREPRISE, ID, UTILISATEUR WHERE ENTREPRISE.ENT_CODE = ID.ENT_CODE AND ID.UTI_CODE = UTILISATEUR.UTI_CODE AND UTILISATEUR.UTI_LOGIN = '".$_SESSION['login']."'"));
// $enreg2 = mysql_fetch_assoc(mysql_query("SELECT UTI_LOGIN FROM UTILISATEUR WHERE UTI_LOGIN = '".$_SESSION['login']."'"));
	  //$requete = 
?>
<table>
<tr>
<td>
	<input type="text" required="" id="nomEnt" value="<?php echo($enreg["ENT_RAISONSOCIALE"]); ?>" name="nomEnt" readonly/>
</td>
</tr>
</table>					