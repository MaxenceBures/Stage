<?php
	$sFonction = $_SESSION["fonction"];
?>

		<div class="row">
	        <div class="col span_12">
	            <div class="title-medium">
	                <h3>Société TOUTISSUS</h3>
	            </div>
	        </div>
    	</div>

    <div class="row row-big-col">
        <div class="col span_12">
            <span class="text-bold">Cet outil de gestion des interventions va vous permettre :</span>
        </div>
    </div>

<?php
	if ($sFonction == "1")
	{
		include_once("Tickets/fo_monSuiviTickets.php") ;	
?>
		<ul>
			<li> de créer un ticket dès qu'un problème a été détecté</li>
			<li> de suivre le traitement de vos tickets</li>
			<li> de suivre les interventions réalisées</li>
		</ul>
<?php
	}
	if ($sFonction == "2")
	{
?>
		<ul>
			<li> de créer un ticket dès qu'un problème a été détecté</li>
			<li> de visualiser tous les tickets qui vous concerne</li>
			<li> de prendre en charge le ticket qui vous est affecté</li>
			<li> de visualiser tous les tickets (les votres et ceux qui vous ont été affectés) par état</li>
			<li> de visualiser toutes vos interventions</li>
			<li> de visualiser une de vos interventions (en détail) </li>
			<li> de modifier une de vos interventions : son état, les tâches effectuées (sauf si le ticket est clôturé)</li>
			<li> de déclarer qu'un ticket est résolu ou sans solution</li>
			<li> de suivre les interventions réalisées</li>		
			<li> de visualiser toutes les interventions selon un problème sélectionné</li>
		</ul>
<?php
	}
	elseif ($sFonction == "3")
	{
?>
		<ul>
			<li> de créer un ticket dès qu'un problème a été détecté</li>
			<li> de visualiser tous les tickets (déclarés, affectés, pris en charge, etc ...)</li>
			<li> d'affecter le ticket à un des intervenants</li>
			<li> de vous affecter le ticket si le ticket tarde à être pris en charge</li>
			<li> de visualiser toutes les interventions</li>
			<li> de visualiser une intervention (en détail) </li>
			<li> de modifier une intervention : son état, les tâches effectuées (sauf si le ticket est clôturé)</li>	
			<li> de visualiser tous les tickets et les interventions pour un intervenant qui a été sélectionné</li>			
			<li> de clôturer un ticket dont le problème est résolu </li>
			<li> de créer un utilisateur avec son rôle demandeur, intervenant ou responsable</li>
			<li> de supprimer un ou plusieurs utilisateurs </li>
		</ul>
<?php
	}
?>