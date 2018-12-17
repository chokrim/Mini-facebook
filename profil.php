<?php 
require 'connexion2.php';
$apliBD = new Connexion;

$personne = $apliBD->selectPersonneById($_GET["id"]);

 
?>

<!Doctype <!DOCTYPE html>
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
    <form action="">
$recherches = $apliBD->selectPersonneByNomPrenomLike($_GET[""]);
    <input type="text" placeholder="Search.." name="search">
    <button type=‘submit‘>Q</button>
 </form>   
</div>
   

    <img class="imgprofil" src="https://image.flaticon.com/icons/png/512/26/26444.png" alt="">
    
   
  
<?php
'<h3><span class="prenom">' . $personne->Prenom . '</span><span class="prenom">' . $personne->Nom . '</span></h3>';
?>
    <div class="birth">29/10/1998</div>
    <div class="statut">Celibataire</div>

    <hr>
    <h1>Ce que Diane aime</h1>
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

        </div>
        <hr>
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