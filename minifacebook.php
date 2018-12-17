<?php

require 'connexion2.php';



function inscription()
{
    $Nom = $_POST["nom"];

    $Prenom = $_POST["prenom"];

    $url_photo = $_POST["url_photo"];

    $date_naissance = $_POST["date_naissance"];

    $status_couple = $_POST["Status"];

    $hobbie = $_POST["hobbies"];

    $musique = $_POST["musiques"];

    $message = $_POST["message"];


    echo $Nom . ' ' . $Prenom . ' ' . $url_photo . ' ' . $date_naissance . ' ' . $status_couple . ' ' . $message;
    foreach ($hobbie as $hobby) {
        echo $hobby . '<br/>';
    }

    $appliDB = new Connexion;
    $id = $appliDB->insertPersonne($Nom, $Prenom, $url_photo, $date_naissance, $status_couple);

// // hooby
     //$apliDB= new connexion;
      //$appliDB->insertPersonneHobbies($hobbie);

// //musique
//     $appliDB= new connexion;
//     $appliDB->insertPersonneMusique();


// //relation
// $appliDB= new connexion;
// $appliDB->insertPersonneRelation(18,2);
}



inscription();
?>
