<?php
session_start();
$oBdd = $_SESSION['bdd'];

require_once ('../classe/Bdd.class.php');
require_once ('../inc/connecter.inc.php');
function getUser()
    {



      //  $oSql= mysql_connect("localhost","root","root") ;
      //  mysql_select_db("Stage");
        $sReq = " SELECT Uti_Code, Uti_Login
                  FROM utilisateur
                  WHERE uti_desactive='0' ";
        $mesusers = $oBdd->query($sReq) ;
        return ($mesusers) ;
    }
//$mesTickets = $_SESSION['bdd']->query($sReq, array('login' => $pLogin)) ;
//        return ($mesTickets) ;




 function infoUsers(){
$q = intval($_GET['q']);
$con = $oBdd;
if (!$con)
  {
  die('Could not connect: ' );
  }
if ($q == 99){
//  mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM utilisateur where uti_desactive ='0'";
$result= $oBdd->query($sql) ;
}
else{
//mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM utilisateur WHERE Uti_Code = :Code";
$result= $oBdd->query($sReq, array('Code'=>$q)) ;
}
//$result = query($con,$sql);
    return ($result) ;
   // $lesDemandes = $_SESSION['bdd']->query($sReq, array('login' => $pLogin, 'etat' => $pEtat)) ; //, 'etat' => $pEtat)
//var_dump($lesDemandes);
}