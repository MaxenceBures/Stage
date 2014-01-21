<?php
$oBdd = $_SESSION['bdd'];

$iNumTicket  = $_POST["lst_rticket"] ;
$iNumInterv = $_POST["lst_rinterv"] ;

if ($iNumTicket != null)
	{
		$sReq = "UPDATE Ticket
				SET Tic_Intervenant = :interv
				WHERE Tic_Num = :ticket";

		$oBdd->exec($sReq, array('interv'=>$iNumInterv, 'ticket'=>$iNumTicket)) ;

?>
	<script language="Javascript">
		alert("Ticket réaffecté");
		window.location.replace("?page=suivisTcks")
	</script>
<?php
	}
	else
	{
?>
		<script language="Javascript">
			alert("Il n'y a aucun ticket");
			window.location.replace("?page=suivisTcks")
		</script>
<?php
	}