<h1>Recherche d'un restaurant</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">
<?php
   switch ($critere){
        case "defaut" :
            echo "Veuillez choisir un critère de recherche dans le menu de gauche";
            break;
      case "nom":
         echo "Recherche par nom : </br>";
         echo "<input type='text' id='nomR' name='nomR' placeholder='Nom' required></br>";
         break;
      case "adresse":
         echo "Recherche par adresse : </br>";
         echo "<input type='text' id='villeR' name='villeR' placeholder='Ville'></br>";
         echo "<input type='text' id='cpR' name='cpR' placeholder='Code Postale'></br>";
         echo "<input type='text' id='voieAdrR' name='voieAdrR' placeholder='Rue'></br>";
         break;
      case "type":
         echo "Recherche par type de cuisine : </br>";
         foreach ($typesCuisine as $type) {
            echo "<input type='checkbox' name='typesCuisine[]' value='$type->idTC'>$type->libelleTC<br>";
        }
         break;
   }
?>
<?php if($critere != "defaut")
   echo "<input type='submit' value='Rechercher' />"
?>
</form>