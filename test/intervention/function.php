<?php
session_start();
include('connexion.inc.php');
connect();

    function ListeIntervention()
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

    function infosInterventioncli($q){
           $con = connecter();
            $id = $_SESSION['login'];
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
                         AND UTI_LOGIN = '".$id."'
                         ORDER BY INC_CODE";
                    }
                    else{
                //  var_dump($q);
                     $sql="SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE, INC_DESCRIPTION
                         FROM INCIDENT, UTILISATEUR, ETAT
                         WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                         AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                         AND UTI_LOGIN = '".$id."'
                         AND INCIDENT.ETA_CODE = '".$q."' 
                         ";    
                    }
        $result = mysqli_query($con,$sql);
        return($result);
    }
    function infosIntervention($q,$q2){
        $con = connecter();
        $q = intval($q);
        $q2 = intval($q2);
          //  var_dump($q2);
            if ($q2 ==98){
                $sql2 = "";
            }
            if($q2 ==""){
                $sql2 = "";
            }
            elseif ($q2 !=98 OR $q2 !=""){
                $sql2 = "AND INC_DEMANDE = '".$q2."'";
            }
            if ($q ==99){
                $sql3 = "";
            }
            if ($q ==""){
                $sql3 = "";
            }
            elseif($q !=99 OR $q !=""){
                $sql3 = "AND INCIDENT.ETA_CODE = '".$q."'";
            }
            
                if (!$con)
                  {
                    die('Could not connect: ' . mysqli_error($con));
                  }
                else {  
        
                     $sql="SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE, INC_DESCRIPTION
                         FROM INCIDENT, UTILISATEUR, ETAT
                         WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                         AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                          $sql2 $sql3
                         ";
                         
                         var_dump($sql);
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
        $oUrgences = array() ;
        while ($Urgence = mysql_fetch_assoc($rstPdt) )
        {
            $iNb = $iNb + 1 ;
            $oUrgences[$iNb] =  $Urgence ;
        }
        return ($oUr) ;
    }
function ListeDeroulanteType()
    {
        $sReq = " SELECT LIB_CODE, LIB_LIBELLE
                  FROM LIBELLE
                  WHERE LIB_TYPE ='incidenttype' ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $oTypes = array() ;
        while ($Type = mysql_fetch_assoc($rstPdt) )
        {
            $iNb = $iNb + 1 ;
            $oTypes[$iNb] =  $Type ;
        }
        return ($oTypes) ;
    }
function ListeDeroulanteUtilisateur()
    {
        $sReq = " SELECT UTI_CODE, UTI_LOGIN
                  FROM UTILISATEUR
                   ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $oUser = array() ;
        while ($Users = mysql_fetch_assoc($rstPdt) )
        {
            $iNb = $iNb + 1 ;
            $oUser[$iNb] =  $Users ;
        }
        return ($oUser) ;
    }

    function createinter(){
     
        if (isset($_POST['go_createint']))
     {       

        $date = date("Y-m-d\TH:i:sP");
       // $id = $_SESSION['login'];
        $ent = mysql_real_escape_string($_POST['nomEnt']);
        $resp = mysql_real_escape_string($_POST['nomResp']);
        $libelle = mysql_real_escape_string($_POST['libelle']);
        $descr = mysql_real_escape_string($_POST['descr']);
        $type = mysql_real_escape_string($_POST['type']);
        $urgence = mysql_real_escape_string($_POST['urgence']);
        $ent2 = mysql_fetch_assoc(mysql_query("SELECT ENT_CODE FROM ENTREPRISE WHERE ENT_RAISONSOCIALE = '".$ent."'"));
        $resp2 = mysql_fetch_assoc(mysql_query("SELECT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN = '".$resp."'"));
        $id = mysql_fetch_assoc(mysql_query("SELECT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN = '".$_SESSION['login']."'"));  
       //var_dump($id);
        $count = mysql_fetch_row(mysql_query("SELECT max(INC_CODE) from INCIDENT"));
        $test = $count[0] + 1;
        $query = mysql_query("INSERT INTO INCIDENT(INC_CODE ,LIB_CODE ,UTI_CODE ,ENT_CODE ,ETA_CODE ,INC_LIBELLE ,INC_DESCRIPTION ,INC_DATEDEMANDE ,INC_DEMANDE, INC_TYPE)
                            VALUES('".$test."', '".$urgence."' ,'".$resp2['UTI_CODE']."', '".$ent2['ENT_CODE']."', 1, '".$libelle."','".$descr."','".$date."', '".$id['UTI_CODE']."', '".$type."')") or die (mysql_error());
        var_dump($query);
        echo '<script language="Javascript">'.
            'alert("Demande enregistré");'.
            'window.location.replace("showintervention.php")'.
            '</script>';
    }
    }
