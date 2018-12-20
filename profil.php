<?php 
require 'connexion2.php';
$appliDB = new Connexion;


    $personne = $appliDB->selectPersonneById($_GET["id"]);
    $musiques = $appliDB-> getPersonneMusique($_GET["id"]);
    $hobbys = $appliDB -> getPersonneHobby($_GET ["id"]);
    $reseau = $appliDB -> getRelationPersonne($_GET ["id"]);
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
    <br>

   <?php
   echo '<img class="imgprofil" src="' . $personne->URL_Photo . '" alt="photo profil">

      <span class="prenom">' . $personne->Date_Naissance . '</span>

      <span class="Status">' . $personne->Status_couple . '</span>';?>

<h3>
 <?php
echo '<span class="prenom">' . $personne->Prenom . '</span>          <span class="prenom">' . $personne->Nom . '</span>';
?>


<?php
echo '<span class="prenom">' . $personne->Prenom . '</span>';      
?>


 </h3>
 
        
    <hr>
    <h1>J'aime ecouter</h1>
    <h2>Musique:</h2>

<div id="mus1">
<?php

   echo  "<ul>";
   foreach ($musiques as $value){
         echo "<li>".$value->Type."</li>";
   }
   echo '</ul>';

 ?>

</div>


   <hr>
   <h1>J'aime faire et aller</h1>
    <h2>Hobbies:</h2>



    <div id="Hobbies">

 <?php

     echo '<ul>';
     foreach ( $hobbys as $value){
            echo "<li>".$value->Type."</li>";

    }
    echo '</ul>' ;

 ?>   
            

    </div> 
    <hr>
        <h1>Je connais</h1>
        <h2>Reseaux:</h2>

        <div id="Reseau">

<?php
    echo '<ul>';
    foreach ( $reseau as $value){
        echo '<a href="profil.php?id="'.$value->ID.'">';
        echo '<img src="'.$value->URL_Photo.'" width=20% height=100em>';
        echo '<p>'.$value->Prenom." ".$value->Nom.'<br></p>';
        echo '</a>';

   }
  

?>   
           

   </div> 


  
        <!-- <table>
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
        </table> -->
</body>
</html>