<?php
require 'connexion2.php';
$apliBD = new Connexion;

$personnes=$apliBD->selectPersonnes();

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
        <input class="Search" type="text" name="page de recherches" placeholder="blop">
        <input type="submit" value="Search">
    </form>
      
    

    <table> 
        <tr>
            <?php
            foreach($personnes as $personne){
                echo'<td class="Rprofile" > <img src="images/mfr1.jpeg" class="imgprofil2" />
                    <a href="profil.php?id='.$personne->ID.'" type="submit" class="face" value="">'.$personne->Prenom.'</a></td>';
                
            }
            ?>
            
            <img src=" images/photographie-de-classe-emoji-font-face-90342627.jpg" class="imgamis4" />
        </tr>   
               
                
            
</body>
</html>