<?php	
	// récuperer les résultats des requêtes
	require_once ("FO/Modeles/Tickets/lireTicket.inc.php") ;
?>	
<div id="formulaire">
	<fieldset>	
		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Création d'un ticket correspondant à un incident</h3>
	            </div>
	        </div>
    	</div>
		<form id="frm_ticket" action="?page=ajoutTck" method="post">		
			<table align="center" >
				<tr>
					<th> Date création : </th>
					<td><label> <?php echo modifierDate($dDatJour) ; ?></label> </td>
				</tr>
				<tr>
					<th> Numéro salle : </th>
					<td>
				
						<select id="lst_salle" name="lst_salle">
<?php		
							$lesSalles = getAllSalles() ;
							foreach ($lesSalles as $uneSalle)
							{
?>						
								<option> <?php echo $uneSalle->Sal_Num  ; ?> </option>
<?php 						
							}
?>
						</select>
					</td>
				</tr>
				<tr>
					<th> Matériel concerné : </th>
					<td>
				
						<select id="lst_mat" name="lst_mat">
<?php
							$lesMateriels   = getAllMateriels() ;
							foreach ($lesMateriels as $unMateriel)
							{
?>						
								<option value="<?php echo $unMateriel->Mat_Code ; ?>"> <?php echo $unMateriel->Mat_Code . " - ". $unMateriel->Mat_Libelle ;  ?> </option>
<?php 						
							}
?>
						</select>
					</td>
				</tr>
				<tr>	
					<th>Catégorie de problème : </th>
					<td>
						<select id="lst_categ" name="lst_categ" >				
<?php
		
							$lesCategories  = getAllCategories() ;
							foreach ($lesCategories as $uneCategorie)
							{	
?>	
								<option value="<?php echo $uneCategorie->Cat_Code ; ?>" > <?php echo $uneCategorie->Cat_Libelle; ?></option>
<?php					
							}	
?>	
						</select>
					</td>
				</tr>
				<tr>	
					<th> Constat : </th>
					<td> <textarea class="default-input" id="txt_constat" name="txt_constat" rows="4" cols="30"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" id="cmd_valider" name="cmd_valider" value="Valider"></td>
					<td><input type="reset" id="cmd_annuler" name="cmd_annuler" value="Annuler"></td>
				</tr>
			</table>		
		</form>
	</fieldset>
</div>