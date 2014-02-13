var value = "",
  value2 ="", 
  value3="",
  value4=""   
  q = 0,
  q2 = 0,
  q3 = 0,
  q4 = 0;
     
    function page(data){
      value4 = "respcli";
    }
    function page2(data){
      value4 = "cli";
    }
    function updateEtat(data){ 
        value = data;
    } 

    function updateUtil(data) { 
        value2 = data;
    }
    function triDate(data) { 
        value3 = data;
    }
    function showIntervention()
    {
       q = value,
       q2 = value2,
       q3 = value3;
       q4 = value4;
      var str ="";  
    if (q.value !=="")
      {
      str +=  "q=" + (q);
      } 
    if (q2.value !=="")
      {
      str += (str.length == 0? "" : "&") + "q2=" + (q2);
      }
     if (q3.value !=="")
      {
      str += (str.length == 0? "" : "&") + "q3=" + (q3);
      }
     if (q4.value !=="")
      {
      str += (str.length == 0? "" : "&") + "q4=" + (q4);
      }    
    if (str=="")
      {
      document.getElementById("container").innerHTML="<p style='text-align:center;'>Please Type In A Name To Retrieve Results</p>";
      return;
      } 
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("container").innerHTML=xmlhttp.responseText;
        }
      }
    //var variables = "q="str&"q2"=str2;  
    xmlhttp.open("GET","getintervention.php?"+str,true);
    alert(str);
    /*xmlhttp.open("GET","getintervention.php?"
        + "q=" + encodeURIComponent(q)
       + "&q2=" + encodeURIComponent(q2), true);*/
    xmlhttp.send();
    }

/**
 * Fonction privée qui va créer un objet XHR.
 * Cette fonction initialisera la valeur dans la variable globale définie
 * ci-dessus.
 */
 var requete = null;
function creerRequete()
  {
    try
    {
        /* On tente de créer un objet XmlHTTPRequest */
        requete = new XMLHttpRequest();
    }
    catch (microsoft)
    {
        /* Microsoft utilisant une autre technique, on essays de créer un objet ActiveX */
        try
        {
            requete = new ActiveXObject('Msxml2.XMLHTTP');
        }
        catch(autremicrosoft)
        {
            /* La première méthode a échoué, on en teste une seconde */
            try
            {
                requete = new ActiveXObject('Microsoft.XMLHTTP');
            }
            catch(echec)
            {
                /* À ce stade, aucune méthode ne fonctionne... mettez donc votre navigateur à jour ;) */
                requete = null;
            }
        }
    }
    if(requete == null)
    {
        alert('Impossible de créer l\'objet requête,\nVotre navigateur ne semble pas supporter les object XMLHttpRequest.');
    }
  }
/**
 * Fonction privée qui va mettre à jour l'affichage de la page.
 */
function actualiserDepartements()
  {
    var listeDept = requete.responseText;
    var blocListe = document.getElementById('blocEntreprises');
    blocListe.innerHTML = listeDept;
  }

/**
 * Fonction publique appelée par la page affichée.
 * Cette fonction va initialiser la création de l'objet XHR puis appeler
 * le code serveur afin de récupérer les données à modifier dans la page.
 */
function getDepartements(idr)
{
    /* Si il n'y a pas d'identifiant de région, on fait disparaître la seconde liste au cas où elle serait affichée */
    if(idr == 'vide')
    {
        document.getElementById('blocEntreprises').innerHTML = '';
    }
    else
    {
        /* À cet endroit précis, on peut faire apparaître un message d'attente */
        var blocListe = document.getElementById('blocEntreprises');
        blocListe.innerHTML = "Traitement en cours, veuillez patienter...";
        /* On crée l'objet XHR */
        creerRequete();
        /* Définition du fichier de traitement */
        var url = 'departements.php?idr='+ idr;
        /* Envoi de la requête à la page de traitement */
        requete.open('GET', url, true);
        /* On surveille le changement d'état de la requête qui va passer successivement de 1 à 4 */
        requete.onreadystatechange = function()
        {
            /* Lorsque l'état est à 4 */
            if(requete.readyState == 4)
            {
                /* Si on a un statut à 200 */
                if(requete.status == 200)
                {
                    /* Mise à jour de l'affichage, on appelle la fonction apropriée */
                    actualiserDepartements();
                }
            }
        };
        requete.send(null);
    }
}