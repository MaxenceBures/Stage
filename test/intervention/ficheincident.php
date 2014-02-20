<?php
require_once('function.php');
$con = connecter();
$test = $_POST['test'];
$enreg = mysqli_fetch_assoc(mysqli_query($con, "SELECT INC_CODE, INC_LIBELLE, INC_DATEDEMANDE, UTI_LOGIN, INC_DATECLOTURE, ENT_RAISONSOCIALE FROM INCIDENT, UTILISATEUR, ENTREPRISE WHERE INC_CODE ='".$test."'AND INCIDENT.UTI_CODE = UTILISATEUR.UTI_CODE AND INCIDENT.ENT_CODE = ENTREPRISE.ENT_CODE"));
$enreg2 = mysqli_query($con, "SELECT INT_CODE, INT_LIBELLE, INT_DESCRIPTION, INT_HEUREDEB, INT_HEUREFIN, INT_DATEINTER, UTI_LOGIN   FROM INTERVENTION, UTILISATEUR WHERE INC_CODE ='".$test."' AND INT_TECHNICIEN = UTILISATEUR.UTI_CODE") ;
//ob_start();
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

}?><form action="pdf.php" method="POST"><table><td>
<input type="submit" name="test" id="test" value="<?php echo($enreg['INC_CODE'])?>">PDF</input>
</td></table></form>
<!-- <?php/* //}
/*
while($enreg2 = mysql_fetch_array($enreg2)){
//	    $rows[] = mysqli_fetch_array($enreg2);
//foreach($rows as $enreg2)
  var_dump($enreg2);

			<hr>
				<tr>
					<td>
						<label for="num">Intervention n° : </label>
					</td>
					<td>
						<input type="text" id="num" required="" value="<?php echo($enreg2['INT_CODE']); ?>" name="num" readonly/>
					</td>
				
					<td>
						<label for="date">effectuée le : </label>
					</td>
					<td>
						<input type="text" id="date" required="" value="<?php echo($enreg2['INT_DATEINTER']); ?>" name="date" readonly/>
					</td>
				
					<td>
						<label for="deb">De : </label>
					</td>
					<td>
						<input type="text" id="deb" required="" value="<?php echo($enreg2['INT_HEUREDEB']); ?>" name="deb"readonly/>
					</td>
				
					<td>
						<label for="fin">A : </label>
					</td>
					<td>
						<input type="text" id="fin" name="fin" value="<?php echo($enreg2['INT_HEUREFIN']); ?>"readonly/>
					</td>
			
					<td>
						<label for="inter">Par : </label>
					</td>
					<td>
						<input type="text" id="inter" name="inter" value="<?php echo($enreg2['UTI_LOGIN']); ?> "readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="libelle">Libelle : </label>
					</td>
					<td>
						<input type="text" id="libelle" name="libelle" value="<?php echo($enreg2['INT_LIBELLE']); ?>" readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="description">Description : </label>
					</td>
					<td>
						<textarea value=""><?php echo($enreg2['INT_DESCRIPTION']); ?></textarea>
					</td>
				</tr>
				 
				 <?php }?>
// 				 </table>*$content = ob_get_clean();
// require('html2pdf/html2pdf.class.php');
// try{
// 	$pdf = new HTML2PDF('P','A4','fr');
// 	$pdf-> writeHTML($content);
// 	$pdf->Output('test.pdf');
// }
// catch(HTML2PDF_exception $e){
// 	die($e);
// }*/
?>