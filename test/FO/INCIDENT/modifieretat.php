<?php
// require_once('function.php');
 modifetat();
// $fonction = $_SESSION['fonction'];
 // $test = $_POST['test'];
 // $test2 = $_POST['test2'];
 $test = $_GET['test'];
var_dump($test);
$enreg = mysql_fetch_assoc(mysql_query("SELECT INC_CODE, INC_LIBELLE, INC_DESCRIPTION  FROM INCIDENT WHERE INC_CODE ='".$test."'"));

?>
<html>
<head>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" data-ajax="false" id="ajout_form"> 
			<table class="style1">
				<tr>
					<td>
						<label for="code">Identiant : </label>
					</td>
					<td>
						<input type="text" id="code" required="" value="<?php echo ($enreg['INC_CODE']); ?>" name="code" readonly/>
					</td>
					<td>
						<label for="libelle">Libelle : </label>
					</td>
					<td>
						<input type="text" id="libelle" required="" name="libelle" value="<?php echo ($enreg['INC_LIBELLE']); ?>" readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="description">Description : </label>
					</td>
					<td>
					<textarea id="description"  name="description"><?php echo ($enreg['INC_DESCRIPTION']); ?></textarea>
						<!-- <input type="text" id="adresse" required="" name="adresse" value="<?php echo ($enreg['INC_DESCRIPTION']); ?>" readonly/> -->
					</td>
				</tr>
				<tr>
				<td><select name="etat" >
  <?php
        $lesInters = ListeDeroulanteEtatModif() ;
        foreach ($lesInters as $unInter)
        {
  ?>
          <option value="<?php echo $unInter['ETA_CODE']; ?>"><?php echo $unInter['ETA_LIBELLE'] ?> </option>
  <?php
        }
  ?>
  </select></td>
				</tr>
				<tr>
				<td><input type="submit" name="go_modifetat" id="go_modifetat" value="Modifier"/></td>
				</tr>
				</table>
				</form>		
</body>
</html>