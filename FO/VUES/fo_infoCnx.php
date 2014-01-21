<p class="testimonials-author">
<?php
	$login     = $_SESSION["login"];
	$sFonction = $_SESSION["fonction"];  
	echo  $login . "/" ;
	echo  $sFonction ;
?>
</p>	
<a href="?page=deconnexion"><img src="images/deconnnecter.png" alt="Se déconnecter"></a>