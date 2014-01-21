<table>
	<tr>
		<td width="20%">
			<img src="images/maintenance.png" alt="logo maintenance" />
		</td>
		<td width="55%">
			<div id="bandeau">
				 <h4 class="text-align-center text-bold">
					Gestion des interventions
				</h4>
			</div>
		</td>

		<div class="col span_7">
            <div class="header-social-icons-parent">
                <div class="header-social-icons clr">

		<td width="25%">
	
<?php
			//si un utilisateur est connecté
			if (isset($_SESSION["login"]))
			{										
				require("FO/VUES/fo_infoCnx.php");	
			}	
?>
		</td>
				</div>
			</div>
		</div>
	</tr>
</table>