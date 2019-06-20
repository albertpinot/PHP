<?php

class UserManager{
  private $bd;

  public function __construct($bd){
    $this->setBd($bd);
  }
  public function setBd($bd){
    $this->bd = $bd;
  }
  public function getBd(){
    return $this->bd;
  }
  /* Add User */
  public function add(User $user){
    $req = $this->getBd()->prepare("INSERT INTO User (email,pseudo,mdp,actif,date_inscription,admin)" ."VALUES (:email,:pseudo,:mdp,:actif,:dateInscription,:admin);");
    $req->bindValue(':email', $user->getEmail());
    $req->bindValue(':pseudo', $user->getPseudo());
    $req->bindValue(':mdp', $user->getMdp());
    $req->bindValue(':actif', $user->getActif());
    $req->bindValue(':dateInscription', $user->getDateInscription());
    $req->bindValue(':admin', $user->getAdmin());
    $req->execute();

    $user->hydrate([
      'id' => $this->getBd()->lastInsertId()
    ]);
  }

  /* Modification User */
  public function edit(User $user){
    $req = $this->getBd()->prepare("UPDATE User SET pseudo=:pseudo email=:email mdp=:mdp actif=:actif admin=:admin WHERE id=:idUser ");
    $req->bindValue(':idUser', $user->getIdUser());
    $req->bindValue(':email', $user->setEmail(':email'));
    $req->bindValue(':pseudo', $user->getPseudo());
    $req->bindValue(':mdp', $user->getMdp());
    $req->bindValue(':actif', $user->getActif());
    $req->bindValue(':admin', $user->getAdmin());
    $req->execute();

  }

  /* Suppresion User */
  public function sup(User $user){
    $req = $this->getBd()->prepare("DELETE FROM User WHERE id = :idUser;");
    $req->bindValue(':idUser', $user->getIdUser());
    $req->execute();
  }

  /* Compte le nombre d'utilisateur dans la bdd */
  public function nbUser(){
     $req = $this->getBd()->query("SELECT COUNT(id) AS nbUser FROM User;");
     $nbUser = $req->fetch();
     $req->closeCursor();
     echo '<p>On compte '.$nbUser['nbUser'].' utilisateur(s)</p>';
  }

  /* Affichage de la liste des users */
  public function getList(){
     $req = $this->getBd()->query("SELECT pseudo FROM User;");
     $text="<table border='1' style='text-align:center;' ><tr>
        <th> pseudo </th>
      </tr>";
      while ($donnees = $req->fetch() ) {
       $text.= '<tr><td>'.$donnees['pseudo'].'</td>';
      }
      $text.='</table>';
        echo $text;    
  }

  /* Affichage des infos des users */
  public function getInfo(User $user){

  }

  /* Vérification de l'existence user en BD */
  public function exist(User $user){
    
  }
}

/* A FAIRE POUR LA SEMAINE PRO !!!!!!!!!!!!!!!*/
/*
 edit
 delete 
 ---------------------
 count()// nb user
 getlist() // liste user
 getInfo(User)// Info user
 exist(User) //Vérifier l'existence user en BD ajouter dans le add si possible


*/