<?php
include "connexion_sql.php";
include "contact.php";

// function get_contacts($offset, $limit){
//     global $bdd;
//     $offset = (int) $offset;
//     $limit = (int) $limit;

//     $req = $bdd->prepare('SELECT * 
//     	AS d
//     	FROM contacts 
//     	ORDER BY date_creation 
//     	DESC LIMIT :offset, :limit');

//     $req->bindParam(':offset', $offset, PDO::PARAM_INT);
//     $req->bindParam(':limit', $limit, PDO::PARAM_INT);

//     $req->execute();
//     $contacts = $req->fetchAll();
//     return $contacts;
// }
class Modele {

    public function __construct(){
        $this->modele = new connexion_sql();
    }

    function get_contacts(){
        $bdd = $this->modele->openDb();
        $reponse = $bdd->query('SELECT * FROM contacts');
    	$contacts = $reponse->fetchAll();
        $this->modele->closeDb();        
        return $contacts;
    }

    function get_contact($idContact){
        $bdd = $this->modele->openDb();
        // $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING); 
        $reponse = $bdd->prepare('SELECT * FROM contacts WHERE id = ?');
       	$reponse->execute(array($idContact));
        $c = $reponse->fetch();
        $contact = new contact($c['id'],$c['nom'],$c['prenom'],$c['societe'],$c['adresse'],$c['numero'],$c['email'],$c['site'],$c['statut']);
        $this->modele->closeDb(); 
        return $contact;    
    }

    function create_contact($contact){
        $bdd = $this->modele->openDb();        
        
        $dbName = ($contact->getNom() != NULL)?"'".$contact->getNom()."'":'';
        $dbFirstName = ($contact->getPrenom() != NULL)?"'".$contact->getPrenom()."'":'';
        $dbSociety = ($contact->getSociete() != NULL)?"'".$contact->getSociete()."'":'';
        $dbAddress = ($contact->getAdresse() != NULL)?"'".$contact->getAdresse()."'":'';
        $dbPhone = ($contact->getNum() != NULL)?"'".$contact->getNum()."'":'';
        $dbEmail = ($contact->getEmail() != NULL)?"'".$contact->getEmail()."'":'';
        $dbWebSite = ($contact->getSite() != NULL)?"'".$contact->getSite()."'":'';
        $dbState = ($contact->getStatut() != NULL)?"'".$contact->getStatut()."'":'';        

        $req = $bdd->prepare('INSERT INTO contacts(nom,prenom,societe,adresse,numero,email,site,statut) VALUES(:nom,:prenom,:societe,:adresse,:numero,:email,:site,:statut) ');
        $req->execute(array(
            'nom' => $dbName,
            'prenom' => $dbFirstName,
            'societe' => $dbSociety,
            'adresse' => $dbAddress,
            'numero' => $dbPhone,
            'email' => $dbEmail,
            'site' => $dbWebSite,
            'statut' => $dbState
            ));
        $contact->setId($bdd->lastInsertId());
        return $contact;

    }

    function update($c,$id){
        $bdd = $this->modele->openDb();        
        try {
            $stmt = $bdd->prepare("UPDATE contacts SET nom = :nom ,prenom = :prenom ,societe = :societe , adresse = :adresse, numero = :num, email = :email, site = :site, statut = :statut WHERE id= :id");
            $stmt->execute(array(
            "nom" => $c->getNom(),
            "prenom" => $c->getPrenom(),
            "societe" => $c->getSociete(),
            "adresse" => $c->getAdresse(),
            "num" => $c->getNum(),
            "email" => $c->getEmail(),
            "site" => $c->getSite(),
            "statut" => $c->getStatut(),
            "id" => $id
            )); 
            }catch(exception $e){
                throw $e;
            }     

    }

    function delete($id){
        $bdd = $this->modele->openDb();  
        $req = $bdd->prepare("DELETE FROM contacts WHERE id=:id"); 
        $req->execute(array('id'=>$id)); 
        // return $this->get_contacts();
    }
    
    function findById($id){
        $bdd = $this->modele->openDb();  
        $req = $bdd->prepare("SELECT * FROM contacts WHERE id=:id"); 
        $req->execute(array('id'=>$id)); 
        $result = $req->fetch();
        $contact = new contact($result['id'],$result['nom'],$result['prenom'],$result['societe'],$result['adresse'],$result['numero'],$result['email'],$result['site'],$result['statut']);
        return $contact;
    }
}