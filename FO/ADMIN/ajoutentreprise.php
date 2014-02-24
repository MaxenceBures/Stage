<?php
//if(isset($_SESSION['login'])) {
// require_once('function.php');
createentreprise();
// $fonction = $_SESSION['fonction'];
	
?>
	<html>
		<head>
		<script type="text/javascript" src="JS/fonctions.js" charset="iso_8859-1"></script>
		</head>
		<body>
		<h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3>
		<H2 align="center">AJOUT ENTREPRISE</H2>
		<div data-role="page">
<!--	<body>-->
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" data-ajax="false" id="ajout_form"> 
			<table class="style1">
				<tr>
					<td>
						<label for="nomEnt">Raison Sociale : </label>
					</td>
					<td>
						<input type="text" id="nomEnt" required="" name="nomEnt"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="adresse">Adresse : </label>
					</td>
					<td>
						<input type="text" id="adresse" required="" name="adresse"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="adresse">Adresse 2: </label>
					</td>
					<td>
						<input type="text" id="adresse2" required="" name="adresse2"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="adresse">Adresse 3: </label>
					</td>
					<td>
						<input type="text" id="adresse3" required="" name="adresse3"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="cp">Code postal : </label>
					</td>
					<td>
						<input type="text" id="cp" required="" name="cp"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="ville">Ville : </label>
					</td>
					<td>
						<input type="text" id="ville" required="" name="ville"/>
					</td>
				</tr>
				</br>
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
						<input type="text" id="fixe" name="fixe"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="web">Site Web : </label>
					</td>
					<td>
						<input type="text" id="web" name="web"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="web">Trigramme : </label>
					</td>
					<td>
						<input type="text" id="tri" name="tri"/>
					</td>
				</tr>
			</table>
			</br>
						<input type="submit" name="go_createentreprise" id="go_createentreprise" value="Creer"/>
 
</form>
	<!--</body>-->
	</div>
	</body>
	</html>

