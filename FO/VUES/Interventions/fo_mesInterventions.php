<?php
	$sLogin = $_SESSION["login"];	
	require_once ("/FO/Modeles/Interventions/lireIntervention.inc.php") ;
?>
	<br/>
	<fieldset>
		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Suivi de mes interventions en cours</h3>
	            </div>
	        </div>
    	</div>
		<div class="row row-big-col">
        	<div class="col span_12">
           		<table class="default-table">
					<tr>
						<th width="5%" >Num </th>
						<th width="13%">début</th>
						<th width="5%" >Ticket</th>
						<th width="13%">Demandé</th>
						<th width="13%">Salle</th>
						<th width="13%">Matériel</th>
						<th width="20%">Problème</th>
						<th width="20%">Choix</th>
					</tr>
<?php			
					$lesIntervs  = getAllInterv($sLogin ,3) ;
					foreach ($lesIntervs as $uneInterv)			
					{
?>	
						<tr>
							<td><?php echo $uneInterv["Int_Num"] ;  ?></td>
							<td><?php echo modifierDate($uneInterv["Int_Debut"]); ?></td>
							<td><?php echo $uneInterv["Tic_Num"] ;  ?></td>
							<td><?php echo modifierDate($uneInterv["Tic_DatCre"]); ?></td>
							<td><?php echo $uneInterv["Tic_Salle"] ; ?></td>
							<td><?php echo $uneInterv["Tic_Materiel"] ; ?></td>
							<td><?php echo $uneInterv["Cat_Libelle"] ;?></td>	
							<td><a href="?page=modifier&num=<?php echo $uneInterv['Int_Num']; ?>">traiter </a></td>	
							
						</tr>
<?php
					}
?>
				</table>
			</div>
		</div>		
	</fieldset>
	<br/><br/>
	