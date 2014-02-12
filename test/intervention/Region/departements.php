<?php
/**
 * Code qui sera aeeplé par un objet XHR et qui
 * retournera la liste déroulante des départements
 * correspondant à la région sélectionnée.
 */
/* Paramètres de connexion */
$serveur = "localhost";
$admin   = "root";
$mdp     = "root";
$base    = "stage";

/* On récupère l'identifiant de la région choisie. */
$idr = isset($_GET['idr']) ? $_GET['idr'] : false;
/* Si on a une région, on procède à la requête */
if(false !== $idr)
{
    /* Cération de la requête pour avoir les départements de cette région */
    $sql2 = "SELECT ID.UTI_CODE, UTI_LOGIN
             FROM UTILISATEUR, ID 
             WHERE UTILISATEUR.UTI_CODE = ID.UTI_CODE
             AND ROL_CODE = 2
             AND ENT_CODE = '".$idr."'
             ORDER BY ID.UTI_CODE
            ";
            var_dump($sql2);
    $connexion = mysql_connect($serveur, $admin, $mdp);
    mysql_select_db($base, $connexion);
    $rech_util = mysql_query($sql2, $connexion);
    /* Un petit compteur pour les départements */
    $nd = 0;
    /* On crée deux tableaux pour les numéros et les noms des départements */
    $code_util = array();
    $nom_util = array();
    /* On va mettre les numéros et noms des départements dans les deux tableaux */
    while(false != ($ligne_util = mysql_fetch_assoc($rech_util)))
    {
        $code_util[] = $ligne_util['UTI_CODE'];
        $nom_util[]  = $ligne_util['UTI_LOGIN'];
        $nd++;
    }
    /* Maintenant on peut construire la liste déroulante */
    $liste = "";
    $liste .= '<select name="departement" id="departement">'."\n";
    for($d = 0; $d < $nd; $d++)
    {
        $liste .= '  <option value="'. $code_util[$d] .'">'. htmlentities($nom_util[$d]) .' ('. $code_util[$d] .')</option>'."\n";
    }
    $liste .= '</select>'."\n";
    /* Un petit coup de balai */
    mysql_free_result($rech_util);
    /* Affichage de la liste déroulante */
    echo($liste);
}
/* Sinon on retourne un message d'erreur */
else
{
    echo("<p>Une erreur s'est produite. La région sélectionnée comporte une donnée invalide.</p>\n");
}
?>