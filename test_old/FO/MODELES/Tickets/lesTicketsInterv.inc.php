<?php
	require_once ('../../../classe/Bdd.class.php');
	require_once ('../../../inc/connecter.inc.php');
	require_once('lireTicket.inc.php') ;
	$iCodeInterv = $_POST["codeElt"] ;
?>
	<fieldset>
		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
					 <h3>Tickets de l'intervenant</h3>
				</div>
	        </div>
    	</div>
	
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
			$lesTickets  = getLesTicketsInterv($iCodeInterv) ;
			foreach ($lesTickets as $unTicket)			
			{
?>	
				<tr>
					<td><?php echo $unTicket->Tic_Num ;  ?></td>
					<td><?php echo $unTicket->Tic_DatCre; ?></td>
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
						
	</fieldset>