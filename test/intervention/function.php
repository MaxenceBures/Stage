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
function infosInterventioncli($q,$q3)
    {
           $con = connecter();
            $id = $_SESSION['login'];
            $q = intval($q);
            $q3 = intval($q3);
            if ($q3 == 1){
                $sql4 = "ORDER BY INC_DATEDEMANDE";
                
            }
            else {
                $sql4 = "ORDER BY INC_CODE";
                }
                if (!$con)
                  {
                    die('Could not connect: ' . mysqli_error($con));
                  }
                   if ($q == 99){
                      
                    $sql="SELECT INC_CODE, INC_LIBELLE,INC_DESCRIPTION, ETA_LIBELLE, INC_DATEDEMANDE
                         FROM INCIDENT, UTILISATEUR, ETAT
                         WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                         AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                         AND UTI_LOGIN = '".$id."' $sql4
                         ";
                    }
                    else{
                //  var_dump($q);
                     $sql="SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE, INC_DESCRIPTION
                         FROM INCIDENT, UTILISATEUR, ETAT
                         WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                         AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                         AND UTI_LOGIN = '".$id."'
                         AND INCIDENT.ETA_CODE = '".$q."'  $sql4
                         ";    
                    }
        $result = mysqli_query($con,$sql);
        return($result);
    }
function infosIntervention($q,$q2,$q3)
    {
        $con = connecter();
        $q = intval($q);
        $q2 = intval($q2);
        $q3 = intval($q3);
            if ($q3 == 1){
                $sql4 = "ORDER BY INC_DATEDEMANDE";
                
            }
            else {
                $sql4 = "ORDER BY INC_CODE";
                
            }
            if ($q2 == 98){
                $sql2 = "";
                echo"<br>";
            }
            if($q2 == ""){
                $sql2 = "";
                echo"1";
            }
            elseif ($q2 != 98 AND $q2 != ""){

                $sql2 = "AND INC_DEMANDE = '".$q2."'";
            }
            if ($q == 99){
                $sql3 = "";
            }
            if ($q == ""){
                $sql3 = "";
            }
            elseif($q != 99 AND $q !=""){
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
                          $sql2 $sql3 $sql4
                         ";
                         
                         var_dump($sql);
                    }     
        $result = mysqli_query($con,$sql);
        return($result);
    }
function infosMesInterventionrespcli($q,$q3)
    {
        $con = connecter();
        $q = intval($q);
        $id = $_SESSION['login'];
        //$q2 = intval($q2);
        $q3 = intval($q3);
            if ($q3 == 1){
                $sql4 = "ORDER BY INC_DATEDEMANDE";
                
            }
            else {
                $sql4 = "ORDER BY INC_CODE";
                
            }
            // if ($q2 == 98){
            //     $sql2 = "";
            //     echo"<br>";
            // }
            // if($q2 == ""){
            //     $sql2 = "";
            //     echo"1";
            // }
            // elseif ($q2 != 98 AND $q2 != ""){

            //     $sql2 = "AND INC_DEMANDE = '".$q2."'";
            // }
            if ($q == 99){
                $sql3 = "";
            }
            if ($q == ""){
                $sql3 = "";
            }
            elseif($q != 99 AND $q !=""){
                $sql3 = "AND INCIDENT.ETA_CODE = '".$q."'";
            }
            
                if (!$con)
                  {
                    die('Could not connect: ' . mysqli_error($con));
                  }
                else {  
        
                     $sql="SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE, LIB_LIBELLE, URG_LIBELLE, INC_DESCRIPTION
                         FROM INCIDENT, UTILISATEUR, ETAT, URGENCE, LIBELLE
                         WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                         AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                         AND INCIDENT.URG_CODE = URGENCE.URG_CODE
                         AND INCIDENT.INC_TYPE = LIBELLE.LIB_CODE
                         AND INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                         AND UTI_LOGIN = '".$id."'
                           $sql3 $sql4
                         "; //$sql2
                         
                         var_dump($sql);
                    }     
        $result = mysqli_query($con,$sql);
        return($result);
    }    
function infosInterventionrespcli($q,$q2,$q3)
    {
        $con = connecter();
        $q = intval($q);
       // $id = $_SESSION['login'];
        $q2 = intval($q2);
        $q3 = intval($q3);
            if ($q3 == 1){
                $sql4 = "ORDER BY INC_DATEDEMANDE";
                
            }
            else {
                $sql4 = "ORDER BY INC_CODE";
                
            }
            if ($q2 == 98){
                $sql2 = "";
                echo"<br>";
            }
            if($q2 == ""){
                $sql2 = "";
                echo"1";
            }
            elseif ($q2 != 98 AND $q2 != ""){

                $sql2 = "AND INC_DEMANDE = '".$q2."'";
            }
            if ($q == 99){
                $sql3 = "";
            }
            if ($q == ""){
                $sql3 = "";
            }
            elseif($q != 99 AND $q !=""){
                $sql3 = "AND INCIDENT.ETA_CODE = '".$q."'";
            }
            
                if (!$con)
                  {
                    die('Could not connect: ' . mysqli_error($con));
                  }
                else {  
        
                     $sql="SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE, LIB_LIBELLE, URG_LIBELLE, INC_DESCRIPTION
                         FROM INCIDENT, UTILISATEUR, ETAT, URGENCE, LIBELLE
                         WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                         AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                         AND INCIDENT.URG_CODE = URGENCE.URG_CODE
                         AND INCIDENT.INC_TYPE = LIBELLE.LIB_CODE
                         $sql3 $sql4 $sql2
                         "; //$sql2
                         
                         var_dump($sql);
                    }     
        $result = mysqli_query($con,$sql);
        return($result);
    }        
function ListeDeroulanteUrgence()
    {
        $sReq = " SELECT URG_CODE, URG_LIBELLE
                  FROM URGENCE
                  ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $oUrgences = array() ;
        while ($Urgence = mysql_fetch_assoc($rstPdt) )
        {
            $iNb = $iNb + 1 ;
            $oUrgences[$iNb] =  $Urgence ;
        }
        return ($oUrgences) ;
    }
function ListeDeroulanteEntreprise()
    {
        $sReq = " SELECT ENT_CODE, ENT_RAISONSOCIALE
                  FROM ENTREPRISE
                  ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $oEntreprises = array() ;
        while ($Entreprise = mysql_fetch_assoc($rstPdt) )
        {
            $iNb = $iNb + 1 ;
            $oEntreprises[$iNb] =  $Entreprise ;
        }
        return ($oEntreprises) ;
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
function createinter()
    {
     
            if (isset($_POST['go_createint']))
         {       

            $date = date("Y-m-d\TH:i:sP");
           // $id = $_SESSION['login'];
            $region = mysql_real_escape_string($_POST['region']);
            $departement = mysql_real_escape_string($_POST['departement']);
if($region ==""){
    $ent = mysql_real_escape_string($_POST['nomEnt']);
    $resp = mysql_real_escape_string($_POST['nomResp']);
    $ent2 = mysql_fetch_assoc(mysql_query("SELECT ENT_CODE FROM ENTREPRISE WHERE ENT_RAISONSOCIALE = '".$ent."'"));
    $resp2 = mysql_fetch_assoc(mysql_query("SELECT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN = '".$resp."'"));
    $sql = "'".$resp2['UTI_CODE']."', '".$ent2['ENT_CODE']."'";        
}
else{
    echo'stop';
    $sql = "'".$region."', '".$departement."'"; 
}
            
            $libelle = mysql_real_escape_string($_POST['libelle']);
            $descr = mysql_real_escape_string($_POST['descr']);
            $type = mysql_real_escape_string($_POST['type']);
            $urgence = mysql_real_escape_string($_POST['urgence']);
            $id = mysql_fetch_assoc(mysql_query("SELECT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN = '".$_SESSION['login']."'"));  
            $count = mysql_fetch_row(mysql_query("SELECT max(INC_CODE) from INCIDENT"));
            $test = $count[0] + 1;
            $query = mysql_query("INSERT INTO INCIDENT(INC_CODE ,URG_CODE ,UTI_CODE ,ENT_CODE ,ETA_CODE ,INC_LIBELLE ,INC_DESCRIPTION ,INC_DATEDEMANDE ,INC_DEMANDE, INC_TYPE)
                                VALUES('".$test."', '".$urgence."' ,$sql, 1, '".$libelle."','".$descr."','".$date."', '".$id['UTI_CODE']."', '".$type."')") or die (mysql_error());
            var_dump($query);
            echo '<script language="Javascript">'.
                'alert("Demande enregistré");'.
                'window.location.replace("showintervention.php")'.
                '</script>';
        }
    }
