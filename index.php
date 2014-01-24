<?php
header("Content-Type: text/html; charset=ISO-8859-15");
require_once ('classe/Bdd.class.php');	
session_start() ;		
$dDatJour = date("Y-m-d");	
$page     = @$_GET["page"] ;
require_once("inc/connecter.inc.php") ;	
$titre = "Gestion des interventions" ;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <meta charset="utf-8">
	    <meta name="robots" content="all">

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
		<br/>
		<article>
	<?php
			switch($page)
			{
				case "connexion":
					$fichier = "FO/Vues/fo_connexion.html" ;
					$titre   = "Se connecter";
					break ;
			
				case "verifCnx":
					$fichier = "inc/verifierConnexion.inc.php" ;
					break ;
					
				case "infoCnx":
					$fichier = "FO/Vues/fo_infoCnx.php" ;
					break ;				
				
				default: $fichier = "FO/Vues/fo_connexion.html" ;
			}
		
			include($fichier) ;
	?>					
		</article>
	</body>
</html>