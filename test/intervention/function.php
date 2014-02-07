<?php
session_start();
include('connexion.inc.php');
connect();

    function getIntervention()
        {
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
        mysql_close($oSql);
        }

    function infosIntervention($q){
           $con = connecter();
            
            $q = intval($q);
                if (!$con)
                  {
                    die('Could not connect: ' . mysqli_error($con));
                  }
                   if ($q == 99){
                      
                    $sql="SELECT INC_CODE, INC_LIBELLE,INC_DESCRIPTION, ETA_LIBELLE, INC_DATEDEMANDE
                         FROM INCIDENT, UTILISATEUR, ETAT
                         WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                         AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                         ORDER BY INC_CODE";
                    }
                    else{
                //  var_dump($q);
                     $sql="SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE, INC_DESCRIPTION
                         FROM INCIDENT, UTILISATEUR, ETAT
                         WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                         AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                         AND INCIDENT.ETA_CODE = ".$q."";    
                    }
        $result = mysqli_query($con,$sql);
        return($result);
    }    
    function ListeDeroulanteUrgence()
    {
        $sReq = " SELECT LIB_CODE, LIB_LIBELLE
                  FROM LIBELLE
                  WHERE LIB_TYPE ='incidenturgence' ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $oStation = array() ;
        while ($Station = mysql_fetch_assoc($rstPdt) )
        {
            $iNb = $iNb + 1 ;
            $oStation[$iNb] =  $Station ;
        }
        return ($oStation) ;
    }
function ListeDeroulanteType()
    {
        $sReq = " SELECT LIB_CODE, LIB_LIBELLE
                  FROM LIBELLE
                  WHERE LIB_TYPE ='incidenttype' ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $oStation = array() ;
        while ($Station = mysql_fetch_assoc($rstPdt) )
        {
            $iNb = $iNb + 1 ;
            $oStation[$iNb] =  $Station ;
        }
        return ($oStation) ;
    }

    function createinter(){
     
        if (isset($_POST['go_createint']))
     {       

        $date = date("Y-m-d\TH:i:sP");
        $id = $_SESSION['login'];
        $ent = mysql_real_escape_string($_POST['nomEnt']);
        $resp = mysql_real_escape_string($_POST['nomResp']);
        $libelle = mysql_real_escape_string($_POST['libelle']);
        $descr = mysql_real_escape_string($_POST['descr']);
        $type = mysql_real_escape_string($_POST['type']);
        $urgence = mysql_real_escape_string($_POST['urgence']);
        $ent2 = mysql_fetch_assoc(mysql_query("SELECT ENT_CODE FROM ENTREPRISE WHERE ENT_RAISONSOCIALE = '".$ent."'"));
        $resp2 = mysql_fetch_assoc(mysql_query("SELECT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN = '".$resp."'"));
          
       
        $count = mysql_fetch_row(mysql_query("SELECT max(INC_CODE) from INCIDENT"));
        $test = $count[0] + 1;
        $query = mysql_query("INSERT INTO INCIDENT(INC_CODE ,LIB_CODE ,UTI_CODE ,ENT_CODE ,ETA_CODE ,INC_LIBELLE ,INC_DESCRIPTION ,INC_DATEDEMANDE ,INC_DEMANDE, INC_TYPE)
                            VALUES('".$test."', '".$urgence."' ,'".$resp2['UTI_CODE']."', '".$ent2['ENT_CODE']."', 1, '".$libelle."','".$descr."','".$date."', '".$id."', '".$type."')") or die (mysql_error());
        var_dump($query);
        echo '<script language="Javascript">'.
            'alert("Demande enregistré");'.
            'window.location.replace("showintervention.php")'.
            '</script>';
    }
    }
