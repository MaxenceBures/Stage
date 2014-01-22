<?php
	$sLogin = $_SESSION["login"];	
	require_once ("FO/Modeles/Tickets/lireTicket.inc.php") ;
?>
	<fieldset>
		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Suivi de mes tickets</h3>
	            </div>
	        </div>
    	</div>
		<div class="col span_11">
            <div class="accordion clr">
                <div class="title">Tickets créés</div>
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
									<th>Etat</th>
								</tr>
<?php			
								$lesTickets  = getMesTicketsResp($sLogin) ;
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
										<td><?php echo $unTicket->Eta_Libelle ; ?></td>
									</tr>
<?php
								}
?>
							</table>
						</div>
					</div>	
				</div>
			</div>
		</div>	
	</fieldset>