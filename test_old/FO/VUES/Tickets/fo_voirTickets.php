<?php
	require_once("FO/MODELES/Tickets/lireTicket.inc.php") ;
	$sLogin = $_SESSION["login"] ;
?>
	<div class="row">
		<div class="col span_12">
			<div class="title-medium">
				Choisir un intervenant : 
				<!--Mise en place d'Ajax pour alimenter la liste des tickets-->
				<select name="lst_interv" id="lst_interv" onchange="envoyerListe('POST','Tickets/lesTicketsInterv',this.name ,'lstTickets')">
<?php
					$lesIntervs = getlesIntervenants($sLogin) ;
					foreach ($lesIntervs as $unInterv)
					{
?>
						<option value="<?php echo $unInterv->Uti_Code ; ?>"><?php echo $unInterv->Uti_Nom ; ?></option>
<?php
					}
?>
				</select><br /> <br />
			</div>
		</div>
	</div>
	<div id="lstTickets" name="lstTickets" style="display:inline">
			
	</div>	
