<?php
require 'connexion2.php';
$appliDB = new Connexion;

$personnes = $appliDB->selectPersonnes();
$pattern = "";
if (isset($_GET["pageDeRecherches"])) {
    $pattern = $_GET["pageDeRecherches"];
}
$personnes = $appliDB->selectPersonneByNomPrenomLike($pattern)

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>recherche</title>
    
</head>
<body>

   
    <h1>AUGMENTE TON RÉSEAU PARMIS MA LISTE DE PROFIL</h1>
    <a href="inscription.php" >

        <div class="button">
            <p>
                Créer un profil
            </p>
        </div>
    </a>
    <form>
        <input class="Search" type="text" name="pageDeRecherches" placeholder="blop">
        <input type="submit" value="Search">
    </form>
      
    

    <table> 
        <tr>
            <?php
            foreach ($personnes as $value) {
                echo '<a href="profil.php?id=' . $value->ID . '">';
                echo '<td class="Rprofile" ></td>';
                echo '<img class="imgprofil2" src="' . $value->URL_Photo . '">';
                echo '<td class="face">' . $value->Prenom . " " . '</td>';
                echo '<td class="face">' . " " . $value->Nom . '</td>';
                echo '</a>';
            }
            ?>
        </tr> 

            
            <img src=" images/photographie-de-classe-emoji-font-face-90342627.jpg" class="imgamis4" />
           
               
                
            
</body>
</html>