<?php

require 'connexion2.php';



function inscription()
{
    $nom = $_POST["nom"];

    $prenom = $_POST["prenom"];

    $url_photo = $_POST["url_photok"];

    $date_naissance = $_POST["date_naissance"];

    $status_couple = $_POST["Status"];

    $hobbys = $_POST["hobbies"];

    $music = $_POST["musiques"];

    $message = $_POST["message"];


    echo $nom . ' ' . $prenom . ' ' . $url_photo . ' ' . $date_naissance . ' ' . $status_couple . ' ' . $message;
    foreach ($hobbys as $hobby){
        echo $hobby.'<br/>';
    }

    $appliDB = new Connexion;
    $idPersonne = $appliDB->insertPersonne($nom, $prenom, $url_photo, $date_naissance, $status_couple);

// hooby
    $hobbyIds = $_POST["hobbies"];

}



inscription();
?>