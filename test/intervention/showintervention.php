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
  <?php if ($fonction == 'utilisateur') {
  }
  elseif ($fonction =='responsablecli' OR $fonction =='intervenant' OR $fonction =='responsableint') {
  ?>   
  <select name="users" onchange="updateUtil(this.value), showIntervention()">
     <option value="98" ><?php echo "Tous"?> </option>
     <?php
        $Users = ListeDeroulanteUtilisateur() ;
        foreach ($Users as $User)
        {
  ?>
          <option value="<?php echo $User['UTI_CODE']; ?>"><?php echo $User['UTI_LOGIN'] ?> </option>
  <?php
        }
  ?> </select>   
<?php
}
?>

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
  <?php
  if ($fonction == 'utilisateur') {
  
  }
  elseif ($fonction =='responsablecli' OR $fonction =='intervenant' OR $fonction =='responsableint') {

  ?> 
  <td>
  <input type="checkbox" onchange="updateUtil(this.value), showIntervention()" value="98"><?php echo "Tous"?></br>
  <?php
        $Users = ListeDeroulanteUtilisateur() ;
        foreach ($Users as $User)
        {
  ?>
          <input type="checkbox" onchange="updateEtat(this.value), showIntervention()" value="<?php echo $User['UTI_CODE']; ?>"><?php echo $User['UTI_LOGIN'] ?></br>
  <?php
        }}
  ?>
  </td>
</table>  
 <input type="submit"  onclick="showIntervention()"> </br> 
<a href="ajoutintervention.php">Ajout Intervention</a></br>
<a href="showinterventionMesResponCli.php">Mes Interventions </a></br>
<a href="Region/test.html">TEST AJAX </a></br>
</form>
</body>
</html>