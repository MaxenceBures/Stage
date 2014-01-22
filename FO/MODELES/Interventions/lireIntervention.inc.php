<?php
	function connecter()
	{
		require_once("classe/clstBaseMysql.classe.php") ;	
		//$oSql = new clstBaseMysql("localhost", "root", "", "GestInterv_G6") ;
		$oBdd = $_SESSION['bdd'];
		return ($oBdd) ;
	}
	
	// function __construct()
	// {
		// $this->oBdd = $_SESSION['bdd'];
	// }
	
	FUNCTION getUneInterv($pNum)
	{		
		$oBdd= connecter() ;		
		$sReq = " SELECT Tic_Num, Tic_DatCre, Tic_Salle, Cat_Libelle , Tic_Materiel, Int_Num, Int_Debut, Tic_Constat , Eta_Libelle
				  FROM INTERVENTION , CATEGORIE,  TICKET, ETAT
				  WHERE Int_Num         = :num
				  AND Tic_Categorie   = Cat_Code
				  AND Int_Ticket      = Tic_Num
				  AND Tic_Etat        = Eta_Code ";	
				  
		$uneInterv = $oBdd->query($sReq, array('num'=>$pNum), Bdd::SINGLE_RES);
		return($uneInterv);
		
		/*echo $sReq . "<br/>" ;
		$rstInterv = $oSql->query($sReq) ;	
		
		if ($uneLigne = $oSql->tabAssoc($rstInterv ) )
		{
			return($uneLigne) ;
		}*/
	}
	
	FUNCTION getAllInterv($pLogin, $pEtat)
	{		
		$oBdd= connecter() ;	

		$sReq = " SELECT Tic_Num, Tic_DatCre, Cat_Libelle , Tic_Materiel, Int_Num, Int_Debut,  Eta_Libelle
				  FROM INTERVENTION , CATEGORIE, UTILISATEUR,  TICKET, ETAT
				  WHERE Uti_Login     = :login
				  AND Tic_Etat        = :etat
				  AND Tic_Categorie   = Cat_Code
				  AND Tic_Intervenant = Uti_code					
				  AND Int_Ticket      = Tic_Num
				  AND Tic_Etat        = Eta_Code	
				  ORDER BY Tic_Num ";	

		/*$uneInterv = $this->oBdd->query($sReq, array('login'=>$pLogin, 'etat'=>$pEtat));
		return($uneInterv);   
				*/
	//mysql_connect('localhost','root','root','stage');
		$rstInterv = $oBdd->query($sReq, array('login'=>$pLogin, 'etat'=>$pEtat)) ;	
		// var_dump($sReq);
		// $iNb = 0 ;
		// $lesIntervs = array() ;		
		// while ($uneLigne = $oBdd->tabAssoc($rstInterv ) )
		// {
			// $iNb = $iNb + 1 ;
			// $lesIntervs[$iNb] =  $uneLigne ;
		// }
		return ($rstInterv) ;
	}
	
	
		
?>