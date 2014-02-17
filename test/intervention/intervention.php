<?php

include('function.php');
connect();

$idr = isset($_GET['idr']) ? $_GET['idr'] : false;

if(false !== $idr)
{
    $sql2 = "SELECT INC_CODE, INC_LIBELLE
             FROM INCIDENT
             WHERE ENT_CODE = '".$idr."'
             ORDER BY INC_CODE
            ";
            // var_dump($sql2);
  $rech_util = mysql_query($sql2);
  
    $nd = 0;
    $code_util = array();
    $nom_util = array();

    while(false != ($ligne_util = mysql_fetch_assoc($rech_util)))
    {
        $code_util[] = $ligne_util['INC_CODE'];
        $nom_util[]  = $ligne_util['INC_LIBELLE'];
        $nd++;
    }
    $liste = "";
    $liste .= '<select name="incident" id="incident">'."\n";
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