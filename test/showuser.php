<?php
require_once("function.php") ; 
//getUser();
?>
<html>
<head>
<script>
function showUser(str)
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
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

<select name="users" onchange="showUser(this.value)">
<option value="99"><?php echo "Tous"?> </option>
  <?php
        $lesUsers = getUser() ;
        foreach ($lesUsers as $unUser)
        {
  ?>
          <option value="<?php echo $unUser['Uti_Code']; ?>"><?php echo $unUser["Uti_Login"] ?> </option>
  <?php
        }
  ?>
      </select>

<hr>
<input type="checkbox" onclick="showUser(this.value)" value="99"><?php echo "Tous"?> </option></br>
  <?php
        $lesUsers = getUser() ;
        foreach ($lesUsers as $unUser)
        {
  ?>
          <input type="checkbox" onclick="showUser(this.value)" value="<?php echo $unUser['Uti_Code']; ?>"><?php echo $unUser["Uti_Login"] ?></option></br>
  <?php
        }
  ?>
   

</body>
</html>