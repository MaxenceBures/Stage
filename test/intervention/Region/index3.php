<?php
include('function.php');
?>
<head>
<title>Liste déroulantes dynamiques liées</title>
<script type="text/javascript" src="dept_xhr.js" charset="iso_8859-1"></script>
</head>
<body style="font-family: verdana, helvetica, sans-serif; font-size: 85%">
<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="chgdept"> 
  <legend>Sélectionnez une région</legend>
<select name="region" id="region" onchange="getDepartements(this.value);">
     <option value="vide">- - - Choisissez une région - - -</option>
     <?php
        $Users = ListeDeroulanteEntreprise() ;
        foreach ($Users as $User)
        {
  ?>
          <option value="<?php echo $User['ENT_CODE']; ?>"><?php echo $User['ENT_RAISONSOCIALE'] ?> </option>
  <?php
        }
  ?> </select>   
  <span id="blocDepartements"></span><br />
  <input type="submit" name="ok" id="ok" value="Envoyer" />
  
</form>
</body>
</html>