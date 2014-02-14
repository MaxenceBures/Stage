<?php
//if(isset($_SESSION['login'])) {
require_once('function.php');
createincident();
$fonction = $_SESSION['fonction'];
	if($fonction == 'responsablecli' OR $fonction == 'intervenant' OR $fonction == 'responsableint'){
	$enreg = mysql_fetch_assoc(mysql_query("SELECT ENT_RAISONSOCIALE FROM ENTREPRISE, ID, UTILISATEUR WHERE ENTREPRISE.ENT_CODE = ID.ENT_CODE AND ID.UTI_CODE = UTILISATEUR.UTI_CODE AND UTILISATEUR.UTI_LOGIN = '".$_SESSION['login']."'"));
	$enreg2 = mysql_fetch_assoc(mysql_query("SELECT UTI_LOGIN FROM UTILISATEUR WHERE UTI_LOGIN = '".$_SESSION['login']."'"));
	  //$requete = 
	}
	else {
	$enreg = mysql_fetch_assoc(mysql_query("SELECT ENT_RAISONSOCIALE FROM ENTREPRISE, ID, UTILISATEUR WHERE ENTREPRISE.ENT_CODE = ID.ENT_CODE AND ID.UTI_CODE = UTILISATEUR.UTI_CODE AND UTILISATEUR.UTI_LOGIN = '".$_SESSION['login']."'"));
	$enreg2 = mysql_fetch_assoc(mysql_query("SELECT UTI_LOGIN FROM ID, UTILISATEUR WHERE ROL_CODE =2 AND ENT_CODE = (  SELECT ENT_CODE FROM ID, UTILISATEUR WHERE ID.UTI_CODE = UTILISATEUR.UTI_CODE AND UTILISATEUR.UTI_LOGIN =  '".$_SESSION['login']."' )  AND ID.UTI_CODE = UTILISATEUR.UTI_CODE"));
	//Bures Maxence
}
	
?>
	<html>
		<head>
		<script type="text/javascript" src="test.js" charset="iso_8859-1"></script>
		</head>
		<body>
		<h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3>
		<H2 align="center">AJOUT INCIDENT</H2>
		<div data-role="page">
<!--	<body>-->
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" data-ajax="false" id="ajout_form"> 
		<!-- <form id="ajout_form" data-ajax="false" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> -->
			<table class="style1">
				<tr>
					<td>
						<label for="nomEnt">Nom de l'entreprise : </label>
					</td>
					<?php if($fonction == "intervenant"){?>	
					<td>
					<select name="region" id="region" onchange="getDepartements2(this.value);">
     <option value="vide">- - - Choisissez une Entreprise - - -</option>
     <?php
        $oEntreprises = ListeDeroulanteEntreprise() ;
        foreach ($oEntreprises as $Entreprise)
        {
  ?>
          <option value="<?php echo $Entreprise['ENT_CODE']; ?>"><?php echo $Entreprise['ENT_RAISONSOCIALE'] ?> </option>
  <?php
        }
  ?> </select> 
						<!-- <select id="nomEnt" name="nomEnt" required="">
							<?php
							$oEntreprises = ListeDeroulanteEntreprise() ;
							foreach ($oEntreprises as $entreprise)
							{
				?>
								<option value="<?php echo $entreprise['ENT_RAISONSOCIALE']; ?>"><?php echo $entreprise["ENT_RAISONSOCIALE"] ?> </option>
				<?php
							}
				?>
						</select> -->
					</td>
					<?php
						}
							else { ?>
					<td>
						<input type="text" required="" id="nomEnt" value="<?php echo($enreg["ENT_RAISONSOCIALE"]); ?>" name="nomEnt" readonly/>
					</td>
					<?php } ?>		
				</tr>
				</br>
				<tr>
					<td>
						<label for="nomResp">Nom du responsable : </label>
					</td>
					<?php if($fonction == "intervenant"){?>	
					<td>
						<span id="blocEntreprises"></span><br />
					</td>
					 
					<!-- <td>
						<select id="nomResp" name="nomResp" required="">
							<?php
							$oEntreprises = ListeDeroulanteUtilisateur() ;
							foreach ($oEntreprises as $entreprise)
							{
				?>
								<option value="<?php echo $entreprise['UTI_LOGIN']; ?>"><?php echo $entreprise["UTI_LOGIN"] ?> </option>
				<?php
							}
				?>
						</select>
					</td> -->
					<?php
						}
							else { ?>
					<td>
						<input type="text" required="" value="<?php echo($enreg2["UTI_LOGIN"]); ?>"  id="nomResp" name="nomResp" readonly/>
					</td>
					<?php } ?>		
					<!-- <td>
						<input type="text" required="" value="<?php echo($enreg2["UTI_LOGIN"]); ?>"  id="nomResp" name="nomResp" readonly/>
					</td> -->
			</tr>
			</br>
		 	<tr>
				<td>
				<label for="type">Type Incident : </label>
				</td>
				<td>
				<select id="type" required="" name="type">
			<?php
			$oTypes = ListeDeroulanteType() ;
			foreach ($oTypes as $Type)
			{
?>
				<option value="<?php echo $Type['LIB_CODE']; ?>"><?php echo $Type["LIB_LIBELLE"] ?> </option>
<?php
			}
?>
				</select>
				</td>
			</tr>
			</br>
		 	<tr>
				<td>
				<label for="urgence">Type Urgence : </label>
				</td>
				<td>
				<select id="urgence" required=""  name="urgence">
			<?php
			$oUrgence = ListeDeroulanteUrgence() ;
			foreach ($oUrgence as $Urgence)
			{
?>
				<option value="<?php echo $Urgence['URG_CODE']; ?>"><?php echo $Urgence["URG_LIBELLE"] ?> </option>
<?php
			}
?>
				</select>
				</td>
			</tr>
			</br>
				<tr>
					<td>
						<label for="libelle">Libelle de l'incident : </label>
					</td>
					<td>
						<input type="text" id="libelle" required="" name="libelle"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="description">description de l'incident : </label>
					</td>
					<td>
						<textarea rows="4" cols="50"id="descr" name="descr"></textarea>
					</td>
				</tr>
				</br>
			<tr></tr>
			</table>
			</br>
						<input type="submit" name="go_createint" id="go_createint" value="Creer"/>
 
</form>
	<!--</body>-->
	</div>
	</body>
	</html>

