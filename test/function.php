<?php
function getUser()
    {
        $oSql= mysql_connect("localhost","root","root") ;
        mysql_select_db("Stage");
        $sReq = " SELECT UTI_CODE, UTI_LOGIN
                  FROM UTILISATEUR
                  WHERE UTI_DESACTIVE='0' ";
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
function infosUser($q){
    $con = mysqli_connect('localhost','root','root','stage');
        if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }
if ($q == 99){
  mysqli_select_db($con,"ajax_demo");
$sql="SELECT UTILISATEUR.UTI_CODE, UTI_LOGIN, UTI_NOM, UTI_PRENOM, ROL_LIBELLE FROM UTILISATEUR, ID, ROLE where UTI_DESACTIVE ='0' AND UTILISATEUR.UTI_CODE = ID.UTI_CODE AND ID.ROL_CODE = ROLE.ROL_CODE";
}
else{
mysqli_select_db($con,"ajax_demo");
$sql="SELECT UTILISATEUR.UTI_CODE, UTI_LOGIN, UTI_NOM, UTI_PRENOM, ROL_LIBELLE FROM UTILISATEUR, ID, ROLE where UTI_DESACTIVE ='0' AND UTILISATEUR.UTI_CODE = ID.UTI_CODE AND ID.ROL_CODE = ROLE.ROL_CODE AND UTILISATEUR.UTI_CODE= '".$q."'";
}
$result = mysqli_query($con,$sql);
return($result);
}    

function getIntervention($plogin)
    {
        $oSql= mysql_connect("localhost","root","root") ;
        mysql_select_db("Stage");
        $sReq = " SELECT INC_CODE, INC_LIBELLE, ETA_LIBELLE, INC_DATEDEMANDE
                 FROM INCIDENT, UTILISATEUR, ETAT
                 WHERE UTI_LOGIN =  :login
                 AND INCIDENT.ETA_CODE =  :etat
                 AND INCIDENT.INC_DEMANDE = UTILISATEUR.UTI_CODE
                 AND INCIDENT.ETA_CODE = ETAT.ETA_CODE
                 ORDER BY INT_CODE ";
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
$sql="SELECT * FROM utilisateur where uti_desactive ='0'";
}
else{
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM utilisateur WHERE Uti_Code = '".$q."'";
}
$result = mysqli_query($con,$sql);
return($result);
}    