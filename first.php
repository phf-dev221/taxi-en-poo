<?php

include('database.php');
include('traitementInsc.php');
// include('connexion.php');

// if($_SERVER['REQUEST_METHOD']=='POST'){
//      if(isset($_POST['connect'])){
        
//     $maile = $_POST['maile'];
//     $password = ($_POST['motdePasse']);

// $user = new Connexion($maile, $password);

// $user->connexion($maile,$password,$database);


//     }
// }

//------------------------------------

// if($_SERVER['REQUEST_METHOD']=='POST'){
//     // if(isset($_POST['insc'])){
// $prenom =  $_POST['prenom'];
// $nom = $_POST['nom'];
// $tel = $_POST['telephone'];
// $mail = $_POST['mail'];
// $mot_passe = ($_POST['motDePasse']);
// $dat = date('Y-m-d');

// try{
// $user = new Utilisateurs($prenom,$nom,$tel,$mail,$mot_passe,$dat);
// $user->inscription($user,$database);
// }
// catch (InvalidArgumentException $e){
//     echo "Erreur lors de la création de l'utilisateur : " . $e->getMessage();
// }
// //}
// }


?>