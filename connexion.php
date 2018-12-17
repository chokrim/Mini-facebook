 <?php

function connexionBD()
{
    $PARAM_hote = 'localhost';
    $PARAM_port = '3306';
    $PARAM_nom_bd = 'adminMiniFacebook';
    $PARAM_utilisateur = 'adminMiniFacebook';
    $PARAM_mot_passe = 'digital2018';

    try {
        $connexion = new PDO(
            'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd,
            $PARAM_utilisateur,
            $PARAM_mot_passe
        );
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
    }

    return $connexion;
}

function insertHobby($hobby)
{

    $connexion = connexionBD();
    $wellDone = true;

    try {
        $requete_prepare = $connexion->prepare(
            "INSERT INTO Hobby (Type) values (:hobby)"
        );

        $requete_prepare->execute(
            array('hobby' => "$hobby")
        );
    } catch (Exception $e) {
        $wellDone = false;
    }

    return $wellDone;
}

function insertMusique($style)
{

    $connexion = connexionBD();

    $requete_prepare = $connexion->prepare(
        "INSERT INTO Musique (Type) values (:style)"
    );

    $requete_prepare->execute(
        array('style' => "$style")
    );
}
function insertPersonne($nom, $prenom, $url_photo, $date_naissance, $status_couple)
{

    $connexion = connexionBD();
    $wellDone = true;

    try {
        $requete_prepare = $connexion->prepare(
            "INSERT INTO Personne (Nom, Prenom,URL_Photo,Date_Naissance, Status_couple)
        VALUES (:nom,:prenom,:url_photo, :date_naissance,:status_couple )"
        );


        $requete_prepare->execute(
            array('nom' => $nom, 'prenom' => $prenom, 'url_photo' => $url_photo, 'date_naissance' => $date_naissance, 'status_couple' => $status_couple)
        );
    } catch (Exception $e) {
        $wellDone = false;
    }
    return $wellDone;

}

        //exercice8

function selectAllHobbies()
{

    $connexion = connexionBD();

    $requete_prepare = $connexion->prepare(
        "SELECT * FROM Hobby"
    );
    $requete_prepare->execute();

    $resultat = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

    return $resultat;

}



        //exercice9

function selectAllMusique()
{

    $connexion = connexionBD();

    $requete_prepare = $connexion->prepare(
        "SELECT id, Type FROM Musique"
    );
    $requete_prepare->execute();

    $resultat = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

    return $resultat;

}
       //exercice 10


function selectPersonneById($id)
{

    $connexion = connexionBD();

    $requete_prepare = $connexion->prepare(

        "SELECT * FROM Personne WHERE Id = :id"
    );

    $requete_prepare->execute(array("id" => $id));

    $resultat = $requete_prepare->fetch(PDO::FETCH_OBJ);


    return $resultat;

}  

    //exercice 11

function selectPersonneByNomPrenomLike($pattern)
{

    $connexion = connexionBD();

    $requete_prepare = $connexion->prepare(

        "SELECT * FROM Personne WHERE nom like :nom OR Prenom like :prenom"
    );

    $requete_prepare->execute(array("nom" => "%$pattern%", "prenom" => "%$pattern%"));

    $resultat = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

    return $resultat;

}

    // exercice 6 ( relation one to many)

function getPersonneHobby($personneId)
{



    $requete_prepare = $this->connexion->prepare(

        "SELECT h.Type from Hobby h

        INNER JOIN RelationHobby rh ON rh.Hobby_Id = h.Id

        WHERE rh.Personne_Id= :id"
    );

    $requete_prepare->execute(array("id" => $personneId));

    $hobbies = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

    return $hobbies;








}
?> 