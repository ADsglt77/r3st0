<?php 
include_once "$racine/modele/bd.utilisateur.php";
include_once "$racine/modele/bd.pdo.php";
include_once "$racine/modele/bd.authentification.php";
$titre = "Connexion";

     // creation du menu burger
     $menuBurger = array();
     $menuBurger[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
     $menuBurger[] = Array("url"=>"./?action=inscription","label"=>"Inscription");
      
     // recuperation des donnees GET, POST, et SESSION
      
     // traitement si necessaire des donnees recuperees
     if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])){
          include "$racine/vue/entete.html.php";
          include "$racine/vue/vueAuthentification.php";
          include "$racine/vue/pied.html.php";
         $titre = "Authentification";
      
     }
     else
     {
         // Appel de la fonction login()
          $mail = $_POST["mailU"];
          $mdp = $_POST["mdpU"];
          $login_resultat = login($mail, $mdp);
      
      
         if (isLoggedOn()){
            include "$racine/vue/entete.html.php";
            include "$racine/vue/vueConfirmation.php";
            include "$racine/vue/pied.html.php";
               $titre = "Confirmation";
      
         }
         else
         {
          include "$racine/vue/entete.html.php";
            include "$racine/vue/vueAuthentification.php";
            include "$racine/vue/pied.html.php";
              $titre = "Authentification";
              echo "Erreur d'authentification. Veuillez réessayer.";
      
         }
     }


?>
 
 