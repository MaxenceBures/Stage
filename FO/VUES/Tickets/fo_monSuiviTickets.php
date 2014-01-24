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
    	<?php
	$lesTickets  = getAllDemandes($sLogin ,1) ;
	if(empty($lesTickets)){
								echo "</br>Aucun tickets crées";
							}
							else{ 
	    
	?>
		
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
					</tr>
<?php			
							//	$lesTickets  = getAllDemandes($sLogin ,1) ;
								foreach ($lesTickets as $unTicket)			
								{
?>
						<tr>
							<td><?php echo $unTicket->Tic_Num ;  ?></td>
							<td><?php echo modifierDate($unTicket ->Tic_DatCre); ?></td>
							<td><?php echo $unTicket->Tic_Salle ; ?></td>
							<td><?php echo $unTicket->Tic_Materiel ; ?></td>
							<td><?php echo $unTicket->Cat_Libelle ;?></td>	
							<td><?php echo stripslashes($unTicket->Tic_Constat) ; ?></td>	
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
		<div class="col span_11">
<?php
	$lesTickets  = getAllDemandes($sLogin ,2) ;
	if(empty($lesTickets)){
								echo "</br>Vous ne disposez pas de tickets affectés";
							}
							else{ 
	    
	?>
		
            <div class="accordion clr">
                <div class="title">Tickets affectés</div>
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
					</tr>
<?php		
					//$lesTickets  = getAllDemandes($sLogin ,2) ;
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
		<div class="col span_11">		
	<?php
	$lesTickets  = getAllDemandes($sLogin ,3) ;
	if(empty($lesTickets)){
								echo "</br>Vous ne disposez pas de tickets pris en charge";
							}
							else{ 
	    
	?>
		
            <div class="accordion clr">
                <div class="title">Tickets pris en charge</div>
                <div class="inner">
		<div class="row row-big-col">
    		<div class="col span_12">
       			<table class="default-table">
					<tr>
			<?php
				//	$lesTickets  = getAllDemandes($sLogin ,3) ;
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