<?php
	//r�cup�ration des valeurs valeurs saisies
	$sLogin = $_POST["txt_login"];
	$sMdp   = $_POST["pwd_mdp"];
	// il faudrait am�liorer la v�rification (utilisation de tableaux)
	// et �viter les injections SQL 
	$oBdd = $_SESSION['bdd'];
	
	//verification du login et du mot de passe
	// $sReq = " SELECT Uti_Login, Uti_Fonction
			  // FROM UTILISATEUR
			  // WHERE Uti_Login = '".$sLogin."'
			  // AND Uti_Mdp     = '".$sMdp."'";
			  
	$sReq = " SELECT UTI_LOGIN, ROL_LIBELLE
			  FROM UTILISATEUR U, ROLE R, ID I 
			  WHERE UTI_LOGIN = :Login
			  AND UTI_PWD     = :MDP
			  AND UTI_DESACTIVE ='0'
			  AND U.UTI_CODE = I.UTI_CODE
			  AND I.ROL_CODE = R.ROL_CODE";
	//traitement de la requ�te
	//$rstUti  = $oSql->query($sReq) ;						
	
	
	$user = $oBdd->query($sReq , array('Login'=>$sLogin, 'MDP'=>sha1($sMdp)), Bdd::SINGLE_RES);
	
	//if($ligne   = $oSql->tabAssoc($rstUti))
	//{
		//$sLoginR = $ligne["Uti_Login"] ;
	
		//si le curseur pr�sente un r�sultat
		if (!empty($user))
		{
			//on ouvre la session
			$_SESSION["login"]    = $user->UTI_LOGIN;
			$_SESSION["fonction"] = $user->ROL_LIBELLE ;

		
?>
			<script language="Javascript">
				window.location.replace("index_2.php");
			</script>		
<?php
		}

		else
		{
			//retour � la page de connexion
?>
			<script language="Javascript">
				alert("Impossible de se connecter. Identifiants incorrects.");
				window.location.replace("index.php");
			</script>
<?php
		}

?>
