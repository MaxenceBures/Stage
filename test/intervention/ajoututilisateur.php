<?php
//if(isset($_SESSION['login'])) {
require_once('function.php');
createutilisateur();
$fonction = $_SESSION['fonction'];
	
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
						<input type="text" id="nom" required="" name="nom"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="prenom">Prenom : </label>
					</td>
					<td>
						<input type="text" id="prenom" required="" name="prenom"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="mail">Mail : </label>
					</td>
					<td>
						<input type="text" id="mail" required="" name="mail"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="fixe">Telephone Fixe : </label>
					</td>
					<td>
						<input type="text" id="fixe" required="" name="fixe"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="portable">Telephone Portable : </label>
					</td>
					<td>
						<input type="text" id="portable" required="" name="portable"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="login">login : </label>
					</td>
					<td>
						<input type="text" id="login" name="login"/>
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
						<input type="submit" name="go_createeutilisateur" id="go_createutilisateur" value="Creer"/>
 
</form>
	<!--</body>-->
	</div>
	</body>
	</html>

