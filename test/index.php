<?php
 	session_start();
 	 header( 'content-type: text/html; charset=utf-8' );

 	/**
 	 * @todo mettre ici un include
 	 *       du fichier function connexion bdd
 	 *       et virer les autres dans le code
 	 */

	
	//require_once('include/connexion.inc.php');
	require_once('INC/function.inc.php');
	// require_once ('test/Bdd.class.php');	

	/**
	 * @todo ce truc la est un peu bof,
	 *       faut le passer dans connexion.inc
	 */
	//login();

	// Si la variable de session n'existe pas
	if(!isset($_SESSION['login'])) {
		// On affiche une page de login
		 header("Location: PAGES/connexion.html");
		// echo "non connecte";
		//die();// on stop le chargement de la page
   }
   else{
$fonction = $_SESSION['fonction'];
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
							$fichier = "FO/INTERVENTION/afficheintervention.php";
							$titre   =  "Liste";
							break ;
						case "modifieretat":
							$fichier = "FO/INCIDENT/modifieretat.php";
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
						case "showentreprise":
							$fichier = "FO/ADMIN/showentreprise.php";
							$titre   =  "ListeAjout";
							break ;
						case "ajoutentreprise":
							$fichier = "FO/ADMIN/ajoutentreprise.php";
							$titre   =  "ListeAjout";
							break ;
						case "ajoutrole":
							$fichier = "FO/ADMIN/ajoutrole.php";
							$titre   =  "ListeAjout";
							break ;	
						case "modifentreprise":
							$fichier = "FO/ADMIN/modifentreprise.php";
							$titre   =  "ListeAjout";	
							break ;
						case "ajoutintervention":
							$fichier = "FO/INTERVENTION/ajoutintervention.php";
							$titre   =  "ListeAjout";
							break ;
						case "cloturer":
							$fichier = "FO/cloturer.php";
							$titre   =  "ListeAjout";
							break ;	
						case "ficheincident":
							$fichier = "FO/INCIDENT/ficheincident.php";
							$titre   =  "ListeAjout";
							break ;
						case "deconnexion":
							$fichier = "INC/deconnecter.inc.php";
							$titre   =  "ListeAjout";
							break ;	
						// case "verifCnx":
						// 	$fichier = "INC/verifierConnexion.inc.php";
						// 	$titre   =  "ListeAjout";
						// 	break ;
								
															
						
						case "Accueil":
							$fichier = "PAGES/accueil.php" ;
							$titre   = "Deconnexion";
							break ;

						default :
							$fichier = "PAGES/accueil.html" ;
							$titre   = "Accueil";
							break;
					}
						include 'PAGES/header.php';
						include($fichier);
						include 'PAGES/footer.html';
					?>

<?php

}
?>