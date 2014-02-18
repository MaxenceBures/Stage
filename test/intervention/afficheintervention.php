<?php
require_once('function.php');
//afficheintervention();
$fonction = $_SESSION['fonction'];
$test = $_POST['test'];
//var_dump($test);
/*</form><form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" data-ajax="false" id="ajout_form"> */

$enreg = mysql_fetch_assoc(mysql_query("SELECT INT_CODE, INT_LIBELLE, INT_DESCRIPTION, INT_HEUREDEB, INT_HEUREFIN, INT_DATEINTER, UTI_LOGIN   FROM INTERVENTION, UTILISATEUR WHERE INT_CODE ='".$test."' AND INT_TECHNICIEN = UTILISATEUR.UTI_CODE"));
//ob_start();	
?>
	<html>
		<head>
		<script type="text/javascript" src="test.js" charset="iso_8859-1"></script>
		</head>
		<body>
		<h3 align="right">Vous etes connectes en tant que <?php echo($_SESSION['login'].' '.$fonction) ?> </h3>
		<h2 align="center">Affiche intervention</H2>
		<div data-role="page">

			<table class="style1">
				<tr>
					<td>
						<label for="num">Intervention n° : </label>
					</td>
					<td>
						<input type="text" id="num" required="" value="<?php echo($enreg['INT_CODE']); ?>" name="num" readonly/>
					</td>
				
					<td>
						<label for="date">effectuée le : </label>
					</td>
					<td>
						<input type="text" id="date" required="" value="<?php echo($enreg['INT_DATEINTER']); ?>" name="date" readonly/>
					</td>
				
					<td>
						<label for="deb">De : </label>
					</td>
					<td>
						<input type="text" id="deb" required="" value="<?php echo($enreg['INT_HEUREDEB']); ?>" name="deb"readonly/>
					</td>
				
					<td>
						<label for="fin">A : </label>
					</td>
					<td>
						<input type="text" id="fin" name="fin" value="<?php echo($enreg['INT_HEUREFIN']); ?>"readonly/>
					</td>
			
					<td>
						<label for="inter">Par : </label>
					</td>
					<td>
						<input type="text" id="inter" name="inter" value="<?php echo($enreg['UTI_LOGIN']); ?> "readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="libelle">Libelle : </label>
					</td>
					<td>
						<input type="text" id="libelle" name="libelle" value="<?php echo($enreg['INT_LIBELLE']); ?>" readonly/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="description">Description : </label>
					</td>
					<td>
						<textarea value=""><?php echo($enreg['INT_DESCRIPTION']); ?></textarea>
					</td>
				</tr>
			</table>
			
					
 

	</div>
	</body>
	</html>
<?php
/*$content = ob_get_clean();
require('html2pdf/html2pdf.class.php');
try{
	$pdf = new HTML2PDF('P','A4','fr');
	$pdf-> writeHTML($content);
	$pdf->Output('test.pdf');
}
catch(HTML2PDF_exception $e){
	die($e);
}
*/
?>
