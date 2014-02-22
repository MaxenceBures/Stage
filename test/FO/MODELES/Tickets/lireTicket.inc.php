<?php
	// function connecter()
	// {
		// require_once("classe/clstBaseMysql.classe.php") ;	
		// $oSql = new clstBaseMysql("localhost", "root", "", "GestInterv_TTS") ;
		// return ($oSql) ;
	// }	

	
	
	function getAllSalles()
	{	
		$sReq = " SELECT Sal_Num
				  FROM SALLE ";
		$lesSalles = $_SESSION['bdd']->query($sReq) ;
		return ($lesSalles) ;
		
		/*
		$rstSal = $oSql->query($sReq) ;
		$iNb = 0 ;
		$lesSalles = array() ;
		while ($uneLigne = $oSql->tabAssoc($rstSal) )
		{
			$iNb = $iNb + 1 ;
			$lesSalles[$iNb] =  $uneLigne ;
		}
		return ($lesSalles) ;
		*/
	}

	function getAllMateriels()
	{		
		//$oSql= connecter() ;
		$sReq = " SELECT Mat_Code, Mat_Libelle
				  FROM MATERIEL ";
		$lesMateriels = $_SESSION['bdd']->query($sReq) ;
		return ($lesMateriels) ;
		
		/*
		$rstMat = $oSql->query($sReq) ;

		$iNb = 0 ;
		$lesMateriels = array() ;		
		while ($uneLigne = $oSql->tabAssoc($rstMat) )
		{
			$iNb = $iNb + 1 ;
			$lesMateriels[$iNb] =  $uneLigne ;
		}
		return ($lesMateriels) ;
		*/
	}
	
	function getAllCategories()
	{		
		//$oSql= connecter() ;		
		$sReq = " SELECT Cat_Code ,Cat_Libelle 
				  FROM CATEGORIE ";
		$lesCategories = $_SESSION['bdd']->query($sReq) ;
		return ($lesCategories) ;
		
		/*		
		$rstCat = $oSql->query($sReq) ;	

		$iNb = 0 ;
		$lesCategories = array() ;		
		while ($uneLigne = $oSql->tabAssoc($rstCat) )
		{
			$iNb = $iNb + 1 ;
			$lesCategories[$iNb] = $uneLigne ;
		}
		return ($lesCategories) ;
		*/
	}
	
	
	// Les tickets du demandeur
	function getMesTickets($pLogin, $pEtat)
	{		
		var_dump($pEtat);
		//$oSql= connecter() ;		
		$sReq = " SELECT Tic_Num, Tic_Materiel 
				  FROM  TICKET , UTILISATEUR
				  WHERE Tic_Etat        = :etat
				  AND   Uti_Login       = :login
				  AND   Tic_Intervenant = Uti_Code
				  ORDER BY Tic_Num " ;	
				 
		$mesTickets = $_SESSION['bdd']->query($sReq, array('login' => $pLogin, 'etat' => $pEtat)) ;
		//$mesTickets = $_SESSION['bdd']->query($sReq) ;
		//, 'etat' => $pEtat
		//var_dump($sReq);
		return ($mesTickets) ;
		
		
	}
	
	// Les tickets du responsable
	function getMesTicketsResp($pLogin)
	{		
		//$oSql= connecter() ;		
		$sReq = "SELECT Tic_Num, Tic_Salle, Cat_Libelle, Tic_Materiel, Tic_DatCre, Tic_Constat, Eta_Libelle
				 FROM  TICKET, CATEGORIE , ETAT, UTILISATEUR 
				 WHERE Tic_Categorie  = Cat_Code   
				 AND Tic_Etat       = Eta_Code
				 AND Tic_Demandeur  = Uti_Code  
				 AND Uti_Login = :login
				 ORDER BY Eta_Code " ;	
		$mesTickets = $_SESSION['bdd']->query($sReq, array('login' => $pLogin)) ;
		return ($mesTickets) ;
	}
	
	// Tous les tickets déclarés pour le responsable	
	function getAllDeclares()
	{		
		//$oSql= connecter() ;
		$sReq = "SELECT Tic_Num, Tic_Salle, Cat_Libelle, Tic_Materiel, Tic_DatCre, Tic_Constat, Eta_Libelle , Uti_Nom  as Dem
				 FROM  TICKET, CATEGORIE , ETAT, UTILISATEUR 
				 WHERE Tic_Etat     = 1
				 AND Tic_Categorie  = Cat_Code   
				 AND Tic_Etat       = Eta_Code
				 AND Tic_Demandeur  = Uti_Code  
				 ORDER BY Tic_Num " ;	
		$lesTickets = $_SESSION['bdd']->query($sReq) ;
		return ($lesTickets) ;
		
		/*
		echo $sReq ;					 
		$rstTic = $oSql->query($sReq) ;	

		$iNb = 0 ;
		$lesTickets = array() ;		
		while ($uneLigne = $oSql->tabAssoc($rstTic) )
		{
			$iNb = $iNb + 1 ;
			$lesTickets[$iNb] =  $uneLigne ;
		}
		return ($lesTickets) ;
		*/
	}
	
	// Tous les tickets affectés pour le responsable	
	function getAllAffectes()
	{		
		//$oSql= connecter() ;
		$sReq = "SELECT Tic_Num, Tic_Salle, Cat_Libelle, Tic_Materiel, Tic_DatCre, Tic_Constat, Eta_Libelle , A.Uti_Nom  as Dem , B.Uti_Nom  as Interv
				 FROM  TICKET, CATEGORIE , ETAT, UTILISATEUR A, UTILISATEUR B  
				 WHERE Tic_Etat     = 2
				 AND Tic_Categorie  = Cat_Code   
				 AND Tic_Etat       = Eta_Code
				 AND Tic_Demandeur    =  A.Uti_Code  
				 AND Tic_Intervenant  =  B.Uti_Code 
				 ORDER BY Tic_Num " ;	
		$lesTickets = $_SESSION['bdd']->query($sReq) ;
		return ($lesTickets) ;
	}
	
	// Tous les autres tickets pour le responsable
	function getLesTickets( $pEtat)
	{		
		//$oSql= connecter() ;	
		$sReq = "SELECT Tic_Num, Tic_Salle, Cat_Libelle, Tic_Materiel, Tic_DatCre, Tic_Constat, Eta_Libelle , A.Uti_Nom  as Dem , B.Uti_Nom  as Interv
				 FROM  TICKET, CATEGORIE , ETAT, UTILISATEUR A, UTILISATEUR B 
				 WHERE Tic_Etat       = :etat
				 AND Tic_Categorie    = Cat_Code 
				 AND Tic_Etat         = Eta_Code
				 AND Tic_Demandeur    =  A.Uti_Code  
				 AND Tic_Intervenant  =  B.Uti_Code  
				 ORDER BY Tic_Num " ;	
				 
		$lesTickets = $_SESSION['bdd']->query($sReq, array('etat'=>$pEtat)) ;
		return ($lesTickets) ;
		
		/*
		echo $sReq ;					 
		$rstTic = $oSql->query($sReq) ;	

		$iNb = 0 ;
		$lesTickets = array() ;		
		while ($uneLigne = $oSql->tabAssoc($rstTic) )
		{
			$iNb = $iNb + 1 ;
			$lesTickets[$iNb] =  $uneLigne ;
		}
		return ($lesTickets) ;
		*/
	}
	
	// Intervenant et tickets affectés
	function getAllTicketsAff($pLogin, $pEtat)
	{		
		//$oSql= connecter() ;		
		$sReq = " SELECT Tic_Num, Tic_DatCre,Tic_Salle, Cat_Libelle , Tic_Materiel, Tic_Constat , Eta_Libelle
				  FROM CATEGORIE, UTILISATEUR,  TICKET, ETAT
				  WHERE Uti_Login     = :login
				  AND Tic_Etat        = :etat
				  AND Tic_Categorie   = Cat_Code
				  AND Tic_Intervenant = Uti_code					
				  AND Tic_Etat        = Eta_Code	
				  ORDER BY Tic_Num ";		
		$lesTickets = $_SESSION['bdd']->query($sReq, array('login' => $pLogin, 'etat' => $pEtat)) ;
		return ($lesTickets) ;
		
		/*
		//echo $sReq ;
		$rstTic = $oSql->query($sReq) ;	

		$iNb = 0 ;
		$lesTickets = array() ;		
		while ($uneLigne = $oSql->tabAssoc($rstTic) )
		{
			$iNb = $iNb + 1 ;
			$lesTickets[$iNb] =  $uneLigne ;
		}
		return ($lesTickets) ;
		*/
	}
	
	// Intervenant et les tickets pris en charge  (voire plus)
	function getAllMesTickets($pLogin, $pEtat)
	{		
		//$oSql= connecter() ;		
		$sReq = " SELECT Tic_Num, Tic_DatCre,Tic_Salle, Cat_Libelle , Tic_Materiel, Int_Num, Int_Debut, Tic_Constat , Eta_Libelle
				  FROM INTERVENTION , CATEGORIE, UTILISATEUR,  TICKET, ETAT
				  WHERE Uti_Login     = :login
				  AND Tic_Etat        = :etat
				  AND Tic_Etat        >= 3
				  AND Tic_Categorie   = Cat_Code
				  AND Tic_Intervenant = Uti_code					
				  AND Int_Ticket      = Tic_Num 
				  AND Tic_Etat        = Eta_Code	
				  ORDER BY Tic_Num ";		

		$lesTickets = $_SESSION['bdd']->query($sReq, array('login' => $pLogin, 'etat' => $pEtat)) ;
		return ($lesTickets) ;
		
		/*
		//echo $sReq ;
		$rstTic = $oSql->query($sReq) ;	

		$iNb = 0 ;
		$lesTickets = array() ;		
		while ($uneLigne = $oSql->tabAssoc($rstTic) )
		{
			$iNb = $iNb + 1 ;
			$lesTickets[$iNb] =  $uneLigne ;
		}
		return ($lesTickets) ;
		*/
	}
	
	
	// Toutes les demandes
	function getAllDemandes($pLogin, $pEtat)
	{		
		//$oSql= connecter() ;		
		/*$sReq = " SELECT Tic_Num, Tic_DatCre, Tic_Salle , Cat_Libelle, Tic_Materiel,  Tic_Constat, Eta_Libelle 
				  FROM  CATEGORIE, UTILISATEUR,  TICKET, ETAT
				  WHERE Uti_Login     = :login
				  AND Tic_Etat        = :etat
				  AND Tic_Categorie   = Cat_Code
				  AND Tic_Demandeur   = Uti_code					
				  AND Tic_Etat        = Eta_Code	
				  ORDER BY Tic_Num ";	*/



		$sReq = "SELECT DISTINCT  INCIDENT.INC_CODE,  INT_CODE, INC_LIBELLE, LIB_LIBELLE, INT_LIBELLE, INT_DESCRIPTION, INT_HEUREDEB, INT_HEUREFIN, INT_DATEINTER, ETA_LIBELLE, INC_DEMANDE, INT_TECHNICIEN, INC_DATEDEMANDE
				 FROM INTERVENTION, INCIDENT, LIBELLE, UTILISATEUR, ETAT, ID
				 WHERE UTI_LOGIN =  :login
				 AND INCIDENT.ETA_CODE =  :etat
				 AND INTERVENTION.INC_CODE = INCIDENT.INC_CODE
				 AND INTERVENTION.LIB_CODE = LIBELLE.LIB_CODE
				 AND INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
				 AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
				 ORDER BY INT_CODE ";
		$lesDemandes = $_SESSION['bdd']->query($sReq, array('login' => $pLogin, 'etat' => $pEtat)) ; //, 'etat' => $pEtat)
//var_dump($lesDemandes);
		return ($lesDemandes) ;
		
		/*
		$rstTic = $oSql->query($sReq) ;	

		$iNb = 0 ;
		$lesTickets = array() ;		
		while ($uneLigne = $oSql->tabAssoc($rstTic) )
		{
			$iNb = $iNb + 1 ;
			$lesTickets[$iNb] =  $uneLigne ;
		}
		return ($lesTickets) ;
		*/
	}
	function IncidentUtilisateur($pLogin, $pEtat)
	{		
		



		$sReq = "SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE
				 FROM INCIDENT, UTILISATEUR, ETAT
				 WHERE UTI_LOGIN =  :login
				 AND INCIDENT.ETA_CODE =  :etat
				 AND INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
				 AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
				 ORDER BY INT_CODE ";
		$lesDemandes = $_SESSION['bdd']->query($sReq, array('login' => $pLogin, 'etat' => $pEtat)) ; //, 'etat' => $pEtat)

		return ($lesDemandes) ;
		
		
	}

	function getAllEtats()
	{
		$sReq = " SELECT Eta_Code, Eta_Libelle
				  FROM  ETAT" ;
		$lesEtats = $_SESSION['bdd']->query($sReq) ;
		return ($lesEtats) ;
	}
	
	// Tout les intervenants et responsables
	function getlesIntervenants($pLogin)
	{
		$sReq = " SELECT Uti_Code, Uti_Nom
				  FROM  UTILISATEUR
				  WHERE Uti_Fonction = 'Intervenant'
				  OR Uti_Fonction = 'Responsable'
				  AND Uti_Login != :login" ;
		$lesIntervs = $_SESSION['bdd']->query($sReq, array('login' => $pLogin)) ;
		return ($lesIntervs) ;
	}
	
	// Les tickets d'un intervenants sélectionné
	function getLesTicketsInterv($pCode)
	{
		$sReq = " SELECT Tic_Num, Tic_DatCre, Tic_Salle, Cat_Libelle , Tic_Materiel, Tic_Constat , Eta_Libelle
				  FROM CATEGORIE, UTILISATEUR, TICKET, ETAT
				  WHERE Uti_Code     = :code
				  AND Tic_Categorie   = Cat_Code
				  AND Tic_Intervenant = Uti_code					
				  AND Tic_Etat        = Eta_Code	
				  ORDER BY Eta_Code ";		
		$lesTickets = $_SESSION['bdd']->query($sReq, array('code' => $pCode)) ;
		return ($lesTickets) ;
	}
	
?>