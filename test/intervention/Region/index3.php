<?php
echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");
/* Variables de connexion : ajustez ces param�tres selon votre propre environnement */
include('function.php');

?>
<head>

<title>Liste d�roulantes dynamiques li�es</title>
<script type="text/javascript" src="dept_xhr.js" charset="iso_8859-1"></script>
<?php

// $sql = "SELECT `ENT_CODE` AS idr, `ENT_RAISONSOCIALE` ".
//        "FROM `ENTREPRISE` ".
//        "ORDER BY `ENT_CODE`;";
/* Connexion et ex�cution de la requ�te */
$connexion = "oui" ;//mysql_connect($serveur, $admin, $mdp);
if($connexion == "oui")
{
    //$choixbase = mysql_select_db($base, $connexion);
    // $recherche = mysql_query($sql);//, $connexion);
    // /* Cr�ation du tableau PHP des valeurs r�cup�r�es */
    // $regions = array();
    //  Index du d�partement par tableau r�gional 
    // $id = 0;
    // while($ligne = mysql_fetch_assoc($recherche))
    // {
    //     $regions[$ligne['idr']] = $ligne['ENT_RAISONSOCIALE'];
    // }
?>
</head>
<body style="font-family: verdana, helvetica, sans-serif; font-size: 85%">
<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="chgdept">
  
  <legend>S�lectionnez une r�gion</legend>
   <!--  <select name="region" id="region" onchange="getDepartements(this.value);">
      <option value="vide">- - - Choisissez une r�gion - - -</option>
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
     <option value="vide">- - - Choisissez une r�gion - - -</option>
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
    /*  Si vous arrivez ici, vous avez un gros probl�me avec la connexion au serveur de base de donn�es */
?>
</head>
<body>
<p>La connexion au serveur de base de donn�es a �chou�. Aucun �l�ment ne peut �tre affich�.</p>
<?php
}
?>
</body>
</html>