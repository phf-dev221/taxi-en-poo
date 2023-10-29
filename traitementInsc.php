<?php
include('database.php');

class Utilisateurs {
    
    private $prenom ;
    private $nom  ;
    private $tel  ;
    private $mail  ;
    private $mot_passe  ;
    private $dat  ;
    private $errors = array();

    // protected $connect;
    public function __construct($_prenom,$_nom,$_tel,$_mail,$_mot_passe,$_dat){
        $this->setPrenom($_prenom);
        $this->setNom($_nom);
        $this->setTel($_tel);
        $this->setMail($_mail);
        $this->setMot_passe($_mot_passe);
        $this->setDat($_dat);
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenom){
        if(preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ '-]+$/",$prenom)){
        $this->prenom = $prenom;
        }else{
          $this->errors[]= 'Le prenom est invalide';
        }
    }

    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        if(preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ'-]+$/",$nom)){
        $this->nom = $nom;
        }else{
             $this->errors[]='Le nom est invalide';
        }
    }

    public function geTel(){
       return $this->tel;
    }
    public function setTel($tel){
        if (preg_match("/^7[0-9]{8}$/", $tel)){
            $this->tel = $tel;
        } else {
             $this->errors[]='Le telephone est invalide';
        }
    }
    

    public function getMail(){
        
        return $this->mail;
    }
    public function setMail($mail){
        if(preg_match('/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/',$mail)){
        $this->mail = $mail;
        }else{
             $this->errors[] = 'Le mail est invalide';
        }
    }

    public function getMot_passe(){
        return $this->mot_passe;
    }
    public function setMot_passe($mot_passe){
        if (
            preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/", $mot_passe)
        ){
            $this->mot_passe = $mot_passe;
        } else {
             $this->errors[]='Le mot de passe est invalide';
        }
    }
    

    public function getDat(){
        return $this->dat;
    }
    public function setDat($dat){
        $this->dat = $dat;
    }

    
//ajout de inscription()
    public function inscription(Utilisateurs $utilisateur, $db) {
        if (!empty($this->errors)) {
            foreach($this->errors as $error){
                echo '<pre>'.$error.'</pre>';
            }
            echo 'Veuillez <a href="inscription.php">RESSAYER</a>';
            die();
        }
        $requete = $db->prepare("INSERT INTO utilisateurs(prenom, nom, telephone, mail, motDePasse, dateInscription) VALUES(:prenom, :nom, :tel, :mail, :mot_passe, :dateInscription)");
        $requete->execute(
            array(
                ':prenom' => $utilisateur->prenom,
                ':nom' => $utilisateur->nom,
                ':tel' => $utilisateur->tel,
                ':mail' => $utilisateur->mail,
                ':mot_passe' => $utilisateur->mot_passe,
                ':dateInscription' => $utilisateur->dat
            )
        );
        echo 'insc oki';
    }

    
 
}


if($_SERVER['REQUEST_METHOD']=='POST'){

$prenom =  $_POST['prenom'];
$nom = $_POST['nom'];
$tel = $_POST['telephone'];
$mail = $_POST['mail'];
$mot_passe = ($_POST['motDePasse']);
$dat = date('Y-m-d');



$user = new Utilisateurs($prenom,$nom,$tel,$mail,$mot_passe,$dat);
$user->inscription($user,$database);

}

?>