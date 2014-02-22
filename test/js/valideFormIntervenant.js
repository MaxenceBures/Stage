$(document).ready(function()
{
	$("#frmInter").validate({
		rules:{
			num_poste:"required",
		},
		
		messages:{
			num_poste:"required",
		},
	});
});