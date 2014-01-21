<?php	
	$oBdd = $_SESSION['bdd'];
	$dDateTick = date("Y-m-d");
	$sLogin    = $_SESSION["login"];
	$sFonction = $_SESSION["fonction"];
	//réception des valeurs saisies
	$sNumMat   = $_POST["lst_mat"];
	$sNumSalle = $_POST["lst_salle"];
	$iCat      = $_POST["lst_categ"];
	$sConstat  = protegerChaine($_POST["txt_constat"]);
	
	//génération d'un numéro d'intervention 
	$sReq = "SELECT COUNT(Tic_Num) +1 AS iNumTicket
		     FROM TICKET" ;
	$dataNumI  = $oBdd->query($sReq, null, Bdd::SINGLE_RES) ;
	
	//var_dump($iNumTicket);
	//$iNumTicket = $iNumTicket  +  1 ;	
		
	//Code du demandeur
	$sReq = " SELECT Uti_Code
			  FROM UTILISATEUR
			  WHERE Uti_Login = :login";
			  
	$iCode   = $oBdd->query($sReq, array('login'=>$sLogin), Bdd::SINGLE_RES) ;
			
	//insertion des données dans la base
	$sReq = "INSERT INTO TICKET(Tic_Num, Tic_Salle, Tic_Categorie, Tic_Materiel, Tic_DatCre, Tic_Etat, Tic_Demandeur)
		    VALUES (:numTicket, :numSalle, :cat, :numMat, :dateTicket, 1, :code)";

	$oBdd->exec($sReq, array(
				'numTicket'=>$dataNumI->iNumTicket,
				'numSalle'=>$sNumSalle,
				'cat'=>$iCat,
				'numMat'=>$sNumMat,
				'dateTicket'=>$dDateTick,
				'code'=>$iCode->Uti_Code
	));	
	
	//si il y a une description
	//$sConstat  = protegerChaine($_POST["txt_constat"]);
	if (!empty($sConstat))
	{
		//mise à jour de la table INTERVENTION
		$sReq = "UPDATE TICKET
				SET Tic_Constat = :constat
				WHERE Tic_Num   = :numTicket"  ;	
				
		$oBdd->exec($sReq, array('constat'=>$sConstat, 'numTicket'=>$dataNumI->iNumTicket));
	}
	if ($sFonction == "Demandeur")
	{
?>
	<script language="Javascript">
		alert("Ticket enregistré");
		window.location.replace("?page=monSuivi")
	</script>
<?php
	}
	elseif ($sFonction == "Intervenant")
	{
?>
	<script language="Javascript">
		alert("Ticket enregistré");
		window.location.replace("?page=monSuivi")
	</script>
<?php
	}
	elseif ($sFonction == "Responsable")
	{	
?>
	<script language="Javascript">
		alert("Ticket enregistré");
		window.location.replace("?page=suivisTcks")
	</script>
<?php
	}
?>