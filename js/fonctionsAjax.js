	function getReqHttp()
	{
      var reqHttp = null;

		if(window.XMLHttpRequest)
		{
			// Firefox (Mozilla) et autres
		   	reqHttp = new XMLHttpRequest(); 				
		}
		else
		{
			if(window.ActiveXObject)
			{
				// Internet Explorer
			   	try
				{
					reqHttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch (e)
				{
					reqHttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
			}
			else
			{
				// XMLHttpRequest non supporté par le navigateur
			  	 alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
			     reqHttp = false;
			}
		}
        return reqHttp;
	}	
	
	
	function envoyerListe(methode, url, idChamp, codeId )
	{
		//alert(methode + " url=" + url + " champ =" + idChamp +" id =" + codeId) ;
	
		//  récupération d'un objet XMLHttpRequest
		var reqHttp1 = getReqHttp() ;	
	
		if ( reqHttp1 == null)
		{			
			alert("Impossible d'utiliser Ajax sur ce navigateur");			
		}
		else
		{
			url =  "FO/MODELES/" +  url  + ".inc.php" ;			
			//alert (url) ;
			// appel d'une fonction anonyme (définie à la volée)
			reqHttp1.onreadystatechange = function()
			{
				// code de la fonction
		        if (reqHttp1.readyState == 4 && reqHttp1.status == 200)
				{				 		
					lesChamps = document.getElementById(codeId);
					//alert(codeId + "  " + lesChamps) ;
					//alert(reqHttp1.responseText) ;
					lesChamps.innerHTML = reqHttp1.responseText;
				}
		 	}
		 	if ( methode == "POST")
			{			 	
				//  ouverture de la connexion avec le serveur
		  		reqHttp1.open("POST", url,true) ;	
		 		reqHttp1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		 		lesElts = document.getElementById(idChamp);
				//alert (lesElts) ;
		 		codeElt = lesElts.options[lesElts.selectedIndex].value ;
				//alert (codeElt) ;
				//  envoi de la requête
				reqHttp1.send("codeElt="+codeElt);	
			}
			else
			{
				if (methode == "GET")
				{
					//  ouverture de la connexion avec le serveur - méthode GET - asynchrone
					// escape permet de s'affranchir des problèmes liés aux caractères spéciaux
				 	reqHttp1.open("GET", url + "?codeElt=" + escape(idChamp),true);
				 	//  envoi de la requête
					reqHttp1.send(null);
				}					 
			}		
		}
		return ;
	}
	
	
	

	
		

