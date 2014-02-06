<?php
function getIntervention()
    {
        $oSql= mysql_connect("localhost","root","root") ;
        mysql_select_db("stage");
        $sReq = " SELECT ETA_CODE ETA_LIBELLE
                 FROM ETAT
                 ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $lesProduits = array() ;
        while ($uneLigne = mysql_fetch_array($rstPdt))
        {
            $iNb = $iNb + 1 ;
            $lesProduits[$iNb] =  $uneLigne ;
        }
        return ($lesProduits) ;
        mysqli_close($oSql);
    }
function infosIntervention($q){
        $con = mysqli_connect('localhost','root','root','stage');
        if (!$con)
          {
          die('Could not connect: ' . mysqli_error($con));
          }
            if ($q == 99){
              mysqli_select_db($con,"ajax_demo");
            $sql="SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE
                 FROM INCIDENT, UTILISATEUR, ETAT
                 WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                 AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                 ORDER BY INT_CODE";
            }
            else{
            mysqli_select_db($con,"ajax_demo");
            $sql="SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE
                 FROM INCIDENT, UTILISATEUR, ETAT
                 WHERE ETA_CODE = '".$q."'  
                 AND INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                 AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                 ORDER BY INT_CODE";
            }
    $result = mysqli_query($con,$sql);
return($result);
}    
