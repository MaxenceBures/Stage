<?php
   class clstBaseMysql
   {   		
      	private $id;		// identifiant de la connexion
		private $Serveur ;  // nom de l'hôte
      	private $Bdd;   	// Le nom de la base de données
      	private $User;    	// Le nom d'utilisateur
      	private $Mdp;		// Le mot de passe

 	   // Constructeur de la classe
  	    public function __construct($pServeur,$pUser,$pMdp,$pBdd)
		{
         	$this->Serveur = $pServeur;
         	$this->Bdd     = $pBdd;
         	$this->User    = $pUser;
         	$this->Mdp     = $pMdp;         	
           	$this->id 	   = $this->connect($pServeur, $pUser, $pMdp);
			$this->selectBdd($pBdd);
        }
        
        // se connecter à la base de données MySQL
       	private function connect($pServeur, $pUser, $pMdp)
		{
        	$res = mysql_connect($pServeur, $pUser, $pMdp) or die("Erreur de connexion à MySql");
        	return ($res) ;
        }
 		
		// sélectionner une base
      	private function selectBdd($pBdd)
		{
       		mysql_select_db($pBdd) or die("erreur sur la base de données") ;     	
        }

		// Envoyer la requête de type SELECT 
		public function query($pReq)
		{
           	$res =  mysql_query($pReq) or die("erreur avec la requête ". $pReq);
        	return ($res) ;
        }
		
		// Lire le résultat de la requête de type SELECT et retourner un tableau (curseur)
      	public function tabResult($pReq)
		{
           	$tabRes = mysql_fetch_array($pReq);
           	return ($tabRes) ;
     	}
     	 
		// Exécuter la requête et retourner la valeur obtenue par count, sum, avg, max, min (si un seul champ)	
		function getNombre($pReq)
		{
			$res = mysql_query($pReq) or die("erreur avec la requête ". $pReq);
			$champ = mysql_result($res, 0);
			return ($champ);
		}
		
		// Retourner le dernier identifiant généré par un champ de type AUTO_INCREMENT
		public function dernierId()
		{
      		$res = mysql_query($pReq) or die("erreur avec la requête ");
         	return (mysql_insert_id());
      	}
		
		// Lire le résultat de la requête de type SELECT et retourner un tableau asociatif
       	public function tabAssoc($pReq)
		{
           	$TabRes = mysql_fetch_assoc($pReq);
		   	return ($TabRes) ;
     	}
	
		// Retourner le nombre de lignes affectées par la dernière opération SQL.
     	public function getNbLignes($pReq)
		{
           	return (mysql_num_rows($pReq)) ;
    	}
    	    	
    	// Exécuter la requête de type INSERT, UPDATE ,DELETE
		public function execute($pReq)
		{
           	$res =  mysql_query($pReq) or die("erreur avec la requête de modification de données " .$pReq);
        	return ($res) ;
        }
      public function erreur($pReq)
    {
            $res =  mysql_error($pReq);
          return ($res) ;
        }    
         
        // Destructeur de la classe Connexion
     	public function destruct()
		{
			mysql_close($this->id);
		}    
    }
?>

