<?php
	$sLogin = $_SESSION["login"];
	require_once ("FO/Modeles/Tickets/lireTicket.inc.php") ;
	// intégrer la liste déroulante
	require_once("FO/Vues/Tickets/fo_priseCharge.php") ;
?>
	<br /> <br />
	<fieldset >		
		<div class="row">
		        <div class="col span_12">
		            <div class="title-medium">
		                <h3>Suivi des tickets</h3>
		            </div>
		        </div>
	    	</div>
	    	<?php
	    	$lesTickets  = getAllTicketsAff($sLogin ,2) ;
	    	if(empty($lesTickets)){
								echo "Vous ne disposez pas de tickets affectés";
							}
							else{ 
	    	?>
	    <div class="col span_11">
            <div class="accordion clr">
                <div class="title">Tickets affectés</div>
                <div class="inner">
		<div class="row row-big-col">
       		<div class="col span_12">
            	<table class="default-table">
					<tr>
						<th>Ticket</th>
						<th>Création</th>
						<th>Salle</th>
						<th>Matériel</th>
						<th>Problème</th>
						<th>Constat</th>
						<th>Etat</th>				
					</tr>
<?php
						
					
					foreach ($lesTickets as $unTicket)			
					{
?>	
						<tr>
							<td><?php echo $unTicket->Tic_Num ; ?></td>
							<td><?php echo modifierDate($unTicket->Tic_DatCre) ; ?></td>
							<td><?php echo $unTicket->Tic_Salle ; ?></td>
							<td><?php echo $unTicket->Tic_Materiel ; ?></td>
							<td><?php echo $unTicket->Cat_Libelle ; ?></td>	
							<td><?php echo $unTicket->Tic_Constat ; ?></td>
							<td><?php echo $unTicket->Eta_Libelle ; ?></td>				
						</tr>
<?php
					}}
?>
				</table>
			</div>
		</div>	
				</div>
			</div>
		</div>
<?php
	    	$lesTickets  = getAllMesTickets($sLogin ,3) ;
	    	if(empty($lesTickets)){
								echo "</br>Vous ne disposez pas de tickets pris en charge";
							}
							else{ 
	    	?>
	<div class="col span_11">
            <div class="accordion clr">
                <div class="title">Tickets pris en charge</div>
                <div class="inner">
		<div class="row row-big-col">
       		<div class="col span_12">
            	<table class="default-table">
					<tr>
						<th>Ticket</th>
						<th>Création</th>
						<th>Salle</th>
						<th>Matériel</th>
						<th>Problème</th>
						<th>Constat</th>
						<th>Intervention</th>
						<th>Début</th>
						<th>Etat</th>				
					</tr>
<?php
					foreach ($lesTickets as $unTicket)		
					{
?>	
						<tr>
							<td><?php echo $unTicket->Tic_Num ; ?></td>
							<td><?php echo modifierDate($unTicket->Tic_DatCre) ; ?></td>
							<td><?php echo $unTicket->Tic_Salle ; ?></td>
							<td><?php echo $unTicket->Tic_Materiel ; ?></td>
							<td><?php echo $unTicket->Cat_Libelle ; ?></td>	
							<td><?php echo $unTicket->Tic_Constat ; ?></td>
							<td><?php echo $unTicket->Int_Num ; ?></td>	
							<td><?php echo modifierDate($unTicket->Int_Debut) ; ?></td>							
							<td><?php echo $unTicket->Eta_Libelle ; ?></td>		
				
						</tr>
<?php
					}}
?>
				</table>
			</div>
		</div>	
				</div>
			</div>
		</div>	
	</fieldset>