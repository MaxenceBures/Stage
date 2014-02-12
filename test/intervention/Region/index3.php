<?php
echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");
/* Variables de connexion : ajustez ces paramètres selon votre propre environnement */
$serveur = "localhost";
$admin   = "root";
$mdp     = "root";
$base    = "stage";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<script type="text/javascript" src="dept_xhr.js" charset="iso_8859-1"></script>
<?php
/* Requête SQL de récupération des données de la première liste */
$sql = "SELECT `ENT_CODE` AS idr, `ENT_RAISONSOCIALE` ".
       "FROM `ENTREPRISE` ".
       "ORDER BY `ENT_CODE`;";
/* Connexion et exécution de la requête */
$connexion = mysql_connect($serveur, $admin, $mdp);
if($connexion != false)
{
    $choixbase = mysql_select_db($base, $connexion);
    $recherche = mysql_query($sql, $connexion);
    /* Création du tableau PHP des valeurs récupérées */
    $regions = array();
    /* Index du département par tableau régional */
    $id = 0;
    while($ligne = mysql_fetch_assoc($recherche))
    {
        $regions[$ligne['idr']] = $ligne['ENT_RAISONSOCIALE'];
    }
?>
</head>
<body style="font-family: verdana, helvetica, sans-serif; font-size: 85%">
<h3>Version Utilisant AJAX</h3>
<p>Vous constaterez que le délai de latence entre la sélection et la mise à jour est quasiment intermédiaire entre les versions 100% PHP et JavaScript.</p>
<h3>Trouver un département</h3>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="chgdept">
  <fieldset style="border: 3px double #333399">
  <legend>Sélectionnez une région</legend>
    <select name="region" id="region" onchange="getDepartements(this.value);">
      <option value="vide">- - - Choisissez une région - - -</option>
    <?php
    /* Construction de la première liste : on se sert du tableau PHP */
    foreach($regions as $nr => $nom)
    {
        ?>
    <option value="<?php echo($nr); ?>"><?php echo($nom); ?></option>
<?php
    }
    ?>
    </select>
    <!-- ICI, le secret : on met un bloc avec un id ou va s'insérer le code de
         la seconde liste déroulande -->
  <span id="blocDepartements"></span><br />
  <input type="submit" name="ok" id="ok" value="Envoyer" />
  </fieldset>
</form>
<?php
}
else
{
    /*  Si vous arrivez ici, vous avez un gros problème avec la connexion au serveur de base de données */
?>
</head>
<body>
<p>La connexion au serveur de base de données a échoué. Aucun élément ne peut être affiché.</p>
<?php
}
?>
</body>
</html>