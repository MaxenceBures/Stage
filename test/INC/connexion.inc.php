<?php  
    function connect(){
    $oSql= mysql_connect("mysql51-45.perso","picsewww","PvYXFZ2j") ;
    mysql_select_db("picsewww");
    mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
    }

    function connecter(){
    $con = mysqli_connect('mysql51-45.perso','picsewww','PvYXFZ2j','picsewww');
    mysqli_select_db($con,"stage");
    mysqli_query($con, "SET NAMES 'utf8'");
	mysqli_query($con, "SET CHARACTER SET utf8");
	mysqli_query($con, "SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
    return($con);
    }