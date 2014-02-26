<?php
session_start();
if(isset($_POST['username']) && isset($_POST['pw'])) {
	$u = $_POST['username'];
	$p = sha1($_POST['pw']);

$oSql= mysql_connect("mysql51-45.perso","picsewww","PvYXFZ2j") ;
mysql_select_db("picsewww");
$result = mysql_query("SELECT UTI_LOGIN, UTI_PWD, ROL_LIBELLE FROM UTILISATEUR, ROLE, ID WHERE UTI_LOGIN = '".$u."' AND UTI_PWD = '".$p."' AND UTILISATEUR.UTI_CODE = ID.UTI_CODE AND ID.ROL_CODE = ROLE.ROL_CODE AND UTILISATEUR.UTI_DESACTIVE ='0'");
$membre = mysql_fetch_assoc($result);
	
	if($u == $membre['UTI_LOGIN'] && $p == $membre['UTI_PWD']) {
		echo "good";
			$_SESSION["login"]    = $membre['UTI_LOGIN'];
			$_SESSION["fonction"] = $membre['ROL_LIBELLE'];
/* 			header("Location: ../index.php"); */
/* 			echo"Ok"; */
	}
	
	else { 
		echo 'stop';
	}
}
?>
