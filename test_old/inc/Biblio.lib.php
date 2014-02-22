<?php
	function verifierAdresseMail($pAdresse)
	{
  		$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';
   		if(preg_match($Syntaxe,$pAdresse)) {
      		return (true);
      	}
   		else{
     		return (false);
     	}
	}
	
	function protegerChaine($pChaine)
	{
		$pChaine = addslashes($pChaine);
		$pChaine = htmlspecialchars($pChaine, ENT_QUOTES);
		$pChaine = nl2br($pChaine);
		return ($pChaine);
	}
	
	function no_accent($pChAccent){
   		$avant = Array("/é/", "/è/", "/ê/", "/ç/", "/à/", "/â/", "/î/", "/ï/", "/ù/", "/ô/");
   		$apres = Array("e", "e", "e", "c", "a", "a", "i", "i", "u", "o");
   		$sChNoAccent = preg_replace($avant, $apres, $pChAccent);
   		return ($sChNoAccent);
	}
	
	function modifierDate($pDate){
		$pDate=substr($pDate,8,2)."/".substr($pDate,5,2)."/".substr($pDate,0,4);
		return ($pDate);
	}
		
	function protegerMail($pMail)
	{
		$bOk = true;
		$Arrob = explode("@", $pMail);
		if(count($Arrob) != 2 or strlen($Arrob[0]) < 1){ //Trop de arrobase ou e-mail trop court
			$bOk = false;
		}
		$Extens = explode(".", $Arrob[1]);
		if(strlen($Extens[count($Extens)-1]) < 2 or strlen($Extens[0]) <= 0){ //Extension trop courte ou pas de nom de domaine
			$bOk = false;
		}
		return ($bOk);
	}
	
	
	function modifierHeure($pHeure)
	{
		$pHeure=substr($pHeure,0,2).":".substr($pHeure,2,2).":".substr($pHeure,4,2);
		return ($pHeure);
	}	
	
	
	function NbFormat($pNombre)
	{
		$pNombre = number_format($pNombre, 2, ".", " ");
		return ($pNombre);
	}
	
	function genererChaine($pNbcar)	
	{
		$sChaine = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

		srand((double)microtime()*1000000);

		$sChGene="";

		for($i=0; $i<$pNbcar; $i++) 
		{
			$sChGene .= $chaine{rand()%strlen($sChaine)};
		}
		return ($sChGene);
	}	
	
?>
