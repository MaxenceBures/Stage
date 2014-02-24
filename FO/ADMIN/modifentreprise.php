<?php
// require_once('function.php');
modifentreprise();
// $fonction = $_SESSION['fonction'];
$test = $_POST['test'];
var_dump($test);
$enreg = mysql_fetch_assoc(mysql_query("SELECT ENT_RAISONSOCIALE, ENT_RUE,ENT_ADRESSE2, ENT_ADRESSE3, ENT_CP, ENT_VILLE, ENT_MAIL, ENT_TELEPHONE, ENT_SITEWEB, ENT_TRIGRAMME  FROM ENTREPRISE WHERE ENT_CODE ='".$test."'"));

	
?>
	<html>
		<head>
		<script type="text/javascript" src="JS/fonctions.js" charset="iso_8859-1"></script>
		</head>
		<body>
		<H2 align="center">Modif ENTREPRISE</H2>
		<div data-role="page">
<!--	<body>-->
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" data-ajax="false" id="ajout_form"> 
			<table class="style1">
				<tr>
					<td>
						<label for="nomEnt">Raison Sociale : </label>
					</td>
					<td>
						<input type="text" id="nomEnt" required="" value="<?php echo ($enreg['ENT_RAISONSOCIALE']); ?>" name="nomEnt" readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="adresse">Adresse : </label>
					</td>
					<td>
						<input type="text" id="adresse" required="" name="adresse" value="<?php echo ($enreg['ENT_RUE']); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="adresse">Adresse2 : </label>
					</td>
					<td>
						<input type="text" id="adresse2" required="" name="adresse2" value="<?php echo ($enreg['ENT_ADRESSE2']); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="adresse">Adresse3 : </label>
					</td>
					<td>
						<input type="text" id="adresse3" required="" name="adresse3" value="<?php echo ($enreg['ENT_ADRESSE3']); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="cp">Code postal : </label>
					</td>
					<td>
						<input type="text" id="cp" required="" name="cp" value="<?php echo ($enreg['ENT_CP']); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="ville">Ville : </label>
					</td>
					<td>
						<input type="text" id="ville" required="" name="ville" value="<?php echo ($enreg['ENT_VILLE']); ?>" />
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="mail">Mail : </label>
					</td>
					<td>
						<input type="text" id="mail" required="" name="mail" value="<?php echo ($enreg['ENT_MAIL']); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="fixe">Telephone Fixe : </label>
					</td>
					<td>
						<input type="text" id="fixe" name="fixe" value="<?php echo ($enreg['ENT_TELEPHONE']); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="web">Site Web : </label>
					</td>
					<td>
						<input type="text" id="web" name="web" value="<?php echo ($enreg['ENT_SITEWEB']); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="web">Trigramme : </label>
					</td>
					<td>
						<input type="text" id="tri" name="tri" value="<?php echo ($enreg['ENT_TRIGRAMME']); ?>" readonly/>
					</td>
				</tr>
			</table>
			</br>
						<input type="submit" name="go_modifentreprise" id="go_modifentreprise" value="Modifier"/>
 
</form>
	<!--</body>-->
	</div>
	</body>
	</html>

