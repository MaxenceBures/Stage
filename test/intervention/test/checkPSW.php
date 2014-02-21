<?php
if (!isset($_GET['pseudo']) || !isset($_GET['mdp'])) { header('Location: ./a.html');} // Vérifie que l'on vient bien du formulaire
$pseudo = $_GET['pseudo'];
$mdp = sha1($_GET['mdp']);
// $pseudo_correct = 'a';
// $mdp_correct = 'p';

 $link = mysql_connect("localhost", "root", "root") or die("Impossible de se connecter : " . mysql_error());
mysql_select_db("stage");
 
// on exécute maintenant la requete sql pour tester si les parametres de connexion sont ok
$result = mysql_query("SELECT UTI_LOGIN, UTI_PWD, ROL_LIBELLE FROM UTILISATEUR, ROLE, ID WHERE UTI_LOGIN = '$pseudo' AND UTI_PWD = '$mdp' AND UTILISATEUR.UTI_CODE = ID.UTI_CODE AND ID.ROL_CODE = ROLE.ROL_CODE AND UTILISATEUR.UTI_DESACTIVE ='0'");
$membre = mysql_fetch_assoc($result);

if ($pseudo == $membre['UTI_LOGIN'] && $mdp == $membre['UTI_PWD']) {
// session_start();
			$_SESSION["login"]    = $membre['UTI_LOGIN'];
			$_SESSION["fonction"] = $membre['ROL_LIBELLE'];
echo 'OK';


}
else {
echo 'FALSE';

}
