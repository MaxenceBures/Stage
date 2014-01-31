<?php
	//récupération des valeurs valeurs saisies
	$sLogin = $_POST["txt_login"];
	$sMdp   = $_POST["pwd_mdp"];
	// il faudrait améliorer la vérification (utilisation de tableaux)
	// et éviter les injections SQL 
	
	$oBdd = $_SESSION['bdd'];
	
	//verification du login et du mot de passe
	// $sReq = " SELECT Uti_Login, Uti_Fonction
			  // FROM UTILISATEUR
			  // WHERE Uti_Login = '".$sLogin."'
			  // AND Uti_Mdp     = '".$sMdp."'";
			  
	$sReq = " SELECT Uti_Login, Uti_Fonction
			  FROM UTILISATEUR
			  WHERE Uti_Login = :Login
			  AND Uti_Mdp     = :MDP
			  AND Uti_Desactive ='0'";
	//traitement de la requête
	//$rstUti  = $oSql->query($sReq) ;						
	
	
	$user = $oBdd->query($sReq , array('Login'=>$sLogin, 'MDP'=>sha1($sMdp)), Bdd::SINGLE_RES);
	
	
	//if($ligne   = $oSql->tabAssoc($rstUti))
	//{
		//$sLoginR = $ligne["Uti_Login"] ;
	
		//si le curseur présente un résultat
		if (!empty($user))
		{
			//on ouvre la session
			$_SESSION["login"]    = $user->Uti_Login;
			$_SESSION["fonction"] = $user->Uti_Fonction ;

		
?>
			<script language="Javascript">
				window.location.replace("index_2.php");
			</script>		
<?php
		}

		else
		{
			//retour à la page de connexion
?>
			<script language="Javascript">
				alert("Impossible de se connecter. Identifiants incorrects.");
				window.location.replace("index.php");
			</script>
<?php
		}

?>
