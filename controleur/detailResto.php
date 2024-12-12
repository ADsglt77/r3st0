<?php
include_once "$racine/modele/bd.resto.php";
include_once "$racine/modele/bd.typecuisine.php";
include_once "$racine/modele/bd.photo.php";
include_once "$racine/modele/bd.aimer.php";
include_once "$racine/modele/bd.pdo.php";
include_once "$racine/modele/bd.authentification.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"#top","label"=>"Le restaurant");
$menuBurger[] = Array("url"=>"#adresse","label"=>"Adresse");
$menuBurger[] = Array("url"=>"#photos","label"=>"Photos");
$menuBurger[] = Array("url"=>"#horaires","label"=>"Horaires");
$menuBurger[] = Array("url"=>"#crit","label"=>"Critiques");

// recuperation des donnees GET, POST, et SESSION
$idR = $_GET['idR'];
$mailU = getMailULoggedOn();
;

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$leResto = getLeRestoByIdR($idR);
$lesTypesCuisines = getLesTypesCuisinebyIdR($idR);
$lesPhotos = getLesPhotoByIdR($idR);    

$leUtilisateurMail = getLeUtilisateurByMailU($mailU);
$voirAimer = getAimerByIdR($mailU, $idR);
;

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Détail d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueDetailResto.php";
include "$racine/vue/pied.html.php";
?>