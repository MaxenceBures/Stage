<?php
//if(isset($_SESSION['login'])) {
		require_once('function.php');
	  //  createdemandeint();
	//Bures Maxence
	?>
	<html>
		<head>
		
		</head>
		<body>
		<div data-role="page">
<!--	<body>-->
		<form id="ajout_form" data-ajax="false" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<table class="style1">
				<tr>
					<td>
						<label for="nomEnt">Nom de l'entreprise : </label>
					</td>
					<td>
						<input type="text" required="" id="nomEnt" name="nomEnt"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="nomResp">Nom du responsable : </label>
					</td>
					<td>
						<input type="text" required="" id="nomResp" name="nomResp"/>
					</td>
			</tr>
			</br>
			<?php
			 /*	<tr>
					<td>
					<label for="Station">Station : </label>
					</td>
					<td>
					<select id="station" required="" name="station">
				<?php
				$oStation = ListeDeroulanteStation() ;
				foreach ($oStation as $Station)
				{
	?>
					<option value="<?php echo $Station['STA_CODE']; ?>"><?php echo $Station["STA_NOM"] ?> </option>
	<?php
				}
	?>
					</select>
					</td>
				</tr>*/
				?>
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
			
			</table>
			</br>
						<input type="submit" name="go_createint" id="go_createint" value="Creer"/>
		</form>

	<!--</body>-->
	</div>
	</body>
	</html>

<?php
/*}
else{
//header('Location:/Vlyon/Pages/connexion.php');
}*/
?>
