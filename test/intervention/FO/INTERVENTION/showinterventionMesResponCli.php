<?php
require_once("function.php") ; 
$fonction = $_SESSION['fonction'];
//getUser();
?>
<html>
<head>
<script type="text/javascript" src="test.js" charset="iso_8859-1"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">
function getHU()
{
var hu = document.getElementById("test").value;
return(hu);
} </script>
</head>
<body>

<form>
<!-- <h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3> -->
<br>
<H2 align="center">MES INCIDENTS</H2>
<div id="container"><b>Person info will be listed here.</b></div>
<select name="etat" onchange="getHU(),updateEtat(this.value),page(), showIntervention()">
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
<input type="checkbox" value="1" id="Date" name="Date" onchange="triDate(this.value),page(), showIntervention()" >Date</input>  
<input type="hidden" value="respcli" id="test"></input>
<hr>
<table>
<td>
<input type="checkbox" onchange="updateEtat(this.value),page(), showIntervention()" value="99"><?php echo "Tous"?></br>
  <?php
        $lesInters = ListeIntervention() ;
        foreach ($lesInters as $unInter)
        {
  ?>
          <input type="checkbox" onchange="updateEtat(this.value),page(), showIntervention()" value="<?php echo $unInter['ETA_CODE']; ?>"><?php echo $unInter["ETA_LIBELLE"] ?></br>
  <?php
        }
  ?>
  </td>
</table>  
 <input type="submit"  onclick="getHU(), showIntervention()"> </br> 
<a href="ajoutintervention.php">Ajout Intervention</a>
</form>
</body>
</html>