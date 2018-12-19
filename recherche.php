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
      
    


     
     <div class="Rprofile" >
         <table border width =40% id=table>

          <?php foreach ($personnes as $value) {
                echo '<tr>';
                echo '<td>';
                echo '<img class="imgprofil2" src="' . $value->URL_Photo . '">';
                echo '</td>';
                echo '<td>';
                echo '<a href="profil.php?id=' . $value->ID . '">';
                echo '<p>' . $value->Prenom . " " . $value->Nom . '</p>';
                echo '</td>';
                echo '</tr>';
                echo '</a>';

            }
            ?>
                     </table>;
        </div> 

            
           <!-- <img src=" images/photographie-de-classe-emoji-font-face-90342627.jpg" class="imgamis4" />
           
             <table>
            <tr>
                <td class="imgrecherche"> <img url="http://roxanaconstantinescu.com/roxana/wp-content/uploads/2015/10/roxana-constantinescu-about2.jpg" class="imgrecherhce" /></td>
                <td class="imgrecherhce"><img url="http://s1.lprs1.fr/images/2016/11/03/6289494_maurice-1_940x500.jpg" class="imgrecherche" /></td>
                <td class="imgrecherche"> <img url="https://i.pinimg.com/originals/17/f3/91/17f391acc4da5ac0c3ff309d64b25db2.png" class="imgrecherche" /></td>
                <td class="imgrecherche"> <img url="http://consultationformaction.com/wp-content/uploads/2014/06/Diane-officielle-proche.jpg" class="imgrecherche" /></td>
                <td class="imgrecherche"><img  url ="http://consultationformaction.com/wp-content/uploads/2014/06/Diane-officielle-proche.jpg" class="recherche" /></td>
                <td class="imgrecherche"> <img url="https://images-na.ssl-images-amazon.com/images/I/71mVvVq3HpL._UX250_.jpg" class="imgrecherche" /></td>
                <td class="imgrecherche"> <img url="https://voi.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Fprismamedia_people.2F2017.2F06.2F30.2Fc87435ce-6530-4440-bab5-a70a0827ac4d.2Ejpeg/380x380/quality/80/adil-rami.jpg" class="imgrecherche" /></td>
                <td class="imgrecherche"> <img url="https://www.nawak.com/data/95892/img/b1_img_3049.jpg" class="imgrecherhce" /></td>
            </tr>
            <tr>
                <td> <a href="#" type="submit" class="faceProfil" value="">Maurice Robert </a></td>
                <td><a href="#" type="submit" class="faceProfil" value="">Alice Porter </a></td>
                <td><a href="#" type="submit" class="faceProfil" value="">Stephan Dimario </a></td>
                <td><a href="#" type="submit" class="faceProfil" value="">Maurice Robert</a></td>
                <td><a href="#" type="submit" class="faceProfil" value="">Alice Porter</a></td>
                <td><a href="#" type="submit" class="faceProfil" value="">Stephan Dimario</a></td>
            </tr>
        </table> -->
            
</body>
</html>