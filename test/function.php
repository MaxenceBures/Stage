<?php
function getUser()
    {
        $oSql= mysql_connect("localhost","root","root") ;
        mysql_select_db("Stage");
        $sReq = " SELECT Uti_Code, Uti_Login
                  FROM utilisateur
                  WHERE uti_desactive='0' ";
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
$sql="SELECT * FROM utilisateur where uti_desactive ='0'";
}
else{
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM utilisateur WHERE Uti_Code = '".$q."'";
}
$result = mysqli_query($con,$sql);
return($result);
}    