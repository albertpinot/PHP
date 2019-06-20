<?php
class User{
    /* Donnée lors de l'inscription */
    private $idUser;
    private $email;
    private $pseudo;
    private $mdp;
    private $admin;
    private $dateInscription;
    private $actif;
    
    public function __construct(array $donnees){
              $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){
            foreach($donnees as $key => $value){
                $method ='set'.ucfirst($key);
                if (method_exists($this,$method)){
                    $this->$method($value);
                }
            }
    }

    /* Asseceurs=getteurs mutateurs=setteurs */
    public function getIdUser(){
        return $this->idUser;
    }
    public function setIdUser($id){
        $this->idUser=$id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($adresse){
        $this->email = $adresse;
    }
    public function getPseudo(){
        return $this-> pseudo;
    }
    public function setPseudo($name){
        $this->pseudo = $name;
    }
    public function getMdp(){
        return $this-> mdp;
    }
    public function setMdp($password){
        $this->mdp = $password;
    }
    public function getAdmin(){
        return $this-> admin;
    }
    public function setAdmin($administrateur){
        $this->admin = $administrateur;
    }
    public function getDateInscription(){
        return $this-> dateInscription;
    }
    public function setDateInscription($dateInsrciption){
        $this->dateInscription = $dateInsrciption;
    }
    public function getActif(){
        return $this-> actif;
    }
    public function setActif($activite){
        $this->actif = $activite;
    }

}
?>
