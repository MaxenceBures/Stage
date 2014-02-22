<header class="header-container">
    <div class="header-elements container">
        <div class="row span_12 no-margin-col">

			<div class="col span_1">
                <div class="logo">
                    <img src="images/logo3.png" alt="logo">
                </div>
            </div>

            <div class="col span_9">
                <nav class="menu-system">
                    <ul class="absolution">
<?php
	$sFonction = $_SESSION["fonction"] ;
	if ($sFonction == "utilisateur")
	{
?>
		<li><a href="?page=ajouter">Créer un ticket</a></li>
		<li><a href="?page=monSuivi">Suivre mes tickets et interventions</a></li>
<?php
	}
	elseif ($sFonction == "intervenant")
	{
?>
		<li><a href="?page=priseCharge">Prise en charge de tickets</a></li>
		<li><a href="?page=mesInterv">Suivre mes interventions</a></li>
		
<?php
	}
	elseif ($sFonction == "responsableint")
	{
?>   
		<li><a href="#">Utilisateurs</a>
			<ul>
				<li><a href="?page=suiviUser">Gérer les utilisateurs</a></li>
				<li><a href="?page=creer">Créer un utilisateur</a></li>
			</ul>
		</li>
		<li><a href="#">Tickets</a>
			<ul>
				<li><a href="?page=ajouter">Créer un ticket</a></li>
				<li><a href="?page=suivisTcks">Affecter et suivre les tickets</a></li>
				<li><a href="?page=monSuiviRp">Mes demandes</a></li>
				<li><a href="?page=lesTicketsInterv">Les demandes d'un intervenant</a></li>
				<li><a href="?page=reaffectTck">Réaffecter un ticket</a></li>
			</ul>
		</li>
		<li><a href="#">Interventions</a>
			<ul>
				<li><a href="?page=suivResp">Suivre les interventions</a></li>		
				<li><a href="?page=cloreInt">Clôturer les interventions</a></li>
			</ul>
		</li>
<?php
	}

?>
					</ul>
                </nav>
            </div>

        </div>
    </div>
</header>