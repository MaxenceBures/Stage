<?php
/**
 * Code qui sera aeepl� par un objet XHR et qui
 * retournera la liste d�roulante des d�partements
 * correspondant � la r�gion s�lectionn�e.
 */
/* Param�tres de connexion */
$serveur = "localhost";
$admin   = "root";
$mdp     = "root";
$base    = "stage";

/* On r�cup�re l'identifiant de la r�gion choisie. */
$idr = isset($_GET['idr']) ? $_GET['idr'] : false;
/* Si on a une r�gion, on proc�de � la requ�te */
if(false !== $idr)
{
    /* C�ration de la requ�te pour avoir les d�partements de cette r�gion */
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
    /* Un petit compteur pour les d�partements */
    $nd = 0;
    /* On cr�e deux tableaux pour les num�ros et les noms des d�partements */
    $code_util = array();
    $nom_util = array();
    /* On va mettre les num�ros et noms des d�partements dans les deux tableaux */
    while(false != ($ligne_util = mysql_fetch_assoc($rech_util)))
    {
        $code_util[] = $ligne_util['UTI_CODE'];
        $nom_util[]  = $ligne_util['UTI_LOGIN'];
        $nd++;
    }
    /* Maintenant on peut construire la liste d�roulante */
    $liste = "";
    $liste .= '<select name="departement" id="departement">'."\n";
    for($d = 0; $d < $nd; $d++)
    {
        $liste .= '  <option value="'. $code_util[$d] .'">'. htmlentities($nom_util[$d]) .' ('. $code_util[$d] .')</option>'."\n";
    }
    $liste .= '</select>'."\n";
    /* Un petit coup de balai */
    mysql_free_result($rech_util);
    /* Affichage de la liste d�roulante */
    echo($liste);
}
/* Sinon on retourne un message d'erreur */
else
{
    echo("<p>Une erreur s'est produite. La r�gion s�lectionn�e comporte une donn�e invalide.</p>\n");
}
?>