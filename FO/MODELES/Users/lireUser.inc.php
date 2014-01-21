<?php
	function reconnecter()
	{
		require_once("classe/clstBaseMysql.classe.php") ;	
		//$oBdd = new clstBaseMysql("localhost", "root", "", "GestInterv_TTS") ;
		$oBdd = $_SESSION['bdd'];
		return ($oBdd) ;
	}	
	
	function getAllUsers()
	{		
		$oBdd= reconnecter() ;		
		$sReq = " SELECT Uti_Code, Uti_Nom, Uti_Prenom, Uti_Login, Uti_Fonction, Uti_Desactive
				  FROM UTILISATEUR 
				  ORDER BY Uti_Fonction";
		$rstUti = $oBdd->query($sReq) ;
		//$iNb = 0 ;
		//$lesUsers = array() ;		
		// while ($uneLigne = $oBdd->tabAssoc($rstUti) )
		// {
			// $iNb = $iNb + 1 ;
			// $lesUsers[$iNb] =  $uneLigne ;
		// }
		return ($rstUti) ;
	}
	
	function getAllIntervenants()
	{		
		$oBdd= reconnecter() ;
		$sReq = "SELECT Uti_Code, Uti_Nom, Uti_Prenom, Uti_Desactive
				 FROM   UTILISATEUR
				 WHERE  Uti_Fonction IN ('Intervenant', 'Responsable')
				 AND Uti_Desactive = 0
				 ORDER BY 2, 3 " ;
		$rstUti = $oBdd->query($sReq) ;
		// $iNb = 0 ;
		// $lesUsers = array() ;		
		// while ($uneLigne = $oBdd->tabAssoc($rstUti) )
		// {
			// $iNb = $iNb + 1 ;
			// $lesUsers[$iNb] =  $uneLigne ;
		// }
		return ($rstUti) ;
	}