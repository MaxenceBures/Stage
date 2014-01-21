<?php
	mysql_connect('localhost', 'root', '');
    mysql_select_db('gestinterv_tts');

	//$sLogin = $_SESSION["login"];	
	if(!empty($_POST["suppr"])) 
	{
		$suppr = $_POST["suppr"];
		$sReq = "UPDATE UTILISATEUR
				SET Uti_Desactive = 1  
				WHERE Uti_Code IN (";
				foreach($suppr as $iNumUti)
				{					
					// vérifier s'il existe des tickets - requete avec $iNumUti
					// si oui message 
					
					// sinon
					$sReq .=   $iNumUti.",";				
				}			
		$sReq =    substr($sReq, 0, strlen($sReq)-1);
		$sReq .=   ");"; //et on termine la requête
		$oBdd = $_SESSION['bdd'];
		$sReqExe = $oBdd->exec($sReq);
		//echo $sReq ."<br/>" ;
	//	var_dump($sReq);
		//$oSql=mysql_query($sReq);
	//	var_dump($oSql);
?>
		<script language="Javascript">
			alert("Utilisateur supprimé");
		</script>		
<?php						
	}	
?>
	<script language="Javascript">
		window.location.replace("?page=suiviUser")
	</script>	