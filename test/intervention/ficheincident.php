<?php
require_once('function.php');
$con = connecter();
$test = $_POST['test'];
$enreg = mysql_fetch_assoc(mysql_query("SELECT INC_CODE, INC_LIBELLE, INC_DATEDEMANDE, UTI_LOGIN, INC_DATECLOTURE, ENT_RAISONSOCIALE FROM INCIDENT, UTILISATEUR, ENTREPRISE WHERE INC_CODE ='".$test."'AND INCIDENT.UTI_CODE = UTILISATEUR.UTI_CODE AND INCIDENT.ENT_CODE = ENTREPRISE.ENT_CODE"));
$enreg2 = mysqli_query($con,"SELECT INT_CODE, INT_LIBELLE, INT_DESCRIPTION, INT_HEUREDEB, INT_HEUREFIN, INT_DATEINTER, UTI_LOGIN   FROM INTERVENTION, UTILISATEUR WHERE INC_CODE ='".$test."' AND INT_TECHNICIEN = UTILISATEUR.UTI_CODE") or die(mysqli_error($con));

//INC_CODE, URG_CODE, UTI_CODE, ENT_CODE, ETA_CODE, INC_LIBELLE, INC_DESCRIPTION, INC_DATEDEMANDE, INC_DECOMPTE, INC_VALIDATION, INC_DEMANDE, INC_TYPE, INC_DATECLOTURE 
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
<table border='1'>

<?php

while($enreg2 = mysqli_fetch_array($enreg2) or die("Error: ".mysqli_error($con)))
//	    $rows[] = mysqli_fetch_array($enreg2);
//foreach($rows as $enreg2)
  {
?>
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
				 </table>