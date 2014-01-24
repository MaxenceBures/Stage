<?php
	// récuperer les résultats des requêtes
	
	$sLogin = $_SESSION["login"];
	$lesTickets  = getMesTickets($sLogin ,2) ;
	
?>
<div id="formulaire">
	<form id="frm_priseCharge" action="?page=chargeTick" method="post">
		<fieldset> 
			<div class="row">
		        <div class="col span_12">
		            <div class="title-medium">
		                <h3>Prise en charge des tickets affectés</h3>
		            </div>
		        </div>
	    	</div>
			<br/>
			<table align="center">
				<tr>
				<?php
					if(empty($lesTickets)){
								echo "Vous ne disposez d'aucun ticket";
							}
							else{ 
					?>
					<th> Ticket: </th>
					<td>
					
						<select id="lst_ticket" name="lst_ticket" >
<?php		
							
							//$lesTickets  = getMesTickets($sLogin ,2) ;
							foreach ($lesTickets as $unTicket)							
							{	
?>							
								<option value="<?php echo ($unTicket->Tic_Num) ; ?>" > <?php echo $unTicket->Tic_Num . "  -  " . $unTicket->Tic_Materiel ; ?> </option>			
<?php							
							}
?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="cmd_valider" value="Valider">
					</td>
					<?php
}
					?>
				</tr>
			</table>
		</fieldset>
	</form>
</div>