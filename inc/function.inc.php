<?php
//session_start();
include('connexion.inc.php');
connect();
$con = connecter();
function ListeDeroulanteEtat()
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
function infosIncidentcli($q,$q3)
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
function infosIncidentintervenant($q,$q3,$q5)
    {
        $con = connecter();
        $q = intval($q);
        //$q2 = intval($q2);
        $q3 = intval($q3);
        $q5 = intval($q5);
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
            if ($q5 == 95){
                $sql5 = "";
            }
            if ($q5 == ""){
                $sql5 = "";
            }
            elseif($q5 != 95 AND $q5 !=""){
                $sql5 = "AND ENTREPRISE.ENT_CODE = '".$q5."'";
            }
            
                if (!$con)
                  {
                    die('Could not connect: ' . mysqli_error($con));
                  }
                else {  
        
                //      $sql="SELECT DISTINCT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE, INC_DESCRIPTION, ENT_RAISONSOCIALE, INC_TYPE/*, LIB_LIBELLE, URG_LIBELLE*/
                //          FROM INCIDENT, UTILISATEUR, ETAT, ID, ENTREPRISE 
                //          WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                //          AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                //          AND ENTREPRISE.ENT_CODE =ID.ENT_CODE
                //           /*$sql2*/ $sql3 $sql5 $sql4
                //          ";
                 $sql="SELECT INC_CODE, INC_LIBELLE, INC_DESCRIPTION, INC_DATEDEMANDE, ETA_LIBELLE, LIB_LIBELLE, URG_LIBELLE, ENT_RAISONSOCIALE
                FROM INCIDENT, ETAT, URGENCE, ENTREPRISE, LIBELLE
                WHERE ETAT.ETA_CODE = INCIDENT.ETA_CODE
                AND URGENCE.URG_CODE = INCIDENT.URG_CODE
                AND ENTREPRISE.ENT_CODE = INCIDENT.ENT_CODE
                AND LIBELLE.LIB_CODE = INCIDENT.INC_TYPE
                $sql3 $sql5 $sql4" ;   
                         var_dump($sql);
                    }     
        $result = mysqli_query($con,$sql);
        return($result);
    }    
function infosMesIncidentsrespcli($q,$q3)
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
        $q2 = intval($q2);
        $q3 = intval($q3);
        $id = $_SESSION['login'];
        
            if ($q3 == 1){
                $sql4 = "ORDER BY INC_DATEDEMANDE ";
                
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
        
                     $sql="SELECT DISTINCT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE, LIB_LIBELLE, URG_LIBELLE, INC_DESCRIPTION, UTI_LOGIN, INC_DEMANDE
                         FROM INCIDENT, UTILISATEUR, ETAT, URGENCE, LIBELLE
                         WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                         AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                         AND INCIDENT.URG_CODE = URGENCE.URG_CODE
                         AND INCIDENT.INC_TYPE = LIBELLE.LIB_CODE
                         AND INCIDENT.ENT_CODE  = (SELECT DISTINCT ENT_CODE FROM ID WHERE UTI_CODE = (SELECT DISTINCT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN ='".$id."'))
                         $sql2 $sql3 $sql4 
                         "; //$sql2
                         
                         var_dump($sql);
                    }     
        $result = mysqli_query($con,$sql);
        return($result);
    }        
function infosUtilisateurrespint($q7)
    {
        $con = connecter();
        // $q = intval($q);
        // $id = $_SESSION['login'];
        //$q2 = intval($q2);
        $q7 = intval($q7);
        var_dump($q7);

        if ($q7 == 94){
                $sql7 = "ORDER  BY UTILISATEUR.UTI_CODE";
            }
            if ($q7 == ""){
                $sql7 = "ORDER  BY UTILISATEUR.UTI_CODE";
            }
            elseif($q7 != 94 AND $q7 !=""){
                $sql7 = "AND ID.ROL_CODE = '".$q7."' ORDER  BY UTILISATEUR.UTI_CODE";
            }

            
            
                if (!$con)
                  {
                    die('Could not connect: ' . mysqli_error($con));
                  }
                else {  
        
                     $sql="SELECT UTILISATEUR.UTI_CODE, UTI_LOGIN, ENT_RAISONSOCIALE, UTI_TELEPHONEFIXE, UTI_MAIL, ROL_LIBELLE
                         FROM UTILISATEUR, ID, ENTREPRISE, ROLE
                         WHERE UTILISATEUR.UTI_CODE = ID.UTI_CODE
                         AND ENTREPRISE.ENT_CODE = ID.ENT_CODE
                         AND ROLE.ROL_CODE = ID.ROL_CODE
                           $sql7

                         "; //$sql2
                         
                         var_dump($sql);
                    }     
        $result = mysqli_query($con,$sql);
        return($result);
    }   
function infosEntrepriserespint()
    {
        $con = connecter();
       
                if (!$con)
                  {
                    die('Could not connect: ' . mysqli_error($con));
                  }
                else {  
        
                     $sql="SELECT ENT_CODE, ENT_RAISONSOCIALE, ENT_HEURES, ENT_VILLE, ENT_TELEPHONE, ENT_SITEWEB
                         FROM ENTREPRISE
                         "; //$sql2
                         
                         var_dump($sql);
                    }     
        $result = mysqli_query($con,$sql);
        return($result);
    }    
function infosInterventionResp($q,$q2,$q3)
    {
        $con = connecter();
        $q = intval($q);
        $id = $_SESSION['login'];
        $q2 = intval($q2);
        $q3 = intval($q3);
            if ($q3 == 1){
                $sql4 = "ORDER BY INT_DATEINTER";
                
            }
            else {
                $sql4 = "ORDER BY INT_CODE";
                
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
        
                     $sql="SELECT INT_CODE, INT_LIBELLE, INC_LIBELLE, INT_DATEINTER, UTI_LOGIN, LIB_LIBELLE, URG_LIBELLE, ETA_LIBELLE, INC_DEMANDE
                           FROM INTERVENTION, INCIDENT, LIBELLE, URGENCE, UTILISATEUR, ETAT
                           WHERE INTERVENTION.INC_CODE = INCIDENT.INC_CODE
                           AND INTERVENTION.LIB_CODE = LIBELLE.LIB_CODE
                           AND INCIDENT.URG_CODE = URGENCE.URG_CODE
                           AND INTERVENTION.INT_TECHNICIEN = UTILISATEUR.UTI_CODE
                           AND ETAT.ETA_CODE = INCIDENT.ETA_CODE
                          
                           $sql2 $sql3 $sql4
                         "; //$sql2 -- AND INCIDENT.INC_DEMANDE = (SELECT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN= '$id')
                         
                         var_dump($sql);
                    }     
        $result = mysqli_query($con,$sql);
        return($result);
    }    
function infosInterventionintervenant($q,$q3,$q5,$q6)
    {
        $con = connecter();
        $q = intval($q);
        $q6 = intval($q6);
        $q3 = intval($q3);
        $q5 = intval($q5);
            if ($q3 == 1){
                $sql4 = "ORDER BY INT_DATEINTER";
                
            }
            else {
                $sql4 = "ORDER BY INT_CODE ";//"ORDER BY INT_CODE";
                
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
            if ($q6 == 94){
                $sql6 = "";
            }
            if ($q6 == ""){
                $sql6 = "";
            }
            elseif($q6 != 94 AND $q6 !=""){
                $sql6 = "AND INTERVENTION.INT_TECHNICIEN = '".$q6."'";
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
            if ($q5 == 95){
                $sql5 = "";
            }
            if ($q5 == ""){
                $sql5 = "";
            }
            elseif($q5 != 95 AND $q5 !=""){
                $sql5 = "AND INCIDENT.ENT_CODE = '".$q5."'";
            }
            
                if (!$con)
                  {
                    die('Could not connect: ' . mysqli_error($con));
                  }
                else {  
        
                //      $sql="SELECT DISTINCT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE, INC_DESCRIPTION, ENT_RAISONSOCIALE, INC_TYPE/*, LIB_LIBELLE, URG_LIBELLE*/
                //          FROM INCIDENT, UTILISATEUR, ETAT, ID, ENTREPRISE 
                //          WHERE INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                //          AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                //          AND ENTREPRISE.ENT_CODE =ID.ENT_CODE
                //           /*$sql2*/ $sql3 $sql5 $sql4
                //          ";
                 $sql="SELECT DISTINCT INT_CODE, INT_LIBELLE, INT_DATEINTER, INC_LIBELLE, LIB_LIBELLE, INC_DEMANDE, INT_TECHNICIEN
                FROM INCIDENT, INTERVENTION, LIBELLE, UTILISATEUR
                WHERE INCIDENT.INC_CODE = INTERVENTION.INC_CODE
                AND INTERVENTION.LIB_CODE = LIBELLE.LIB_CODE
                $sql3 $sql5 $sql6 $sql4"  ;   
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
function ListeDeroulanteTypeInter()
    {
        $sReq = " SELECT LIB_CODE, LIB_LIBELLE
                  FROM LIBELLE
                  WHERE LIB_TYPE ='interventiontype' ";
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
        $sReq = " SELECT DISTINCT UTILISATEUR.UTI_CODE, UTI_LOGIN
                  FROM UTILISATEUR, ID
                  WHERE ID.UTI_CODE = UTILISATEUR.UTI_CODE
                  AND (ROL_CODE = '1'
                  OR ROL_CODE = '2')
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
function ListeDeroulanteIntervenant()
    {
        $sReq = " SELECT DISTINCT UTILISATEUR.UTI_CODE, UTI_LOGIN
                  FROM UTILISATEUR, ID
                  WHERE ID.UTI_CODE = UTILISATEUR.UTI_CODE
                  AND ROL_CODE = '3'
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
function ListeDeroulanteRole()
    {
        $sReq = " SELECT ROL_CODE, ROL_LIBELLE
                  FROM ROLE
                   ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $oRole = array() ;
        while ($Roles = mysql_fetch_assoc($rstPdt) )
        {
            $iNb = $iNb + 1 ;
            $oRole[$iNb] =  $Roles ;
        }
        return ($oRole) ;
    }        
function ListeDeroulanteUtilisateursnonattribues()
    {
        $sReq = " SELECT DISTINCT UTI_CODE, UTI_LOGIN FROM UTILISATEUR
                  WHERE UTI_CODE NOT IN ( SELECT DISTINCT UTI_CODE FROM ID)
                  
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
function createincident()
    {
     
            if (isset($_POST['go_createint']))
         {       

            $date = date("Y-m-d\TH:i:sP");
           // $id = $_SESSION['login'];
            if (isset($_POST['region'])) {
               $region = mysql_real_escape_string($_POST['region']);
            }
            if (isset($_POST['departement'])) {
               $departement = mysql_real_escape_string($_POST['departement']);
            }
           // $departement = mysql_real_escape_string($_POST['departement']);
           // var_dump($region); var_dump($departement);
           if (!isset($_POST['region'])) {
                $ent = mysql_real_escape_string($_POST['nomEnt']);
                $resp = mysql_real_escape_string($_POST['nomResp']);
                $ent2 = mysql_fetch_assoc(mysql_query("SELECT ENT_CODE FROM ENTREPRISE WHERE ENT_RAISONSOCIALE = '".$ent."'"));
                $resp2 = mysql_fetch_assoc(mysql_query("SELECT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN = '".$resp."'"));
                $id = mysql_fetch_assoc(mysql_query("SELECT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN = '".$_SESSION['login']."'"));  
                $sql = "'".$resp2['UTI_CODE']."', '".$ent2['ENT_CODE']."', '".$id['UTI_CODE']."'";        
            }
            else{
                echo'stop';
                $sql = "'".$departement."', '".$region."', '".$departement."'"; 
            }
            
            $libelle = mysql_real_escape_string($_POST['libelle']);
            $descr = mysql_real_escape_string($_POST['descr']);
            $type = mysql_real_escape_string($_POST['type']);
            $urgence = mysql_real_escape_string($_POST['urgence']);
            $count = mysql_fetch_row(mysql_query("SELECT max(INC_CODE) from INCIDENT"));
            $test = $count[0] + 1;
            $query = mysql_query("INSERT INTO INCIDENT(INC_CODE ,URG_CODE ,UTI_CODE ,ENT_CODE ,INC_DEMANDE ,ETA_CODE ,INC_LIBELLE ,INC_DESCRIPTION, INC_DATEDEMANDE , INC_TYPE)
                                VALUES('".$test."', '".$urgence."' ,$sql, 1, '".$libelle."','".$descr."','".$date."', '".$type."')") or die (mysql_error());
            var_dump($query);
            echo '<script language="Javascript">'.
                'alert("Demande enregistré");'.
                'window.location.replace("index.php")'.
                '</script>';
        }
    }
function createinter()
    {
     
            if (isset($_POST['go_createint']))
         {       

           // $date = date("Y-m-d\TH:i:sP");
           // $id = $_SESSION['login'];
            //if (isset($_POST['region'])) {

            // }
            // if (isset($_POST['departement'])) {
               
           // }
           // $departement = mysql_real_escape_string($_POST['departement']);
           // var_dump($region); var_dump($departement);
           //if (!isset($_POST['region'])) {
           //      $ent = mysql_real_escape_string($_POST['nomEnt']);
           //      $resp = mysql_real_escape_string($_POST['nomResp']);
           //      $ent2 = mysql_fetch_assoc(mysql_query("SELECT ENT_CODE FROM ENTREPRISE WHERE ENT_RAISONSOCIALE = '".$ent."'"));
           //      $resp2 = mysql_fetch_assoc(mysql_query("SELECT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN = '".$resp."'"));
                 
           //      $sql = "'".$resp2['UTI_CODE']."', '".$ent2['ENT_CODE']."', '".$id['UTI_CODE']."'";        
           // // }
            // else{
            //     echo'stop';
            //     $sql = "'".$departement."', '".$region."', '".$departement."'"; 
            // }
               $ent = mysql_real_escape_string($_POST['nomEnt']);
               $resp = mysql_real_escape_string($_POST['incident']);
               $type = mysql_real_escape_string($_POST['type']);
               $libelle = mysql_real_escape_string($_POST['libelle']);
               $descr = mysql_real_escape_string($_POST['descr']);
               $date = mysql_real_escape_string($_POST['date']);
               $deb = mysql_real_escape_string($_POST['deb']);
               $fin = mysql_real_escape_string($_POST['fin']);
               $id = mysql_fetch_assoc(mysql_query("SELECT UTI_CODE FROM UTILISATEUR WHERE UTI_LOGIN = '".$_SESSION['login']."'"));  
            
            // $type = mysql_real_escape_string($_POST['type']);
            // $urgence = mysql_real_escape_string($_POST['urgence']);
            $count = mysql_fetch_row(mysql_query("SELECT max(INT_CODE) from INTERVENTION"));
            $test = $count[0] + 1;
            $query = mysql_query("INSERT INTO INTERVENTION( INT_CODE,    INC_CODE,    LIB_CODE,    UTI_CODE ,   INT_LIBELLE  ,   INT_DESCRIPTION  ,INT_DATEINTER  ,   INT_HEUREDEB  ,  INT_HEUREFIN  ,   INT_TECHNICIEN)
                                VALUES('".$test."', '".$resp."' ,'".$type."','".$id['UTI_CODE']."','".$libelle."','".$descr."', '".$date."', '".$deb."', '".$fin."', '".$id['UTI_CODE']."')") or die (mysql_error());
            var_dump($query);
            echo '<script language="Javascript">'.
                'alert("Intervention enregistré");'.
                'window.location.replace("index.php")'.
                '</script>';
        }
    }
function createentreprise()
    {
     
            if (isset($_POST['go_createentreprise']))
         {       

      
            $ent = mysql_real_escape_string($_POST['nomEnt']);
            $adresse = mysql_real_escape_string($_POST['adresse']);
            $adresse2 = mysql_real_escape_string($_POST['adresse2']);
            $adresse3 = mysql_real_escape_string($_POST['adresse3']);
            $cp = mysql_real_escape_string($_POST['cp']);
            $ville = mysql_real_escape_string($_POST['ville']);
            $mail = mysql_real_escape_string($_POST['mail']);
            $fixe = mysql_real_escape_string($_POST['fixe']);
            $web = mysql_real_escape_string($_POST['web']);
            $trigramme = mysql_real_escape_string($_POST['trigramme']);
               
            $count = mysql_fetch_row(mysql_query("SELECT max(ENT_CODE) from ENTREPRISE"));
            $test = $count[0] + 1;
            $query = mysql_query("INSERT INTO ENTREPRISE(ENT_CODE, ENT_RAISONSOCIALE, ENT_RUE, ENT_CP, ENT_VILLE, ENT_MAIL, ENT_TELEPHONE, ENT_SITEWEB, ENT_HEURES, ENT_ADRESSE2, ENT_ADRESSE3, ENT_TRIGRAMME)
                                VALUES('".$test."', '".$ent."' ,'".$adresse."','".$cp."','".$ville."','".$mail."', '".$fixe."', '".$web."', 0,'".$adresse2."','".$adresse3."','".$trigramme."')") or die (mysql_error());
            var_dump($query);
            echo '<script language="Javascript">'.
                'alert("Entreprise enregistré");'.
                'window.location.replace("index.php")'.
                '</script>';
        }
    }
function createutilisateur()
    {
     
            if (isset($_POST['go_createutilisateur']))
         {       

      
            $nom = mysql_real_escape_string($_POST['nom']);
            $prenom = mysql_real_escape_string($_POST['prenom']);
            $mail = mysql_real_escape_string($_POST['mail']);
            $fixe = mysql_real_escape_string($_POST['fixe']);
            $portable = mysql_real_escape_string($_POST['portable']);
            $login = mysql_real_escape_string($_POST['login']);
            $pwd = mysql_real_escape_string(sha1($_POST['pwd']));
               
            $count = mysql_fetch_row(mysql_query("SELECT max(UTI_CODE) from UTILISATEUR"));
            $test = $count[0] + 1;
            $query = mysql_query("INSERT INTO UTILISATEUR(UTI_CODE, UTI_LOGIN, UTI_PWD, UTI_NOM, UTI_PRENOM, UTI_MAIL, UTI_TELEPHONEFIXE, UTI_TELEPHONEMOBILE, UTI_DESACTIVE )
                                VALUES('".$test."', '".$login."' ,'".$pwd."','".$nom."','".$prenom."','".$mail."', '".$fixe."', '".$portable."', 0)") or die (mysql_error());
            var_dump($query);
            echo '<script language="Javascript">'.
                'alert("Utilisateur enregistré");'.
                'window.location.replace("index.php")'.
                '</script>';
        }
    }   
function createRole()
    {
     
            if (isset($_POST['go_createrole']))
         {       

      
            $user = mysql_real_escape_string($_POST['user']);
            $entreprise = mysql_real_escape_string($_POST['entreprise']);
            $role = mysql_real_escape_string($_POST['role']);
            
               
            // $count = mysql_fetch_row(mysql_query("SELECT max(UTI_CODE) from UTILISATEUR"));
            // $test = $count[0] + 1;
            $query = mysql_query("INSERT INTO ID(UTI_CODE, ENT_CODE, ROL_CODE)
                                VALUES('".$user."', '".$entreprise."' ,'".$role."')") or die (mysql_error());
            var_dump($query);
            echo '<script language="Javascript">'.
                'alert("Fonction enregistré");'.
                'window.location.replace("index.php")'.
                '</script>';
        }
    }        
function modifutilisateur()
    {
     
            if (isset($_POST['go_modifutilisateur']))
         {       

      
            $mail = mysql_real_escape_string($_POST['mail']);
            $fixe = mysql_real_escape_string($_POST['fixe']);
            $portable = mysql_real_escape_string($_POST['portable']);
            $login = mysql_real_escape_string($_POST['login']);
            $pwd = mysql_real_escape_string(sha1($_POST['pwd']));
            if ($pwd == "" ) {
                 $sql =", UTI_PWD = '".$pwd."' ";
               }
            else{
              $sql = "";
            }      
            $query = mysql_query("UPDATE UTILISATEUR SET UTI_MAIL = '".$mail."', UTI_TELEPHONEFIXE = '".$fixe."', UTI_TELEPHONEMOBILE = '".$portable."' $sql
                                 WHERE UTI_LOGIN = '".$login."'") or die (mysql_error());
            var_dump($query);
            echo '<script language="Javascript">'.
                'alert("Utilisateur modifié");'.
                'window.location.replace("index.php")'.
                '</script>';
        }}
function modifentreprise()
    {
     
            if (isset($_POST['go_modifentreprise']))
         {       

            $ent = mysql_real_escape_string($_POST['nomEnt']);
            $adresse = mysql_real_escape_string($_POST['adresse']);
            $cp = mysql_real_escape_string($_POST['cp']);
            $ville = mysql_real_escape_string($_POST['ville']);
            $mail = mysql_real_escape_string($_POST['mail']);
            $fixe = mysql_real_escape_string($_POST['fixe']);
            $web = mysql_real_escape_string($_POST['web']);
            $query = mysql_query("UPDATE ENTREPRISE SET ENT_RUE = '".$adresse."', ENT_CP = '".$cp."', ENT_VILLE = '".$ville."', ENT_MAIL = '".$mail."', ENT_TELEPHONE = '".$fixe."', ENT_SITEWEB= '".$web."'
                                WHERE ENT_RAISONSOCIALE = '".$ent."'") or die (mysql_error());
            
            var_dump($query);
            echo '<script language="Javascript">'.
                'alert("Entreprise modifié");'.
                'window.location.replace("index.php")'.
                '</script>';
        }}
function cloturer($test)
    {
     
             
           // $test = $_SESSION['login'];
            $date = date("Y-m-d\TH:i:sP");
            $test = $test;
            $query = mysql_query("UPDATE INCIDENT SET ETA_CODE = '5', INC_DATECLOTURE = '".$date."', INC_VALIDATION ='1', INC_CLOTURE = '".$_SESSION['login']."'
                                WHERE INC_CODE = '".$test."'") or die (mysql_error());
            
            var_dump($query);
            echo '<script language="Javascript">'.
                'alert("Incident cloturé");'.
                'window.location.replace("index.php")'.
                '</script>';
        }