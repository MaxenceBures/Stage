<?php
//if(isset($_SESSION['login'])) {
// require_once('function.php');
createRole();
// $fonction = $_SESSION['fonction'];
?>
	<html>
		<head>
		<script type="text/javascript" src="JS/fonctions.js" charset="iso_8859-1"></script>
		</head>
		<body>
		<h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3>
		<H2 align="center">AJOUT Role</H2>
		<div data-role="page">
<!--	<body>-->
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" data-ajax="false" id="ajout_form"> 
		<!-- <form id="ajout_form" data-ajax="false" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> -->
			<table class="style1">
		 	<tr>
				<td>
				<label for="user">Utilisateur : </label>
				</td>
				<td>
				<select id="user" required="" name="user">
			<?php
			$oUsers = ListeDeroulanteUtilisateursnonattribues() ;
			foreach ($oUsers as $User)
			{
?>
				<option value="<?php echo $User['UTI_CODE']; ?>"><?php echo $User["UTI_LOGIN"] ?> </option>
<?php
			}
?>
				</select>
				</td>
			</tr>
			</br>
		 	<tr>
				<td>
				<label for="entreprise">Entreprise : </label>
				</td>
				<td>
				<select id="entreprise" required="" name="entreprise">
			<?php
			$oEntreprises = ListeDeroulanteEntreprise() ;
			foreach ($oEntreprises as $entreprise)
			{
?>
				<option value="<?php echo $entreprise['ENT_CODE']; ?>"><?php echo $entreprise["ENT_RAISONSOCIALE"] ?> </option>
<?php
			}
?>
				</select>
				</td>
			</tr>
			<tr>
				<td>
				<label for="role">ROLE : </label>
				</td>
				<td>
				<select id="role" required="" name="role">
			<?php
			$oRoles = ListeDeroulanteRole() ;
			foreach ($oRoles as $role)
			{
?>
				<option value="<?php echo $role['ROL_CODE']; ?>"><?php echo $role["ROL_LIBELLE"] ?> </option>
<?php
			}
?>
				</select>
				</td>
			</tr>
			</table></br>
						<input type="submit" name="go_createrole" id="go_createrole" value="Creer"/>
 
</form>
	<!--</body>-->
	</div>
	</body>
	</html>

