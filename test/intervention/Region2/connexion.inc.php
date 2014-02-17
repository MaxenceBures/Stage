 <?php  
    function connect(){
    $oSql= mysql_connect("localhost","root","root") ;
    mysql_select_db("stage");
    }

    function connecter(){
    $con = mysqli_connect('localhost','root','root','stage');
    mysqli_select_db($con,"stage");
    return($con);
    }