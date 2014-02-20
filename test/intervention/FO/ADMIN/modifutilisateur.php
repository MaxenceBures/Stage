<?php
require_once('function.php');
modifutilisateur();
$fonction = $_SESSION['fonction'];
$test = $_POST['test'];
var_dump($test);
$enreg = mysql_fetch_assoc(mysql_query("SELECT UTI_CODE, UTI_LOGIN, UTI_PWD, UTI_NOM, UTI_PRENOM, UTI_MAIL, UTI_TELEPHONEFIXE, UTI_TELEPHONEMOBILE, UTI_DESACTIVE  FROM UTILISATEUR WHERE UTI_LOGIN ='".$test."'"));
	
?>
	<html>
		<head>
		<script type="text/javascript" src="test.js" charset="iso_8859-1"></script>
		</head>
		<body>
		<h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3>
		<H2 align="center">AJOUT Utilisateur</H2>
		<div data-role="page">
<!--	<body>-->
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" data-ajax="false" id="ajout_form"> 
			<table class="style1">
				<tr>
					<td>
						<label for="nom">Nom : </label>
					</td>
					<td>
						<input type="text" id="nom" required="" value="<?php echo($enreg['UTI_NOM']); ?>" name="nom" readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="prenom">Prenom : </label>
					</td>
					<td>
						<input type="text" id="prenom" required="" value="<?php echo($enreg['UTI_PRENOM']); ?>" name="prenom" readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="mail">Mail : </label>
					</td>
					<td>
						<input type="text" id="mail" required="" value="<?php echo($enreg['UTI_MAIL']); ?>" name="mail"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="fixe">Telephone Fixe : </label>
					</td>
					<td>
						<input type="text" id="fixe" name="fixe" value="<?php echo($enreg['UTI_TELEPHONEFIXE']); ?>"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="portable">Telephone Portable : </label>
					</td>
					<td>
						<input type="text" id="portable" name="portable" value="<?php echo($enreg['UTI_TELEPHONEMOBILE']); ?>"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="login">login : </label>
					</td>
					<td>
						<input type="text" id="login" name="login" value="<?php echo($enreg['UTI_LOGIN']); ?>" readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="pwd">mot de passe : </label>
					</td>
					<td>
						<input type="text" id="pwd" name="pwd"/>
					</td>
				</tr>
			</table>
			</br>
						<input type="submit" name="go_modifutilisateur" id="go_modifutilisateur" value="Creer"/>
 
</form>
	<!--</body>-->
	</div>
	</body>
	</html>

