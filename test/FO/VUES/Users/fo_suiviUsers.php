<?php
	//$sLogin = $_SESSION["login"];	
	require_once ("inc/lireTicket.inc.php") ;
?>
	<fieldset>
		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Utilisateurs créés</h3>
	            </div>
	        </div>
    	</div>
		<br/>
		<table border =1 width="100%" >
			<tr>
				<th width="15%" >Nom</th>
				<th width="15%">Prénom</th>
				<th width="15%">Login</th>
				<th width="15%">Fonction</th>
				
				<th width="20%">Etat</th>
			</tr>
<?php			
			$lesUsers  = getAllUsers() ;
			foreach ($lesUsers as $unUser)			
			{
?>	
				<tr>
					<td><?php echo $unUser->Uti_Nom ;  ?></td>
					<td><?php echo $unUser->Uti_Prenom ; ?></td>
					<td><?php echo $unUser->Tic_Login ; ?></td>
					<td><?php echo $unUser->Tic_Fonction ;?></td>	
					
				</tr>
<?php
			}
?>
		</table>		
	</fieldset>