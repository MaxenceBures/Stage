
    var value = "",
     value2 ="", 
     value3="",   
     q = 0,
     q2 = 0,
     q3 = 0;
    function updateEtat(data) { 
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