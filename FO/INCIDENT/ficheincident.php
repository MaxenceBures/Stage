<?php
// require_once('function.php');
$con = connecter();
$test= $_GET['variable'];
// $test = $_POST['test'];
$enreg = mysqli_fetch_array(mysqli_query($con, "SELECT INC_CODE, INC_LIBELLE, INC_DATEDEMANDE, UTI_LOGIN, INC_DATECLOTURE, ENT_RAISONSOCIALE, INC_CLOTURE, ETA_CODE FROM INCIDENT, UTILISATEUR, ENTREPRISE WHERE INC_CODE = '".$test."' AND INCIDENT.UTI_CODE = UTILISATEUR.UTI_CODE AND INCIDENT.ENT_CODE = ENTREPRISE.ENT_CODE"));
$enreg2 = mysqli_query($con, "SELECT INT_CODE, INT_LIBELLE, INT_DESCRIPTION, INT_HEUREDEB, INT_HEUREFIN, INT_DATEINTER, UTI_LOGIN   FROM INTERVENTION, UTILISATEUR WHERE INC_CODE ='".$test."' AND INT_TECHNICIEN = UTILISATEUR.UTI_CODE") ;
?>
<table class="style1">
				<tr>
					<td>
						<label for="num">Incident n° :  <?php echo($enreg['INC_CODE']); ?></label>
					</td>
					<td>
						<label for="libelle" >Libelle : <?php echo($enreg['INC_LIBELLE']);?></label>
					</td>
			</tr>
			<tr>
			<td>
						<label for="num">Date ouverture :  <?php echo($enreg['INC_DATEDEMANDE']); ?></label>
					</td>
					<td>
						<label for="libelle" >Par : <?php echo($enreg['UTI_LOGIN']);?></label>
					</td>
			</tr>
			<tr>
			<td>
						<label for="num">Date cloture :  <?php echo($enreg['INC_DATECLOTURE']); ?></label>
					</td>
					<td>
						<label for="libelle" >Par : <?php echo($enreg['INC_CLOTURE']);?></label>
					</td>
			</tr>
			<tr>
			<td>
						<label for="num">Nom Entreprise :  <?php echo($enreg['ENT_RAISONSOCIALE']); ?></label>
					</td>
					<td>
						<label for="libelle" >Nom Demandeur : <?php echo($enreg['UTI_LOGIN']);?></label>
					</td>
			</tr>
</table>


<?php
$row = 1;
//$result = mysql_query("SELECT id,link FROM mytable Order By id DESC LIMIT 0,5");
$new_array[] = $row;
// while ($row = mysql_fetch_array($enreg2)) {
//     $new_array[$row['INT_CODE']] = $row;
//     $new_array[$row['INT_DATEINTER']] = $row;
// }
//mysql_close($db);// close mysql then do other job with set_time_limit(59)

while ($row = mysqli_fetch_array($enreg2)) 
{
    $new_array[$row['INT_CODE']]['INT_CODE'] = $row['INT_CODE'];
    $new_array[$row['INT_CODE']]['INT_DATEINTER'] = $row['INT_DATEINTER'];
    $new_array[$row['INT_CODE']]['INT_HEUREDEB'] = $row['INT_HEUREDEB'];
    $new_array[$row['INT_CODE']]['INT_HEUREFIN'] = $row['INT_HEUREFIN'];
    $new_array[$row['INT_CODE']]['UTI_LOGIN'] = $row['UTI_LOGIN'];
    $new_array[$row['INT_CODE']]['INT_LIBELLE'] = $row['INT_LIBELLE'];
    $new_array[$row['INT_CODE']]['INT_DESCRIPTION'] = $row['INT_DESCRIPTION'];
}
//if(is_array($row)){
foreach($new_array as $array){
  if( $array['INT_CODE'] == "") {echo "test";} 
  else {  ?>
   <hr>
   		<table border='1'  width=60%>
   		<tr>
					<td>
						<label for="num">Intervention n° : </label>
					</td>
					<td>
						<input type="text" id="num" required="" value="<?php echo $array['INT_CODE']; ?>"  name="num" readonly/>
					</td>
				
					<td>
						<label for="date">effectuée le : </label>
					</td>
					<td>
						<input type="text" id="date" required="" value="<?php echo $array['INT_DATEINTER']; ?>" name="date" readonly/>
					</td>
				
					<td>
						<label for="deb">De : </label>
					</td>
					<td>
						<input type="text" id="deb" required="" value="<?php echo $array['INT_HEUREDEB']; ?>" name="deb"readonly/>
					</td>
				
					<td>
						<label for="fin">A : </label>
					</td>
					<td>
						<input type="text" id="fin" name="fin" value="<?php echo $array['INT_HEUREFIN']; ?>"readonly/>
					</td>
			
					<td>
						<label for="inter">Par : </label>
					</td>
					<td>
						<input type="text" id="inter" name="inter" value="<?php echo $array['UTI_LOGIN']; ?> "readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="libelle">Libelle : </label>
					</td>
					<td>
						<input type="text" id="libelle" name="libelle" value="<?php echo $array['INT_LIBELLE']; ?>" readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="description">Description : </label>
					</td>
					<td>
						<textarea value=""><?php echo $array['INT_DESCRIPTION']; ?></textarea>
					</td>
				</tr>
				</table>
				
				<?php }
if ($enreg['ETA_CODE'] == '5') 
{
	?>
		<form action="INC/pdf.php" method="POST">
		<input type="submit" value="PDF"></input>
		<input type="hidden" name="test" id="test" value="<?php echo ($enreg['INC_CODE'])?>">
		</form>
	<?php
}
elseif ($enreg['ETA_CODE'] == '3' OR $enreg['ETA_CODE'] == '4') 
{
	?>	
		<form action="?page=cloturer" method="POST">
		<input type="submit" value="Cloturer"></input>
		<input type="hidden" name="test" id="test" value="<?php echo ($enreg['INC_CODE'])?>">
		</form>
	<?php	
}	

}?>
