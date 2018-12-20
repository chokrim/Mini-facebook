<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">

    <?php
    require('connexion2.php');

    $appliDB = new Connexion();
   

    ?>
    <title>Minifacebook : inscription</title>
</head>

<body>
    <h1>Si tu veux nous rejoindre
    </h1>
    <h2>Créer un compte (en plus c'est gratis!)
    </h2>

    <form action="minifacebook.php" method="post">
        
        <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" /> <br/>
                
            <br>

            <label for="prenom">Prenom:</label>

            <input type="text" name="prenom" id="prenom"/> <br/>
            
            <br>

            <label for="message">Parle nous de toi :</label>

            <textarea name="message" id="message" rows="5" ></textarea> <br/>

            <br>
            <br>
            <br>

           <label><input type="radio" name="gender" value="male" checked> Homme</label>
           <label><input type="radio" name="gender" value="female"> Femme</label>

            <h3>Date de naissance</h3>
            <input name="date_naissance"  type="date">


            <h3>Situation sentimentale</h3>
                <input type="radio" name="Status" value="Mariée"required="required"> Mariée</label>
                <input type="radio" name="Status" value="Celib"required="required"> Celib</label>
                <input type="radio" name="Status" value="Fiancé"required="required"> Fiancé</label>
                <input type="radio" name="Status" value="Veuf/veuve"required="required"> veuf/veuve</label>
            </div>
            <hr>

            <h3>Centre d'interet</h3>


            <h4>Hobbies</h4>
            <div>
                <?php
                $result = $appliDB->selectAllHobbies();
                foreach ($result as $hobby) {
                    echo '<label><input type="checkbox" name="hobbies[]" value="'. $hobby->id .'">' . $hobby->Type . '</label>';
                }
                ?>
            </div>



            <h4>Musique</h4>




            <div>
                <?php
                $result = $appliDB->selectAllMusique();
                foreach ($result as $musique) {
                    echo '<label><input type="checkbox" name="musiques[]" value="' . $musique->id . '">' . $musique->Type . '</label>';
                }
                ?>
            </div>
 

            <hr>

            <h3> A quoi ressembles-tu?</h3>
            <input class="telecharge" type="url" name="url_photo">

            <hr>    

            <h3>Tu les connais?</h3>
            <div>


                <?php
                $friends = $appliDB->selectPersonnes();
            
                // $friends = $appliDB->getRelationPersonneAll($personnes);
                 
                foreach ($friends as $friend) {
                    echo '<table width=45% id="table" >';
                    echo '<td><img src="'.$friend->URL_Photo.'" width=20% height=100em><input type="checkbox" name="personnes[]" value="' . $friend->ID . '">' . $friend->Nom . " ".$friend->Prenom.'</input></td>';
                    echo '<td align=right>';
                    echo "<select id=box name='$friend->ID'>";
                    echo '<option label="famille" value="famille">famille</option>';
                    echo '<option label="amis" value="amis">amis</option>';
                    echo '<option label="collegue" value="collegue">collegue</option>';
                    echo '<option label="inconnu" value="inconnu">inconnu</option>';
                    echo '<option label="marié" value="marié">marié</option>';
                    echo '</select>';
                    echo '</td>';
                    echo '</table>';
                }   
                ?>
            </div>


           
                <!-- <tr>
                    <td class="connaissance"></td> <input type="radio" name="resau" value="famille"required="required"> Famille
                    <td class="connaissance"></td> <input type="radio" name="resau" value="amis"required="required"> Amis
                    <td class="connaissance"></td> <input type="radio" name="resau" value="collegues"required="required"> Collegues
                    <td class="connaissance"></td> <input type="radio" name="resau" value="inconnu"required="required"> Inconnu -->

                    <!-- <img  src="images/mfstephane.jpg" class="imgInscription" />
                     <a href="profil.html" type="submit" class="face" value="">Stephan Dimario</a> -->

                     <br>
                     <br>
                     <br>

                      <input type="submit" name="envoyer" value="Envoyer"/>
                </tr>
            </table>




            <a href="profil.html" >

                    <div class="button">
                        <p>
                            Rejoins nous!
                        </p>
                    </div>
                </a>


    </form>



</body>

</html>