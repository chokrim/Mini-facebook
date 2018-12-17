<?php
class Connexion
{

    private $connexion;

    public function __construct()
    {

        $PARAM_hote = 'localhost';
        $PARAM_port = '3306';
        $PARAM_nom_bd = 'adminMiniFacebook';
        $PARAM_utilisateur = 'adminMiniFacebook';
        $PARAM_mot_passe = 'digital2018';

        try {
            $this->connexion = new PDO(
                'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd,
                $PARAM_utilisateur,
                $PARAM_mot_passe
            );
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br/>';
        }


    }
    public function getConnexion()
    {
        return $this->connexion;

    }

    public function insertHobby($hobby)
    {

        $wellDone = true;

        try {
            $requete_prepare = $this->connexion->prepare(
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

    public function insertMusique($style)
    {



        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO Musique (Type) values (:style)"
        );

        $requete_prepare->execute(
            array('style' => "$style")
        );
    }
    public function insertPersonne($nom, $prenom, $url_photo, $date_naissance, $status_couple)
    {


        $id = null;

        try {
            $requete_prepare = $this->connexion->prepare(
                "INSERT INTO Personne (Nom, Prenom,URL_Photo,Date_Naissance, Status_couple)
        VALUES (:nom,:prenom,:url_photo, :date_naissance,:status_couple )"
            );


            $requete_prepare->execute(
                array('nom' => $nom, 'prenom' => $prenom, 'url_photo' => $url_photo, 'date_naissance' => $date_naissance, 'status_couple' => $status_couple)
            );

            $id = $this->connexion->lastInsertId();
        } catch (Exception $e) {
            $id = null;
        }
        return $id;

    }

        //exercice8

    public function selectAllHobbies()
    {


        $requete_prepare = $this->connexion->prepare(
            "SELECT id, Type FROM Hobby"
        );
        $requete_prepare->execute();

        $resultat = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

        return $resultat;

    }



        //exercice9

    public function selectAllMusique()
    {



        $requete_prepare = $this->connexion->prepare(
            "SELECT id, Type FROM Musique"
        );
        $requete_prepare->execute();

        $resultat = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

        return $resultat;

    }
       //exercice 10
    public function selectPersonnes()
    {

        $requete_prepare = $this->connexion->prepare("SELECT * FROM Personne ");
        $requete_prepare->execute();
        $resultat = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

        return $resultat;



    }

    public function selectPersonneById($id)
    {


        $requete_prepare = $this->connexion->prepare(

            "SELECT * FROM Personne WHERE Id = :id"
        );

        $requete_prepare->execute(array("id" => $id));

        $resultat = $requete_prepare->fetch(PDO::FETCH_OBJ);


        return $resultat;

    }  

    //exercice 11

    public function selectPersonneByNomPrenomLike($pattern)
    {



        $requete_prepare = $this->connexion->prepare(

            "SELECT * FROM Personne WHERE nom like :nom OR Prenom like :prenom"
        );

        $requete_prepare->execute(array("nom" => "%$pattern%", "prenom" => "%$pattern%"));

        $resultat = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

        return $resultat;

    }

    // exercice 6 ( relation one to many)

    public function getPersonneHobby($personneId)
    {
        $requete_prepare = $this->connexion->prepare(
            "SELECT Type from Hobby h
            INNER JOIN RelationHobby rh ON rh.Hobby_Id = h.Id
            WHERE rh.Personne_Id= :id"
        );
        $requete_prepare->execute(array("id" => $personneId));
        $hobbies = $requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $hobbies;
    }

    public function getPersonneMusique($personneId)
    {
        $requete_prepare = $this->connexion->prepare(
            "SELECT Type from Musique m
            INNER JOIN RelationMusique rm ON rm.Musique_Id = m.Id
            WHERE rm.Personne_Id= :id"
        );
        $requete_prepare->execute(array("id" => $personneId));
        $musique = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

        return $musique;
    }
    public function getRelationPersonne($personneId)
    {
        $requete_prepare = $this->connexion->prepare(
            "SELECT Nom, Prenom,Type from RelationPersonne rp
            INNER JOIN Personne p ON rp.Relation_Id = p.Id
            WHERE rp.Personne_Id= :id"
        );
        $requete_prepare->execute(array("id" => $personneId));
        $personneId = $requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $personneId;
    }





    public function insertPersonneHobbies($personneId, $HobbyIds)
    {


        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO RelationHobby (Personne_Id,Hobby_Id)
            VALUES (:personne_id,:hobby_id)"
        );

        // executer la requete pour chaque hobbyId
        foreach ($HobbyIds as $hobbie) {

            $requete_prepare->execute(array("personne_id" => $personneId, "hobby_id" => $hobbie));


        }

    }

    public function insertPersonneMusique($personneId, $MusiquesIds)
    {


        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO RelationMusique (Personne_Id,Musique_Id)
            VALUES (:personne_id,:musique_id)"
        );

        // executer la requete pour chaque musiqueId
        foreach ($MusiquesIds as $musique) {

            $requete_prepare->execute(array("personne_id" => $personneId, "musique_id" => $musique));


        }

    }

    public function insertPersonneRelation($personneId, $RelationsIds, $Type)
    {


        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO RelationPersonne (Personne_Id,Relation_Id,Type)
            VALUES (:personne_id,:relation_id,:type)"
        );


        $requete_prepare->execute(array("personne_id" => $personneId, "relation_id" => $RelationsIds, "type" => $Type));



    }

















}
?> 