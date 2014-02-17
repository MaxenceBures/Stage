<?php

include('function.php');
connect();

$idr = isset($_GET['idr']) ? $_GET['idr'] : false;

if(false !== $idr)
{
    $sql2 = "SELECT ID.UTI_CODE, UTI_LOGIN
             FROM UTILISATEUR, ID 
             WHERE UTILISATEUR.UTI_CODE = ID.UTI_CODE
             AND ROL_CODE = 2
             AND ENT_CODE = '".$idr."'
             ORDER BY ID.UTI_CODE
            ";
            var_dump($sql2);
  $rech_util = mysql_query($sql2);
  
    $nd = 0;
    $code_util = array();
    $nom_util = array();
    while(false != ($ligne_util = mysql_fetch_assoc($rech_util)))
    {
        $code_util[] = $ligne_util['UTI_CODE'];
        $nom_util[]  = $ligne_util['UTI_LOGIN'];
        $nd++;
    }
    $liste = "";
    $liste .= '<select name="departement" id="departement">'."\n";
    for($d = 0; $d < $nd; $d++)
    {
        $liste .= '  <option value="'. $code_util[$d] .'">'. htmlentities($nom_util[$d]) .' ('. $code_util[$d] .')</option>'."\n";
    }
    $liste .= '</select>'."\n";
    mysql_free_result($rech_util);
    echo($liste);
}
/* Sinon on retourne un message d'erreur */
else
{
    echo("<p>Une erreur s'est produite. La région sélectionnée comporte une donnée invalide.</p>\n");
}

?>