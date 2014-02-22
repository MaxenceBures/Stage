<?php	
	//$sLogin     = $_SESSION["login"];
	// Réception des valeurs saisies
	If ($_POST["lst_ticket"] != null)
	{
		$iNumTicket  = $_POST["lst_ticket"] ;
	}
	else
	{
		$iNumTicket = null ;
	}
	$iCodeInterv = $_POST["lst_interv"];
	$oBdd = $_SESSION['bdd'];
	
	// Si il y a au moins un ticket dans la base
	if ($iNumTicket != null)
	{
		// Mise à jour de la table INTERVENTION
		$sReq = "UPDATE TICKET
				 SET Tic_Etat = 2 ,
				 Tic_Intervenant = :codeInterv
				 WHERE Tic_Num = :numTicket" ;
		$oBdd->exec($sReq, array('codeInterv'=>$iCodeInterv, 'numTicket'=>$iNumTicket));
		//$oSql->execute($sReq);
?>
	<script language="Javascript">
		alert("Intervention affectée");
		window.location.replace("?page=suivisTcks")
	</script>
<?php
	}
	else
	{
?>
		<script language="Javascript">
			alert("Il n'y a aucun ticket");
			window.location.replace("?page=suivisTcks")
		</script>
<?php
	}