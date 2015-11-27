<?php


include_once('modele/Modele.php');
include_once('modele/contact.php');


class controller {
     
    private $modele = NULL;
     
    public function __construct() {
        $this->modele = new Modele();
    }

    public function handleRequest() {
        $action = isset($_GET['action'])?$_GET['action']:NULL;
        try {
            if ( !$action || $action == 'list' ) {
                $this->getContacts();
            } elseif ( $action == 'new' ) {
                $this->saveContact();
            } elseif ( $action == 'form' ) {
                $this->getForm();
            } elseif ( $action == 'update' ) {
                $this->update();
            } elseif ( $action == 'delete' ) {
                $this->deleteContact();
            } elseif ( $action == 'show' ) {
                $this->get_contact();
            } else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function getContacts() {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $contacts = $this->modele->get_contacts();
		include_once('vue/vueAccueil.php');
    }  

    public function get_contact() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }    	
    	$contact = $this->modele->get_contact($id);
    	include_once('vue/vueUnContact.php');
    }  

	public function getForm(){
        // var_dump($_GET);
		if($_SERVER["REQUEST_METHOD"]==="POST"){
			return $this->saveContact();
		}
        $contact = new contact();
		include_once('vue/vueForm.php');
	}    

    public function saveContact() {  
        $contact = new contact();

        $title = 'Add new contact';

        $errors = array();

        $contact->setNom(isset($_POST['nom'])?      $_POST['nom']  :NULL);
        $contact->setPrenom(isset($_POST['prenom'])?   $_POST['prenom']  :NULL);
        $contact->setSociete(isset($_POST['societe'])?  $_POST['societe']  :NULL);
        $contact->setAdresse(isset($_POST['adresse'])?  $_POST['adresse']:NULL);
        $contact->setNum(isset($_POST['mobile'])?   $_POST['mobile'] :NULL);
        $contact->setEmail(isset($_POST['email'])?    $_POST['email'] :NULL);
        if(isset($_POST['email']) && $_POST['email']!==""){
            $err="";
            $email = $_POST['email'];
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $contact->setEmail($email);
            }else{
                $err="email";
                include_once('vue/vueForm.php');
                return;
            }
        }else {
            $contact->setEmail("");
        }
        $contact->setSite(isset($_POST['siteweb'])?  $_POST['siteweb'] :NULL);
        $contact->setStatut(isset($_POST['statut'])?   $_POST['statut'] :NULL);
        $contact->setDate(new DateTime());
        unset($_POST);

        try {
            $contact = $this->modele->create_contact($contact);
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
        $this->getContacts();
    }

    public function update() {  
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }   
        $contact = $this->modele->get_contact($id);  
        // var_dump($contact);      
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $contact->setNom($_POST['nom']);
            $contact->setPrenom($_POST['prenom']);
            $contact->setSociete($_POST['societe']);
            $contact->setAdresse($_POST['adresse']);
            $contact->setNum($_POST['mobile']);
            $contact->setEmail($_POST['email']);
            $contact->setSite($_POST['siteweb']);
            $contact->setStatut($_POST['statut']);
            $contact->setDate(new DateTime()); 
            return $this->updateContact($contact,$id);
            // $this->getContacts();
        } else
        include_once('vue/vueForm.php');
    }

    public function updateContact($contact,$id){     
        // $contact = $this->modele->get_contact($id);
        $this->modele->update($contact,$id);
        $this->getContacts();
    }

    public function deleteContact(){
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }       

        $contact = $this->modele->delete($id);
        $this->getContacts();
    }    


}

