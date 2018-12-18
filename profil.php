<?php 
require 'connexion2.php';
$appliDB = new Connexion;


    $personne = $appliDB->selectPersonneById($_GET["id"]);
    $musiques = $appliDB-> getPersonneMusique($_GET["id"]);
    ?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />              
    <title>page Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="main.js"></script>

</head>

<body>
<div>
    <form action="recherche.php">

    <input type="text" placeholder="Search.." name="search">
    <button type=‘submit‘>Q</button>
 </form>   
</div>
    

   <?php
   echo '<img class="imgprofil" src="' . $personne->URL_Photo . '" alt="photo profil">

      <span class="prenom">' . $personne->Date_Naissance . '</span>

      <span class="Status">' . $personne->Status_couple . '</span>

      <span class="musique">' . $personne->Musique . '</span>';?> 
<h3>
 <?php
echo '<span class="prenom">' . $personne->Prenom . '</span>          <span class="prenom">' . $personne->Nom . '</span>';
?>
 </h3>
 
                
    
<!-- 
    <hr>
    <h1>Ce qu'aime</h1>
    <h2>Musique:</h2>

    <div id="mus1">
        <ul>
            <li>Rap</li>
            <li>Reggae</li>
            <li>Pop</li>
        </ul>
    </div>
    <div id="mus2">
        <ul>
            <li>Electro</li>
            <li>RndB</li>
            <li>Country</li>
        </ul>
    </div>


    <h2>Hobbies:</h2>

    <div id="Hobbies">
        <ul>
            <li>equitation</li>
            <li>escalade</li>
            <li>photographie</li>
        </ul>
    </div>
        <div id="hobbies2">
            <ul>
                <li>randoné</li>
                <li>Dessin</li>
                <li>Velo</li>
            </ul>

        </div> -->
        
        <h2>Reseaux:</h2>
        <table>
            <tr>
                <td class="tdprofile"> <img src="images/mfpapa.jpg" class="imgprofil1" /></td>
                <td class="tdprofile"><img src="images/mfAmiee.jpeg" class="imgprofil1" /></td>
                <td class="tdprofile"> <img src="images/mfstephane.jpg" class="imgprofil1" /></td>
                <td class="tdprofile"> <img src="images/mfpapa.jpg" class="imgprofil1" /></td>
                <td class="tdprofile"><img src="images/mfAmiee.jpeg" class="imgprofil1" /></td>
                <td class="tdprofile"> <img src="images/mfstephane.jpg" class="imgprofil1" /></td>

            </tr>
            <tr>
                <td> <a href="#" type="submit" class="faceProfil" value="">Maurice Robert (Famille)</a></td>
                <td><a href="#" type="submit" class="faceProfil" value="">Alice Porter (Amie)</a></td>
                <td><a href="#" type="submit" class="faceProfil" value="">Stephan Dimario (Collegue)</a></td>
                <td><a href="#" type="submit" class="faceProfil" value="">Maurice Robert (Famille)</a></td>
                <td><a href="#" type="submit" class="faceProfil" value="">Alice Porter (Amie)</a></td>
                <td><a href="#" type="submit" class="faceProfil" value="">Stephan Dimario (Collegue)</a></td>
            </tr>
        </table>
</body>
</html>