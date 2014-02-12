<?php
require_once("function.php") ; 
$fonction = $_SESSION['fonction'];
//getUser();
?>
<html>
<head>
<script>


    var value = "",
     value3="",   
     q = 0,
     q3 = 0;
    function updateEtat(data) { 
        value = data;
      
    } 
    function triDate(data) { 
        value3 = data;
      
    }
    function showIntervention()
    {
       q = value,
       q3 = value3;
      var str ="";  
    if (q.value !=="")
      {
      str +=  "q=" + (q);
      } 
     if (q3.value !=="")
      {
      str += (str.length == 0? "" : "&") + "q3=" + (q3);
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

</head>
<body>

<form>
<h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3>
<br>
<H2 align="center">MES INCIDENTS</H2>
<div id="container"><b>Person info will be listed here.</b></div>
<select name="etat" onchange="updateEtat(this.value), showIntervention()">
<option value="99" ><?php echo "Tous"?> </option>
  <?php
        $lesInters = ListeIntervention() ;
        foreach ($lesInters as $unInter)
        {
  ?>
          <option value="<?php echo $unInter['ETA_CODE']; ?>"><?php echo $unInter['ETA_LIBELLE'] ?> </option>
  <?php
        }
  ?>
  </select>
<input type="checkbox" value="1" id="Date" name="Date" onchange="triDate(this.value), showIntervention()" >Date</input>  
<hr>
<table>
<td>
<input type="checkbox" onchange="updateEtat(this.value), showIntervention()" value="99"><?php echo "Tous"?></br>
  <?php
        $lesInters = ListeIntervention() ;
        foreach ($lesInters as $unInter)
        {
  ?>
          <input type="checkbox" onchange="updateEtat(this.value), showIntervention()" value="<?php echo $unInter['ETA_CODE']; ?>"><?php echo $unInter["ETA_LIBELLE"] ?></br>
  <?php
        }
  ?>
  </td>
</table>  
 <input type="submit"  onclick="showIntervention()"> </br> 
<a href="ajoutintervention.php">Ajout Intervention</a>
</form>
</body>
</html>