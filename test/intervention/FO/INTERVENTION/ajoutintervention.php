<?php
// session_start();
// if(isset($_SESSION['login'])) {
 // require_once('function.php');
createinter();
$fonction = $_SESSION['fonction'];

	
?>
	<html>
		<head>
		<script type="text/javascript" src="test.js" charset="iso_8859-1"></script>
		</head>
		<body>
		<!-- <h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3> -->
		<H2 align="center">AJOUT Intervention</H2>
		<div data-role="page">
<!--	<body>-->
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" data-ajax="false" id="ajout_form"> 
		<!-- <form id="ajout_form" data-ajax="false" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> -->
			<table class="style1">
				<tr>
					<td>
						<label for="nomEnt">Nom de l'entreprise : </label>
					</td>
					
					<td>
					<select name="nomEnt" id="nomEnt" onchange="getDepartements2(this.value);">
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
					</td>	
				</tr>
				</br>
				<tr>
					<td>
						<label for="incident">Incident: </label>
					</td>
					<?php if($fonction == "intervenant" OR $function == "responsableint"){?>	
					<td>
						<span id="blocEntreprises"></span><br />
					</td>
		
					<?php
						}
							else { ?>
					<td>
						<input type="text" required="" value="<?php echo($_SESSION['login']); ?>"  id="nomResp" name="nomResp" readonly/>
					</td>
					<?php } ?>		
					
			</tr>
			</br>
		 	<tr>
				<td>
				<label for="type">Type Incident : </label>
				</td>
				<td>
				<select id="type" required="" name="type">
			<?php
			$oTypes = ListeDeroulanteTypeInter() ;
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
			</br>
				<tr>
					<td>
						<label for="libelle">Libelle de l'intervention : </label>
					</td>
					<td>
						<input type="text" id="libelle" required="" name="libelle"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="description">description de l'intervention : </label>
					</td>
					<td>
						<textarea rows="4" cols="50"id="descr" name="descr"></textarea>
					</td>
				</tr>
				</br>
			<tr>
					<td>
						<label for="date">date de l'intervention : </label>
					</td>
					<td>
						<input type="date" id="date" name="date" placeholder="AAAA-MM-JJ"></input>
					</td>
				</tr>
				<tr>
					<td>
						<label for="debut">Heure de debut : </label>
					</td>
					<td>
						<input type="text" id="deb" name="deb"></input>
					</td>
					<td>
						<label for="fin">Fin : </label>
					</td>
					<td>
						<input type="text" id="fin" name="fin"></input>
					</td>
				</tr>
			</table>
			</br>
						<input type="submit" name="go_createint" id="go_createint" value="Creer"/>
 
</form>
	<!--</body>-->
	</div>
	</body>
	</html>

