<?php
	$sLogin = $_SESSION["login"];	
	require_once ("FO/Modeles/Tickets/lireTicket.inc.php") ;
	require_once ("FO/Modeles/Users/lireUser.inc.php") ;
	require_once ("fo_affecterTicket.php") ;
	$lesEtats = getAllEtats() ;
?>
	<fieldset >		
		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Suivi des tickets</h3>
	            </div>
	        </div>
    	</div>
		<div class="col span_11">
            <div class="accordion clr">
                <div class="title">Déclarés</div>
                <div class="inner">
		<form name="suivisTickets" >
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
						</tr>
<?php
						$lesTickets = getAlldeclares() ;
						foreach ($lesTickets as $unTicket) 		
						{
?>	
							<tr>
								<td><?php echo $unTicket->Tic_Num ;  ?></td>
								<td><?php echo $unTicket->Dem; ?></td>
								<td><?php echo modifierDate($unTicket->Tic_DatCre); ?></td>
								<td><?php echo $unTicket->Tic_Salle ; ?></td>
								<td><?php echo $unTicket->Tic_Materiel ; ?></td>
								<td><?php echo $unTicket->Cat_Libelle ;?></td>	
								<td><?php echo stripslashes($unTicket->Tic_Constat) ; ?></td>	
							</tr>
<?php
						}
?>
					</table>
				</div>
			</div>
		</form>
				</div>
			</div>
		</div>		
<?php
		foreach($lesEtats as $unEtat)
		{
			//var_dump($unEtat->Eta_Code);
			if(($unEtat->Eta_Code) != "1")
			{
?>
				<div class="col span_11">
					<div class="accordion clr">
						<div class="title"><?php echo $unEtat->Eta_Libelle ?></div>
						<div class="inner">
							<form name="suivisTickets" >
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
											</tr>
<?php
											$lesTickets = getLesTickets($unEtat->Eta_Code) ;
											foreach ($lesTickets as $unTicket) 
											{
?>	
												<tr>
													<td><?php echo $unTicket->Tic_Num ;  ?></td>
													<td><?php echo $unTicket->Dem; ?></td>
													<td><?php echo modifierDate($unTicket->Tic_DatCre); ?></td>
													<td><?php echo $unTicket->Tic_Salle ; ?></td>
													<td><?php echo $unTicket->Tic_Materiel ; ?></td>
													<td><?php echo $unTicket->Cat_Libelle ;?></td>	
													<td><?php echo stripslashes($unTicket->Tic_Constat) ; ?></td>	
													<td><?php echo $unTicket->Interv; ?></td>
												</tr>
	<?php
											}
?>
										</table>
									</div>
								</div>	
							</form>
						</div>
					</div>
				</div>	
<?php
			}
		}
?>
	</fieldset>
	

