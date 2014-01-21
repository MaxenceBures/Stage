<?php
require_once ("FO/Modeles/Tickets/lireTicket.inc.php") ;
require_once ("FO/Modeles/Users/lireUser.inc.php") ;

?>
<div id="formulaire">
	<form id="frm_reaffectation" action="?page=reaffect" method="post">
		<fieldset> 			
		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Réaffecter un ticket</h3>
	            </div>
	        </div>
    	</div>
			<br />
			<table align="center">
				<tr>
					<th> Ticket : </th>
					<td>
						<select id="lst_rticket" name="lst_rticket" >
<?php		
							$lesTickets = getAllAffectes() ;

							if ($lesTickets != null)
							{
								foreach ($lesTickets as $unTicket) 
								{	
?>							
									<option value="<?php echo $unTicket->Tic_Num ; ?>" > <?php echo $unTicket->Tic_Salle . " " . $unTicket->Tic_Materiel; ?> </option>		
<?php							
								}
							}
							else
							{
?>	
									<option value=<?php echo null ?>>Aucun ticket</option>
<?php
							}
?>							
							
						</select>
					</td>
				</tr>
				<tr>
					<th>Nouvel Intervenant : </th>
					<td>
						<select id="lst_rinterv" name="lst_rinterv" >
<?php		
							$lesIntervs = getAllIntervenants() ;
							foreach ($lesIntervs as $unInterv) 
							{	
?>							
									<option value="<?php echo $unInterv->Uti_Code ; ?>"><?php echo $unInterv->Uti_Nom . " " . $unInterv->Uti_Prenom; ?></option>
<?php							
							}
?>
						</select>
					</td>
				</tr>	
				<tr>
					<td colspan="2"><center>
						<input type="submit" name="cmd_valider" value="Valider"></center>
					</center></td>
				</tr>
			</table>
		</fieldset>
	</form>

	<br/>
	<div class="row">
        <div class="col span_12">
            <div class="title-medium">
                <h3>Tickets affectés</h3>
            </div>
        </div>
	</div>

    <div class="inner">
		<div class="row row-big-col">
    		<div class="col span_12">
       			<table class="default-table">
					<tr>
						<th>Num</th>
						<th>Date</th>
						<th>Salle</th>
						<th>Matériel</th>
						<th>Problème</th>
						<th>Constat</th>
						<th>Intervenant</th>
					</tr>
<?php			
					$lesTickets  = getAllAffectes() ;
					foreach ($lesTickets as $unTicket)			
					{
?>	
						<tr>
							<td><?php echo $unTicket->Tic_Num ;  ?></td>
							<td><?php echo modifierDate($unTicket->Tic_DatCre); ?></td>
							<td><?php echo $unTicket->Tic_Salle ; ?></td>
							<td><?php echo $unTicket->Tic_Materiel ; ?></td>
							<td><?php echo $unTicket->Cat_Libelle ;?></td>	
							<td><?php echo stripslashes($unTicket->Tic_Constat) ; ?></td>
							<td><?php echo $unTicket->Interv ; ?></td>	
						</tr>
<?php
					}
?>
				</table>
			</div>
		</div>
	</div>
</div>
<br/>