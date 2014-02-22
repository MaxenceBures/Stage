<?php
	$iNum = $_GET["num"] ;
	
	$sLogin = $_SESSION["login"];	
	require_once ("/FO/Modeles/Interventions/lireIntervention.inc.php") ;
	$uneInterv  = getUneInterv($iNum) ;
?>
	<fieldset>
		<legend> Modification de l'intervention </legend>
		<br/> <br/>
		<form name ="frm_intervention" action="ajouter" method="POST">
			<table border = 1>
				<tr>
					<th> Numéro intervention </th>
					<td><?php echo $uneInterv["Int_Num"] ; ?><input type ="hidden" name="txt_interv" id="txt_interv" value="<?php echo $iNum ; ?>"/></td>
					
				</tr>
				<tr>
					<th> Date création </th>
					<td><?php echo modifierDate($uneInterv["Int_Debut"]) ; ?></td>
				</tr>
				<tr>
					<th> Numéro Ticket </th>
					<td><?php echo $uneInterv["Tic_Num"] ; ?></td>
				</tr>
				<tr>
					<th> Date Demande </th>
					<td><?php echo modifierDate($uneInterv["Tic_DatCre"]) ; ?></td>
				</tr>
				<tr>
					<th>Salle </th>
					<td><?php echo $uneInterv["Tic_Salle"] ; ?></td>
				</tr>
				<tr>
					<th> Matériel</th>
					<td><?php echo $uneInterv["Tic_Materiel"] ; ?></td>
				</tr>
				<tr>
					<th> Etat</th>
					<td><?php echo $uneInterv["Eta_Libelle"] ; ?></td>
				</tr>
				<tr>
					<th>Constat </th>
					<td><?php echo $uneInterv["Tic_Constat"] ; ?></td>
				</tr>
				<tr>
					<th>Descriptif Tâches</th>
					<td><textarea id="txt_taches" name="txt_taches" cols="70" rows="10"  maxlength="100" ></textarea></td>
				</tr>
				<tr>		
					<td colspan="2"><center>
						<input type="submit" id="cmd_modifier" name="cmd_modifier" value="Modifier">
						<input type="reset" id="cmd_annuler" name="cmd_annuler" value="Annuler">
					</center></td>
				</tr>
			</table>
		</form>
	</fieldset>