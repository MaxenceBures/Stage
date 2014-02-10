<?php
require_once("function.php") ; 
//getUser();
?>
<html>
<head>
<script>
    var value = "",
     value2 ="",    
     q = 0,
     q2 = 0;
    function updateEtat(data) { 
        value = data;
        alert(value);
    } 
    function updateUtil(data) { 
        value2 = data;
        alert(value2);
        alert(value + value2);

    }
function showIntervention()
{
   q = value,
   q2 = value2;
  var str ="";  
  alert(q + q2);
if (q.value !=="")
  {
  str +=  "q=" + (q);
  } 
if (q2.value !=="")
  {
  str += (str.length == 0? "" : "&") + "q2=" + (q2);
  }  
if (str=="")
  {
  document.getElementById("container").innerHTML="<p style='text-align:center;'>Please Type In A Name To Retrieve Results</p>";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("container").innerHTML=xmlhttp.responseText;
    }
  }
//var variables = "q="str&"q2"=str2;  
xmlhttp.open("GET","getintervention.php?"+str,true);
alert(str);
/*xmlhttp.open("GET","getintervention.php?"
    + "q=" + encodeURIComponent(q)
   + "&q2=" + encodeURIComponent(q2), true);*/
xmlhttp.send();
}

</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>
<form>
<h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$_SESSION['fonction']) ?> </h3>
<br>
<div id="container"><b>Person info will be listed here.</b></div>

<select name="users" onchange="updateEtat(this.value), showIntervention()">
<option value="99" ><?php echo "Tous"?> </option>
  <?php
        $lesInters = getintervention() ;
        foreach ($lesInters as $unInter)
        {
  ?>
          <option value="<?php echo $unInter['ETA_CODE']; ?>"><?php echo $unInter['ETA_LIBELLE'] ?> </option>
  <?php
        }
  ?>
      </select>
  <select name="userss" onchange="updateUtil(this.value)">
     <option value="99"><?php echo "Tous"?> </option>
     <option value="1"><?php echo "1"?> </option>
     <option value="2"><?php echo "2"?> </option>
     <option value="3"><?php echo "3"?> </option>
      </select>   



<hr>
<input type="checkbox" onchange="showIntervention(this.value)" value="99"><?php echo "Tous"?></br>
  <?php
        $lesInters = getintervention() ;
        foreach ($lesInters as $unInter)
        {
  ?>
          <input type="checkbox" onchange="showIntervention(this.value)" value="<?php echo $unInter['ETA_CODE']; ?>"><?php echo $unInter["ETA_LIBELLE"] ?></br>
  <?php
        }
  ?>
 <input type="submit"  onclick="showIntervention()"> </br> 
<a href="ajoutintervention.php">Ajout Intervention</a>
</form>
</body>
</html>