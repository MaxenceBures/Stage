<?php	

	if(empty($_POST["suppr"]))
		header("Location: index_2.php?page=cloreInt");
		
	//$sLogin     = $_SESSION["login"];
	$oBdd = $_SESSION['bdd'];
	
	if(!empty($_POST["suppr"])) 
	{
		$suppr = $_POST["suppr"];
		$sReq = "UPDATE TICKET 
				SET Tic_Etat = 8
				WHERE Tic_Num IN (";
				
				foreach($suppr as $iNumUti)
				{					
					$sReq .=   $iNumUti.",";				
				}			
		$sReq =    substr($sReq, 0, strlen($sReq)-1);
		$sReq .=   ")"; //et on termine la requête" ;
		$sReqExe = $oBdd->exec($sReq);
	
?>
	<script language="Javascript">
		alert("Ticket clôturé");
		window.location.replace("?page=suivisTcks")
	</script>
<?php
	}
?>