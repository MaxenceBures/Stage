<?php
	$sLogin = $_SESSION["login"];	
	require_once ("FO/Modeles/Users/lireUser.inc.php") ;
?>
<div id="formulaire">
	<fieldset>
		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Utilisateurs créés</h3>
	            </div>
	        </div>
    	</div>
		<br/>
		<form name="frm_utilisateurs" action="?page=suppUser" method="POST">
			<div class="row row-big-col">
        		<div class="col span_12">
           			<table class="default-table">
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Login</th>
							<th>Fonction</th>				
							<th>Suppression</th>
						</tr>
<?php			
						$lesUsers  = getAllUsers() ;
						foreach ($lesUsers as $unUser)			
						{
							// N'affiche que les utilisateurs à 0
							// Les utilisateurs à 1 sont désactivés et apparaiseent comme supprimés
							if ($unUser->Uti_Desactive==0)
							{

?>	
								<tr>
									<td><?php echo $unUser->Uti_Nom ;  ?></td>
									<td><?php echo $unUser->Uti_Prenom ; ?></td>
									<td><?php echo $unUser->Uti_Login ; ?></td>
									<td><?php echo $unUser->Uti_Fonction ;?></td>	
									<td> <center> <input type="checkbox" name="suppr[]" value="<?php echo $unUser->Uti_Code; ;?> " /> </center></td>
									
								</tr>
<?php
							}
						}
?>
					</table>
					<input type="submit" name="cmd_supp" value="Supprimer" onClick="
								if(confirm('Vous allez supprimer les utilisateurs sélectionnés?'))
								{	
									submit()
								}
									else{
									return false;
									}
								"
					/>
				</div>
			</div>
		</form>
	</fieldset>
</div>