<?php
require_once("function.php") ; 
//getUser();
?>
<html>
<head>
<script>
function showIntervention(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getintervention.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

<select name="users" onchange="showIntervention(this.value)">
<option value="99"><?php echo "Tous"?> </option>
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

<hr>
<input type="checkbox" onclick="showIntervention(this.value)" value="99"><?php echo "Tous"?> </option></br>
  <?php
        $lesInters = getintervention() ;
        foreach ($lesInters as $unInter)
        {
  ?>
          <input type="checkbox" onclick="showUser(this.value)" value="<?php echo $unInter['ETA_CODE']; ?>"><?php echo $unInter["ETA_LIBELLE"] ?></option></br>
  <?php
        }
  ?>
   

</body>
</html>