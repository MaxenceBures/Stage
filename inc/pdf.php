<?php
require_once('function.inc.php');
$con = connecter();
$test = $_POST['test'];
$enreg = mysqli_fetch_assoc(mysqli_query($con, "SELECT INC_CODE, INC_LIBELLE, INC_DATEDEMANDE, UTI_LOGIN, INC_DATECLOTURE, ENT_RAISONSOCIALE, INC_VALIDATION FROM INCIDENT, UTILISATEUR, ENTREPRISE WHERE INC_CODE ='".$test."'AND INCIDENT.UTI_CODE = UTILISATEUR.UTI_CODE AND INCIDENT.ENT_CODE = ENTREPRISE.ENT_CODE"));
$enreg2 = mysqli_query($con, "SELECT INT_CODE, INT_LIBELLE, INT_DESCRIPTION, INT_HEUREDEB, INT_HEUREFIN, INT_DATEINTER, UTI_LOGIN   FROM INTERVENTION, UTILISATEUR WHERE INC_CODE ='".$test."' AND INT_TECHNICIEN = UTILISATEUR.UTI_CODE") ;
ob_start();
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
						<label for="libelle" >Par : <?php echo($enreg['UTI_LOGIN']);?></label>
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
   		<table border='1' bgcolor="#FFFFCC" align="center">
   		<tr>
					<td>
						<label for="num">Intervention n° :  <?php echo $array['INT_CODE']; ?></label>
					</td>
					
				
					<td>
						<label for="date">effectuée le : <?php echo $array['INT_DATEINTER']; ?> </label>
					</td>
					
				
					<td>
						<label for="deb">De :  <?php echo $array['INT_HEUREDEB']; ?> </label>
					</td>
					
				
					<td>
						<label for="fin">A :  <?php echo $array['INT_HEUREFIN']; ?></label>
					</td>
				
					<td>
						<label for="inter">Par : <?php echo $array['UTI_LOGIN']; ?></label>
					</td>
					
				</tr>
				<tr>
					<td>
						<label for="libelle">Libelle : <?php echo $array['INT_LIBELLE']; ?></label>
					</td>
					
				</tr>
				<tr>
					<td>
						<label for="description">Description : <?php echo $array['INT_DESCRIPTION']; ?></label>
					</td>
					
				</tr>
				</table>
				<?php

				}


} if ($enreg['INC_VALIDATION'] == '0' OR  $enreg['INC_VALIDATION'] == '' ) {
					echo "<h2 bgcolor='red'>Non Validé </h2>";
				 	# code...
				 }
				 else{
				 	echo "<h2 bgcolor='red'> Validé</h2>";
				 } 

$content = ob_get_clean();
require('../html2pdf/html2pdf.class.php');
try{
	$pdf = new HTML2PDF('P','A4','fr');
	$pdf-> writeHTML($content);
	$pdf->Output('test.pdf');
}
catch(HTML2PDF_exception $e){
	die($e);
}?>