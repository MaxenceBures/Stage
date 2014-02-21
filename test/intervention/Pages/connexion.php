<?php


  $link = mysql_connect("localhost", "root", "root") or die("Impossible de se connecter : " . mysql_error());
mysql_select_db("stage");
 
// on exécute maintenant la requete sql pour tester si les parametres de connexion sont ok
$result = mysql_query("SELECT UTI_LOGIN, UTI_PWD FROM UTILISATEUR WHERE UTI_LOGIN = '$_POST[login]' AND UTI_PWD = 'sha1($_POST[pass])'");
$membre = mysql_fetch_assoc($result);
 
if(($_POST['login']==$membre['UTI_LOGIN'])&&(sha1($_POST['pass'])==$membre['UTI_PWD']))
{
	setcookie("UTI_LOGIN",$membre['UTI_LOGIN']); // genere un cookie contenant l'id du membre
	setcookie("UTI_PWD",$membre['UTI_PWD']); // genere un cookie contenant le login du membre		
	echo "0"; // on 'retourne' la valeur 1 au javascript si la connexion est bonne
}
else 
{
	echo "1"; // on 'retourne' la valeur 0 au javascript si la connexion n'est pas bonne
}

	/*
	connexion dans la base de données
	$link = mysql_connect("localhost", "root", "root")
    	or die("Impossible de se connecter : " . mysql_error());
	mysql_select_db("stage");

	$login = $_POST["login"];
	$mdp = sha1($_POST['pass']);
	$result = mysql_query("SELECT UTI_LOGIN, UTI_PWD FROM UTILISATEUR WHERE login = '$login' AND pass = '$mdp'");
	$membre = mysql_fetch_assoc($result);
	
    // $login = $_POST["login"];
    // $mdp = $_POST["pass"];
    if ($login == $membre['UTI_LOGIN'] && sha1($mdp) == $membre['PWD']) { echo 1;}
    else {echo 0;}*/
            
?>
