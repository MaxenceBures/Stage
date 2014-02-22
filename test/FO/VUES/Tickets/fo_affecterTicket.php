<div id="formulaire">
	<form id="frm_affectation" action="?page=affecTck" method="post">
		<fieldset> 			
		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Affecter un ticket</h3>
	            </div>
	        </div>
    	</div>
			<br />
			<table align="center">
				<tr>
					<th> Ticket : </th>
					<td>
						<select id="lst_ticket" name="lst_ticket" >
<?php		
							$lesTickets = getAllDeclares() ;
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
					<th>Intervenant : </th>
					<td>
						<select id="lst_interv" name="lst_interv" >
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
</div>
<br/>