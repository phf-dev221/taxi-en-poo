<?php
session_start();
include('database.php');
class Connexion{
    private $maile ;
    private $password;

    public function __construct($_maile, $_password){
        $this->setMaile($_maile);
        $this->setPassword($_password);
}

public function getMaile(){
        
    return $this->maile;
}
public function setMaile($maile){
    if(preg_match('/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/',$maile)){
    $this->maile = $maile;
    }else{
        echo('erreur: Email invalide');
    }
}

public function getPassword(){
    return $this->password;
}
public function setPassword($password){
    if (
        preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/", $password)
    ){
        $this->password = $password;
    } else {
        echo('Erreur : Mot de passe invalide');
    }
}

public function connexion($email, $motDePasse, $db){
    
    $requete = $db->prepare("SELECT * FROM utilisateurs WHERE mail = :email");
    $requete->execute(array(':email' => $email));
    $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);
   
    if ($utilisateur==true && $motDePasse===$utilisateur['motDePasse']) {

        $_SESSION['user'] =$utilisateur;
         header('Location: home.php');
        

    } else {
        echo ("Identifiants de connexion invalides");
    }
}

}

if($_SERVER['REQUEST_METHOD']=='POST'){
    // if(isset($_POST['connect'])){
       
   $maile = $_POST['maile'];
   $password = ($_POST['motdePasse']);

$user = new Connexion($maile, $password);

$user->connexion($maile,$password,$database);


   //}
}

?>