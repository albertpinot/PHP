<!-- Formulaire inscription 
<h1>Inscription</h1>

<form method="POST" action="#">
  <label for="name"> Pseudo </label>
  <input type="text" name="pseudo" id="pseudo">
  <br/>
  <label for="email"> email </label>
  <input type="email" name="email" id="email">
  <br/>
  <label for="password"> Mot de passe </label>
  <input type="password" name="mdp" id="mdp">
  <br/>
  <input type="submit" name="creer" value="Créer l'utilisateur">
</form>-->
<?php

include('autoload.php');//script autoload
include('connexion.php');// connexion a la bdd

$userManager = new UserManager($bdd);

  /*Création d'utilisateur
  if(isset($_POST['creer'])){
    /* Verification des champs saisie 
    if(!empty($_POST['email'])&& !empty($_POST['pseudo']) && !empty($_POST['mdp'])){
      $array_user = array(
        'email' => $_POST['email'],
        'pseudo' => $_POST['pseudo'],
        'mdp'=>md5($_POST['mdp']),
        'actif'=>1,
        'dateInscription'=>date('Y-m-d'),
        'admin'=>0
      );
      $user = new User($array_user);

      $userManager->add($user);
    }
    /* Gestion de l'erreur si les champs son vide 
    else{
    echo "<p style='color:red;'>Veuillez remplir tout les champs<p>";
  }
  }*/

  echo "<h1> Compte le nombre d'utilisateur dans la BDD </h1>";
  echo $userManager->nbUser(); // Compte le nombre d'utilisateur présent dans la bdd
  echo "<h1> Affichage utilisateur </h1>";
  echo $userManager->getList(); // Affichage de la liste des utilisateurs
?>
<!-- Formulaire Suppression
<h1>Suppression utilisateur</h1>

<form method="POST" action="">
  <label for="id">Entrez l'id de l'utilisateur à supprimer </label>
  <input type="number" name="id" id="id" autocomplete="off">
  <br/>
  <input type="submit" name="supprimer" value="supprimer l'utilisateur" >
</form> -->

<h1>Modification d'utilisateur</h1>

<form method="POST" action="#">
  <label for="id">Entrez l'id de l'utilisateur à modifier </label>
  <input type="number" name="id" id="id" autocomplete="off">
  <br/>
  <label for="pseudo"> Pseudo </label>
  <input type="text" name="pseudo" id="pseudo">
  <br/>
  <label for="email"> email </label>
  <input type="email" name="email" id="email">
  <br/>
  <label for="mdp"> Mot de passe </label>
  <input type="password" name="mdp" id="mdp">
  <br/>
  <label for="actif"> Compte activif </label>
  <input type="number" min="0" max="1" name="actif" id="actif">
  <br/>
  <label for="admin"> Compte admin </label>
  <input type="number" min="0" max="1" name="admin" id="admin">
  <br/>
  <input type="submit" name="modifier" value="Modifier l'utilisateur">
</form>

<?php
/* Suppression utilisateur */
if(isset($_POST['supprimer'])){
    if($_POST['id']){
      if(is_numeric($_POST['id'])){
       $array = array(
        'idUser' => $_POST['id']
      ); 
        $user = new User($array);
        $userManager->sup($user);
    }}
    else{
    echo "<p style='color:red;'>Veuillez remplir tout les champs<p>";
  }}

  /*Création d'utilisateur*/
  if(isset($_POST['modifier'])){
    /* Verification des champs saisie */
    if($_POST['id'] ){
      if(is_numeric($_POST['id'])){
          if ($_POST['pseudo'] && $_POST['email'] && $_POST['mdp'] && $_POST['actif'] && $_POST['admin']){
            if(is_numeric($_POST['admin']) && is_numeric($_POST['actif'])){
         $array_moddif = array(
        'idUser' => $_POST['id'],
        'email' => $_POST['email'],
        'pseudo' => $_POST['pseudo'],
        'mdp'=>md5($_POST['mdp']),
        'actif'=>$_POST['actif'],
        'admin'=>$_POST['admin']
      );    
      $user = new User($array_moddif);
      $userManager->edit($user);
    }}}}
    /* Gestion de l'erreur si les champs son vide */
    else{
    echo "<p style='color:red;'>Veuillez remplir tout les champs<p>";
  }
  }

/*$array = array(
'id' => '11',
'email' => 'juliencolmont59@gmail.com'
);

$user = new User($array);

echo '<pre>';
print_r($user);
echo '</pre>';*/

?>
