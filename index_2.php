<?php
	header("Content-Type: text/html; charset=UTF-8");	
			
	$dDatJour = date("Y-m-d");	
	$page     = @$_GET["page"] ;
	require_once("inc/Biblio.lib.php") ;
	
// on load les class de gestion des BDD
	require_once ('classe/Bdd.class.php');
	session_start() ;

 if(!empty($_SESSION['login']))
    {
// on set l'obj de connexion SQL 
	require_once 'inc/connecter.inc.php';

	$titre = "Gestion des interventions" ;
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html>
<head>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta name="robots" content="none,noarchive">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <title><?php echo $titre ?></title>

	<!-- Appel des modules de CSS et de JS -->
<?php				
	require_once("mdl/fct_css.html") ;				
	require_once("mdl/fct_js.html") ;
?>

</head>
	<body>
		<header class="header-top">
		    <div class="container clr">
		        <div class="row no-margin-col">
<?php
			require_once("mdl/banniere.php") ;
?>
				</div>
		    </div>
		</header>
		<nav>
<?php			
			//si un utilisateur est connecté
			if (isset($_SESSION["login"]))
			{										
				require_once("mdl/menu.php") ;				
			}						
?>
		</nav>
		<article>
			<br/>
<?php
			switch($page)
			{
				case "ajouter":
					$fichier = "FO/Vues/Tickets/fo_creerTicket.php" ;
					$titre   = "Création d'un ticket";
					break ;					
				case "ajoutTck":
					$fichier = "FO/Modeles/Tickets/ajouterTicket.inc.php" ;
					break ;
					
				case "monSuivi":
					$fichier = "FO/Vues/Tickets/fo_monSuiviTickets.php" ;
					$titre   = "suivi de mes tickets du demandeur";
					break ;	
					
				case "monSuiviRp":
					$fichier = "FO/Vues/Tickets/fo_RespMesTickets.php" ;
					$titre   = "Le responsable peut voir ses tickets";
					break ;		
					
				case "affecter":
					$fichier = "FO/Vues/Tickets/fo_affecterTicket.php" ;
					$titre   = "Affectation des tickets par le responsable";
					break ;	
				case "affecTck":
					$fichier = "FO/Modeles/Tickets/affecterTicket.inc.php" ;
					break ;	
					
				case "suivisTcks":
					$fichier = "FO/Vues/Tickets/fo_lesSuivisTickets.php" ;
					$titre   = "suivi des tickets par le responsable ";
					break ;	
					
				case "priseCharge" :
					$fichier = "FO/Vues/Tickets/fo_suivisPriseCharge.php" ;
					$titre   = "prise en charge du ticket par l'intervenant ";
					break ;									
				case "chargeTick":
					$fichier = "FO/Modeles/Tickets/priseChargeTicket.inc.php" ;
					break ;	

				case "mesInterv":
					$fichier = "FO/Vues/Interventions/fo_mesInterventions.php" ;
					$titre   = "suivi de mes interventions";
					break ;	
				case "modifier":
					$fichier = "FO/Vues/Interventions/fo_modifierInterv.php" ;
					$titre   = "modification de l'intervention";
					break ;		
								
				case "creer":
					$fichier = "FO/Vues/Users/fo_creerUtilisateur.html" ;
					$titre   = "Créer un nouvel utilisateur";
					break ;
				case "creerUti":
					$fichier = "FO/Modeles/Users/ajouterUtilisateur.inc.php" ;
					break ;
				case "suiviUser":
					$fichier = "FO/Vues/Users/fo_suiviUtilisateurs.php" ;
					$titre   = "Visualiser  et gérer les utilisateurs";
					break ;	
				case "suppUser":
					$fichier = "FO/Modeles/Users/supprimerUtilisateur.inc.php" ;
					break ;
				
				case "deconnexion":
					$fichier = "inc/deconnecter.inc.php" ;
					break ;
					
				case "infoCnx":
					$fichier = "FO/Vues/fo_infoCnx.php" ;
					break ;	
					
				case "cloreInt":
					$fichier = "FO/Vues/Tickets/fo_cloturerTicket.php" ;
					$titre   = "Clôturer un ticket";
					break ;
					
				case "clore":
					$fichier = "FO/Modeles/Tickets/cloturerTicket.inc.php" ;
					break ;
					
				case "creer":
					$fichier = "FO/Vues/Users/fo_creerUtilisateur.html" ;
					$titre   = "Créer un nouvel utilisateur";
					break ;
					
				case "creerUti":
					$fichier = "FO/Modeles/Users/ajouterUtilisateur.inc.php" ;
					break ;
					
				case "lesTicketsInterv":
					$fichier = "FO/VUES/Tickets/fo_voirTickets.php" ;
					break ;
					
				case "reaffectTck":
					$fichier = "FO/Vues/Tickets/fo_reaffectTicket.php" ;
					break ;
				case "reaffect":
					$fichier = "FO/Modeles/Tickets/reaffecterTicket.inc.php" ;
					break ;

				default: $fichier = "FO/Vues/fo_accueil.php" ;
			}
			include($fichier) ;
?>					
		</article>
		<br/>
<?php
		require_once("mdl/footer.html") ;
?>
	<!-- permet de remonter en haut de la page -->
		<div class="to-top"></div>
	</body>
</html>
<?php
}
else{
	header('location: index.php');
}
?>