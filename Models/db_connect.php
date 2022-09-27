<?php
// try{
//     $bdd = new PDO("mysql:host=localhost;dbname=tweeter","root","root");
// }catch(Exception $e){
// die("Error: ! ".$e->getMessage());
// }

    // $user = "root"; // a modif
     $pass = "root"; // a modif
    // $db = new PDO("mysql:host=localhost;dbname=tweeter", $user, $pass);
    // Où ajouter votre connexion à la base de données ici.

    $user = "root"; // a modif
    //$pass = ""; // a modif
    $db = new PDO("mysql:host=localhost;dbname=tweeter", $user, $pass);
