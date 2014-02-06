<?php
function getIntervention()
    {
        $oSql= mysql_connect("localhost","root","root") ;
        mysql_select_db("stage");
        $sReq = " SELECT ETA_CODE, ETA_LIBELLE
                 FROM ETAT";
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
        $q = intval($q);
        if (!$con)
          {
          die('Could not connect: ' . mysqli_error($con));
          }
          mysqli_select_db($con,"ajax_demo");
            if ($q == 99){
              
            $sql="SELECT INC_CODE, INC_LIBELLE,INC_DESCRIPTION, ETA_LIBELLE, INC_DATEDEMANDE
                 FROM INCIDENT, UTILISATEUR, ETAT
                 WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                 AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                 ORDER BY INC_CODE";
            }
            else{
          var_dump($q);
             $sql="SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE, INC_DESCRIPTION
                 FROM INCIDENT, UTILISATEUR, ETAT
                 WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                 AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                 AND INCIDENT.ETA_CODE = ".$q."";    
            }
    $result = mysqli_query($con,$sql);
return($result);
}    
