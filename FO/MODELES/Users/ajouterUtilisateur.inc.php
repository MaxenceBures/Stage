<?php
	$oBdd = $_SESSION['bdd'];
	//réception des valeurs saisies
	/*$sNom		= $_POST["txt_nom"];
	$sPrenom	= $_POST["txt_prenom"];
	$sLogin		= $_POST["txt_login"];
	$sMdp		= $_POST["pwd_mdp"];
	$sFonction	= $_POST["rad_fonction"];*/
	
	//génération d'un code pour le nouvel utilisateur
	$sReq= " SELECT MAX(UTI_CODE) AS nb
			FROM UTILISATEUR";
	//$iCode  = $oSql->getNombre($sReq) ;
	$maxCode = $oBdd->query($sReq, null, Bdd::SINGLE_RES);
	$iCode  = $maxCode->nb;
	$iCode = $iCode +1 ;
	//echo $iCode ;
	
	/*insertion des données dans la base
	$sReq = "INSERT INTO UTILISATEUR(Uti_Code , UTi_Login,  Uti_Mdp, Uti_Nom, Uti_Prenom , Uti_Fonction)
		      VALUES(".$iCode.", '".$sLogin."', '".$sMdp."', '".$sNom."', '".$sPrenom."', '".$sFonction."')" ;*/
			  
	$sReq = "INSERT INTO UTILISATEUR(Uti_Code , UTi_Login,  Uti_Mdp, Uti_Nom, Uti_Prenom , Uti_Fonction)
		  VALUES(:code, :login, :mdp, :nom, :prenom, :fonction)" ;
		  
	$rst = $oBdd->exec($sReq, array(
				  'code'=>$iCode, 
				  'login'=>$_POST["txt_login"],
				  'mdp'=>$_POST["pwd_mdp"],
				  'nom'=>$_POST["txt_nom"],
				  'prenom'=>$_POST["txt_prenom"],
				  'fonction'=>$_POST["rad_fonction"],		  
				  ));
			
	
	//echo $sReq;
	
	//$oSql->execute($sReq);
	if ($sFonction == "Responsable")
	{
?>
	<script language="Javascript">
		alert("Utilisateur enregistré");
		window.location.replace("?page=suiviUser");
	</script>	
<?php
	}
?>
