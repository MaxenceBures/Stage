<p class="testimonials-author">
<?php
	$login     = $_SESSION["login"];
	$sFonction = $_SESSION["fonction"];  
	echo  $login . "/" ;
	echo  $sFonction ;
?>
</p>	
<a href="?page=deconnexion" onClick="if(confirm('Etes vous sur de vouloir vous deconnecter ?')){submit()}else{return false;}"><img src="images/deconnnecter.png" alt="Se déconnecter"></a>