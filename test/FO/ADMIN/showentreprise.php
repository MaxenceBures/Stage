<?php
// require_once("function.php") ; 
// $fonction = $_SESSION['fonction'];
 $test = infosEntrepriserespint()
//getUser();
?>
<html>
<head>
<!--<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>-->
<script type="text/javascript">alert ($('#Date').attr('checked')); </script>
<script type="text/javascript" src="JS/fonctions.js" charset="iso_8859-1"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

<form>
<!-- <h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3> -->
<br>
<H2 align='center'>Utilisateur</H2>
<div id="container"><b>Person info will be listed here.</b></div>

<table border='1'>
<tr>
<th>id</th>
<th>RS</th>
<th>Heures</th>
<th>Ville</th>
<th>Telephone</th>
<th>Siteweb</th>
</tr><?php

while($row = mysqli_fetch_array($test))
  {
  echo "<tr>";
  echo "<td>" . $row['ENT_CODE'] . "</td>";
  echo "<td>" . $row['ENT_RAISONSOCIALE'] . "</td>";
  echo "<td>" . $row['ENT_HEURES'] . "</td>";
  echo "<td>" . $row['ENT_VILLE'] . "</td>";
  echo "<td>" . $row['ENT_TELEPHONE'] . "</td>";
  echo "<td>" . $row['ENT_SITEWEB'] . "</td>";
  echo "<td>" . $row['ENT_TRIGRAMME'] . "</td>";?>
  <td>
     <a href="?page=modifentreprise&test=<?php print($row['ENT_CODE']) ?>"><input type="button" value="Plus d'infos" id="test" onClick="if(confirm('Vous allez consulter les informations concernant les entreprises'))
                 {
                    submit()
                  }
                  else{
                  return false;
                  }
                  
              " /></a>
 <!--  <form action="?page=modifentreprise" method="POST">
                <input type="hidden" name="test" id="test" value="<?php echo ($row['ENT_CODE']); ?>">
                <input type="submit" name="test2" id="test2" value="<?php echo ($row['ENT_CODE']); ?>" onClick="
                  if(confirm('Vous allez consulter les informations concernant les stations'))
                  {
                    submit()
                  }
                  else{
                  return false;
                  }
                  "/>
              </form> -->
  <?php echo "</td>";            
}
  ?>
</table>
<!-- 
<option value="94" ><?php echo "Tous"?> </option>
  <?php
        $lesInters = ListeDeroulanteRole() ;
        foreach ($lesInters as $unInter)
        {
  ?>
          <option value="<?php echo $unInter['ROL_CODE']; ?>"><?php echo $unInter['ROL_LIBELLE'] ?> </option>
  <?php
        }
  ?>
  </select></br>
  <table>
    <td>
  <input type="checkbox" onchange="updateFonction(this.value), showIntervention()" value="95"><?php echo "Tous"?></br>
  <?php
        $Entreprises = ListeDeroulanteRole() ;
        foreach ($Entreprises as $Entreprise)
        {
  ?>
          <input type="checkbox" onchange="updateFonction(this.value), showIntervention()" value="<?php echo $Entreprise['ROL_CODE']; ?>"><?php echo $Entreprise['ROL_LIBELLE'] ?></br>
  <?php
        }      
  ?>
  </td>
  </table> -->
 <input type="submit"  onclick="showIntervention()"> </br> 

</form>
</body>
</html>