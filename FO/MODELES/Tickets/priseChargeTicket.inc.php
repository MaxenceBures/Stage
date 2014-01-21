<?php	
	//$sLogin     = $_SESSION["login"];
	//r�ception des valeurs saisies
	$iNumTicket = $_POST["lst_ticket"];
	$dDateInt   = date("Y-m-d");
	$oBdd = $_SESSION['bdd'] ;

	//mise � jour de la table TICKET
	$sReq = "UPDATE TICKET
	 		 SET   Tic_Etat = 3 
			 WHERE Tic_Num = :numTicket" ;//.$iNumTicket;
			 
	$oBdd->exec($sReq, array('numTicket'=>$iNumTicket));
	
	// cr�ation de l'intervention
	//g�n�ration d'un num�ro d'intervention 
	$sReq = "SELECT MAX(Int_Num) 
		     FROM INTERVENTION" ;
	$iNumInterv  = $oBdd->query($sReq) ;
	$iNumInterv  = $iNumInterv  +  1 ;
	
	//insertion des donn�es dans la base
	$sReq = "INSERT INTO INTERVENTION (Int_Num, Int_Ticket, Int_Debut)
		    VALUES (:numInt, :numTick, :date )";
	// echo $sReq ."<br/>" ;
	$oSql->exec($sReq, array('numInt'=>$iNumInterv, 'numTick'=>$iNumTicket, 'date'=>$dDateInt));	
	
	
?>
	<script language="Javascript">
		alert("Intervention prise en charge ");
		window.location.replace("?page=priseCharge")
	</script>