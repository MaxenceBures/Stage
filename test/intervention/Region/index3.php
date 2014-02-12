<?php
echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");
/* Variables de connexion : ajustez ces paramètres selon votre propre environnement */
include('function.php');

?>
<head>

<title>Liste déroulantes dynamiques liées</title>
<script type="text/javascript" src="dept_xhr.js" charset="iso_8859-1"></script>
<?php

// $sql = "SELECT `ENT_CODE` AS idr, `ENT_RAISONSOCIALE` ".
//        "FROM `ENTREPRISE` ".
//        "ORDER BY `ENT_CODE`;";
/* Connexion et exécution de la requête */
$connexion = "oui" ;//mysql_connect($serveur, $admin, $mdp);
if($connexion == "oui")
{
    //$choixbase = mysql_select_db($base, $connexion);
    // $recherche = mysql_query($sql);//, $connexion);
    // /* Création du tableau PHP des valeurs récupérées */
    // $regions = array();
    //  Index du département par tableau régional 
    // $id = 0;
    // while($ligne = mysql_fetch_assoc($recherche))
    // {
    //     $regions[$ligne['idr']] = $ligne['ENT_RAISONSOCIALE'];
    // }
?>
</head>
<body style="font-family: verdana, helvetica, sans-serif; font-size: 85%">
<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="chgdept">
  
  <legend>Sélectionnez une région</legend>
   <!--  <select name="region" id="region" onchange="getDepartements(this.value);">
      <option value="vide">- - - Choisissez une région - - -</option>
    <?php

    foreach($regions as $nr => $nom)
    {
        ?>
    <option value="<?php echo($nr); ?>"><?php echo($nom); ?></option>
<?php
    }
    ?>
    </select>
  -->   
<select name="region" id="region" onchange="getDepartements(this.value);">
     <option value="vide">- - - Choisissez une région - - -</option>
     <?php
        $Users = ListeDeroulanteEntreprise() ;
        foreach ($Users as $User)
        {
  ?>
          <option value="<?php echo $User['ENT_CODE']; ?>"><?php echo $User['ENT_RAISONSOCIALE'] ?> </option>
  <?php
        }
  ?> </select>   
  <span id="blocDepartements"></span><br />
  <input type="submit" name="ok" id="ok" value="Envoyer" />
  
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