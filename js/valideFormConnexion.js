$(document).ready(function()
{
	$("#frmConnexion").validate({
		rules:{
			login_cnx :"required",
			mdp_cnx	  :"required"
		},
		
		messages:{
			login_cnx :{required:"Veuillez saisir votre login"},
			mdp_cnx   :{required:"Veuillez saisir votre mot de passe"},
		},
	});
});