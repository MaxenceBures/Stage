<?php
 	session_start();
 	/**
 	 * @todo mettre ici un include
 	 *       du fichier function connexion bdd
 	 *       et virer les autres dans le code
 	 */

	
	//require_once('include/connexion.inc.php');
	require_once('function.php');

	/**
	 * @todo ce truc la est un peu bof,
	 *       faut le passer dans connexion.inc
	 */
	//login();

	// Si la variable de session n'existe pas
	if(!isset($_SESSION['login'])) {
		// On affiche une page de login
		//include_once('Pages/connexion.php');
		//die();// on stop le chargement de la page
   }
   else{
					if(!isset($_GET['page']))
						$_GET['page'] = null;


					if($_GET['page'] == "Deconnexion"){
							logout();
							header('Location: index.php');
						    die();
					}

					switch($_GET['page'])
					{

						case "showincident":
							$fichier = "FO/INCIDENT/showincident.php";
							$titre   =  "test";
							break ;
						case "ajoutincident":
							$fichier = "FO/INCIDENT/ajoutincident.php";
							$titre   =  "test";
							break ;	
						case "afficheintervention":
							$fichier = "FO/INCIDENT/afficheintervention.php";
							$titre   =  "Liste";
							break ;
						case "showinterventionMesResponCli":
							$fichier = "FO/INTERVENTION/showinterventionMesResponCli.php";
							$titre   =  "ListeAjout";
							break ;	
						case "showinterventionIntervenant":
							$fichier = "FO/INTERVENTION/showinterventionIntervenant.php";
							$titre   =  "ListeAjout";
							break ;
						case "showutilisateur":
							$fichier = "FO/ADMIN/showutilisateur.php";
							$titre   =  "ListeAjout";
							break ;
						case "ajoututilisateur":
							$fichier = "FO/ADMIN/ajoututilisateur.php";
							$titre   =  "ListeAjout";
							break ;
						case "modifutilisateur":
							$fichier = "FO/ADMIN/modifutilisateur.php";
							$titre   =  "ListeAjout";
							break ;
						case "ajoutintervention":
							$fichier = "FO/INTERVENTION/ajoutintervention.php";
							$titre   =  "ListeAjout";
							break ;					
						
						case "Accueil":
							$fichier = "Pages/accueil.php" ;
							$titre   = "Deconnexion";
							break ;

						default :
							$fichier = "Pages/accueil.html" ;
							$titre   = "Accueil";
							break;
					}
						include 'INC/header.php';
						include($fichier);
						include 'INC/footer.html';
					?>

<?php

}
?>