<?php

class Contact

{

    private $id;
	private $nom;
	private $prenom;
	private $societe;
	private $adresse;
	private $num;
	private $email;
	private $site;
	private $statut;
    private $date;
    

   

    public function __construct($id="",$nouveauNom="",$nouveauPrenom="",$nouvelSociete="",$nouvelAdresse="",$nouvauNum="",$nouveauEmail="",$nouveauSite="",$nouveauStatut=""){
        $this->id=$id;
        $this->nom = $nouveauNom;
        $this->prenom = $nouveauPrenom ;
        $this->societe = $nouvelSociete ;
        $this->adresse = $nouvelAdresse;
        $this->num = $nouvauNum;
        $this->email = $nouveauEmail ;
        $this->site = $nouveauSite;
        $this->statut = $nouveauStatut;
        $this->date = new DateTime();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function getNom(){
    	return $this->nom;
    }

    public function setNom($nouveauNom){
    	$this->nom = $nouveauNom;
    }

    public function getPrenom(){
    	return $this->prenom ;
    }

    public function setPrenom($nouveauPrenom){
    	$this->prenom = $nouveauPrenom ;
    }
    

    public function getSociete(){
    	return $this->societe ;
    }
    
    public function setSociete($nouvelSociete){
    	$this->societe = $nouvelSociete ;
    }

    public function getAdresse(){
    	return $this->adresse ;
    }

    public function setAdresse($nouvelAdresse){
    	$this->adresse = $nouvelAdresse;
    }    
    
    public function getNum(){
    	return $this->num ;
    }
    
    public function setNum($nouvauNum){
    	$this->num = $nouvauNum;
    }

    public function getEmail(){
    	return $this->email ;
    }
    
    public function setEmail($nouveauEmail){
    	$this->email = $nouveauEmail ;
    }

    public function getSite(){
    	return $this->site ;
    }

    public function setSite($nouveauSite){
    	$this->site = $nouveauSite;
    }

    public function getStatut(){
    	return $this->statut;
    }

    public function setStatut($nouveauStatut){
    	$this->statut = $nouveauStatut;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }
}

?>