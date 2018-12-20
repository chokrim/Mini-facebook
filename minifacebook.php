<?php

require 'connexion2.php';



function inscription()
{
    $Nom = $_POST["nom"];

    $Prenom = $_POST["prenom"];

    $url_photo = $_POST["url_photo"];

    $date_naissance = $_POST["date_naissance"];

    $status_couple = $_POST["Status"];

    $hobbies = $_POST["hobbies"];

    $musiques = $_POST["musiques"];


    $message = $_POST["message"];

    $relationids=$_POST["personnes"];
    var_dump($_POST);

    echo $Nom . ' ' . $Prenom . ' ' . $url_photo . ' ' . $date_naissance . ' ' . $status_couple . ' ' . $message;
    foreach ($hobbies as $hobby) {
        echo $hobby . '<br/>';
    }

    $appliDB = new Connexion;
    $id = $appliDB->insertPersonne($Nom, $Prenom, $url_photo, $date_naissance, $status_couple);
    
    //hooby
    
    $appliDB->insertPersonneHobbies($id, $hobbies);

// //musiquec
//  var_dump($musiques);
   
    $appliDB->insertPersonneMusique($id, $musiques);


// //relation
// foreach($relationids as $relation){
//     $appliDB->insertPersonneRelation($id,$relation,);
// }
    

}


inscription();
?>
