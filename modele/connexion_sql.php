<?php
	global $bdd;

class connexion_sql {
	
	public function __construct(){
		$bdd = null;
	}

    public function openDb() {
    	try {
			$bdd = new PDO('mysql:host=localhost;dbname=projetPhp;charset=utf8', 'root', 'root');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
		return $bdd;
    }

    public function closeDb() {
        $bdd=null;
    }    


}