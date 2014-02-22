<?php
	// $sLogin = $_SESSION["login"];	
	require_once ("FO/Modeles/Tickets/lireTicket.inc.php") ;
	require_once ("FO/Modeles/Users/lireUser.inc.php") ;

?>
<div id="formulaire">
	<fieldset >		
		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Tickets résolus</h3>
	            </div>
	        </div>
    	</div>
		<form name="frm_utilisateurs" action="?page=clore" method="POST"  >
			<div class="row row-big-col">
       			<div class="col span_12">
            		<table class="default-table">
						<tr>
							<th>Num</th>
							<th>Demandeur</th>
							<th>Date</th>
							<th>Salle</th>
							<th>Matériel</th>
							<th>Problème</th>
							<th>Constat</th>
							<th>Intervenant</th>
							<th>Etat</th>	
							<th>Clôturer </th>					
						</tr>
<?php
									
						$lesTickets = getLesTickets(6) ;
						//var_dump($lesTickets);
						foreach ($lesTickets as $unTicket) 		
						{
?>	
							<tr>
								<td><?php echo$unTicket->Tic_Num ;  ?></td>
								<td><?php echo$unTicket->Dem; ?></td>
								<td><?php echo modifierDate($unTicket->Tic_DatCre); ?></td>
								<td><?php echo$unTicket->Tic_Salle ; ?></td>
								<td><?php echo$unTicket->Tic_Materiel ; ?></td>
								<td><?php echo$unTicket->Cat_Libelle ;?></td>	
								<td><?php echo stripslashes($unTicket->Tic_Constat) ; ?></td>	
								<td><?php echo$unTicket->Interv; ?></td>
								<td><?php echo$unTicket->Eta_Libelle ; ?></td>
								<td><input type="checkbox" name="suppr[]" value="<?php echo $unTicket->Tic_Num; ;?> " /></td>
							</tr>
<?php
						}
?>
					</table>
					<input type="submit" name="cmd_supp" value="Clôturer" />
				</div>
			</div>
		</form>

		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Tickets sans solution</h3>
	            </div>
	        </div>
    	</div>
		<form name="frm_utilisateurs" action="?page=clore" method="POST">
			<div class="row row-big-col">
       			<div class="col span_12">
            		<table class="default-table">
						<tr>
							<th>Num</th>
							<th>Demandeur</th>
							<th>Date</th>
							<th>Salle</th>
							<th>Matériel</th>
							<th>Problème</th>
							<th>Constat</th>
							<th>Intervenant</th>
							<th>Etat</th>
							<th>Clôturer ?</th>						
						</tr>
<?php
									
						$lesTickets = getLesTickets(7) ;
						foreach ($lesTickets as $unTicket) 		
						{
?>	
							<tr>
								<td><?php echo$unTicket->Tic_Num ;  ?></td>
								<td><?php echo$unTicket->Dem; ?></td>
								<td><?php echo modifierDate($unTicket->Tic_DatCre); ?></td>
								<td><?php echo$unTicket->Tic_Salle ; ?></td>
								<td><?php echo$unTicket->Tic_Materiel ; ?></td>
								<td><?php echo$unTicket->Cat_Libelle ;?></td>	
								<td><?php echo stripslashes($unTicket->Tic_Constat) ; ?></td>	
								<td><?php echo$unTicket->Interv; ?></td>
								<td><?php echo$unTicket->Eta_Libelle ; ?></td>
								<td><input type="checkbox" name="suppr[]" value="<?php echo $unTicket->Tic_Num; ;?> " /></td>
							</tr>
<?php
						}
?>
					</table>
					<input type="submit" name="cmd_supp" value="Clôturer" />
				</div>
			</div>
		</form>
	</fieldset>
</div>

<center>
	<a class="button-a" href="?page=suivisTcks">
        <span class="button green medium">Visualiser tous les tickets</span>
    </a>
</center>