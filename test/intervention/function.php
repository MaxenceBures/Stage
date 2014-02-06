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
function createdemandeint(){
    mysql_connect("localhost","root","root") ;
        mysql_select_db("stage");
    if (isset($_POST['go_createint']))
 {       

    $date = date("Y-m-d");
    $id = $_SESSION['login'];
    $ent = mysql_real_escape_string($_POST['nomEnt']);
    $resp = mysql_real_escape_string($_POST['nomResp']);
    $libelle = mysql_real_escape_string($_POST['libelle']);
    $descr = mysql_real_escape_string($_POST['descr']);
   // $motif = mysql_real_escape_string($_POST['motif']);

   
    $count = mysql_fetch_row(mysql_query("SELECT max(INC_CODE) from INCIDENT"));
    $test = $count[0] + 1;
    $query = mysql_query("INSERT INTO INCIDENT(INC_CODE ,LIB_CODE ,UTI_CODE ,ENT_CODE ,ETA_CODE ,INC_LIBELLE ,INC_DESCRIPTION ,INC_DATEDEMANDE ,INC_DEMANDE   )
                        VALUES('".$test."', '".$velo."','".$date."', '".$id."', '".$motif."', '".$traite."','".$attache."','".$station."', '1')") or die (mysql_error());
    echo '<script language="Javascript">'.
        'alert("Demande enregistré");'.
        'window.location.replace("index.php")'.
        '</script>';
}
}