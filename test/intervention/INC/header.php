<?php
$fonction = $_SESSION['fonction'];
?>
<h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3>
<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a>