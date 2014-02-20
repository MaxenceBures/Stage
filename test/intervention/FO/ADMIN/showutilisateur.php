<?php
require_once("function.php") ; 
$fonction = $_SESSION['fonction'];
//getUser();
?>
<html>
<head>
<!--<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>-->
<script type="text/javascript">alert ($('#Date').attr('checked')); </script>
<script type="text/javascript" src="test.js" charset="iso_8859-1"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

<form>
<!-- <h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3>
 --><br>
<H2 align='center'>Utilisateur</H2>
<div id="container"><b>Person info will be listed here.</b></div>
<select name="etat" onchange="updateFonction(this.value), showIntervention()">
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
  </table>
 <input type="submit"  onclick="showIntervention()"> </br> 
<a href="ajoutintervention.php">Ajout Intervention</a></br>
<a href="showinterventionMesResponCli.php">Mes Incidents / Responsable Client </a></br>
<a href="">Interventions / Intervenant </a></br>
</form>
</body>
</html>