<?php
include_once "$racine/modele/bd.resto.php";
include_once "$racine/modele/bd.typecuisine.php";
include_once "$racine/modele/bd.photo.php";
include_once "$racine/modele/bd.pdo.php";
include_once "$racine/modele/bd.authentification.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=adresse","label"=>"Recherche par adresse");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=type","label"=>"Recherche par type de cuisine");

// recuperation des donnees GET, POST, et SESSION
$critere = $_GET['critere'];
if($critere === "nom" && isset($_POST['nomR'])){
    $nomR = $_POST['nomR'];
    $lesRestos = getLesRestosByNomR($nomR);
}
if($critere === "adresse" && isset($_POST['voieAdrR']) && isset($_POST['cpR']) && isset($_POST['villeR'])){
    $voieAdrR = $_POST['voieAdrR'];
    $cpR = $_POST['cpR'];
    $villeR = $_POST['villeR'];
    $lesRestos = getLesRestosByAdresse($voieAdrR, $cpR, $villeR);
}
if($critere === "type" && isset($_POST['typesCuisine'])){
    $tabIdTC = $_POST['typesCuisine'];
    $lesRestos = getLesRestosByTC($tabIdTC);
}

;

// appel des variables utiles
$typesCuisine = getLesTypesCuisine();
//
;

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Rechercher un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueRechercheResto.php";
if (!empty($_POST)) {
    // affichage des résultats de la recherche
    include "$racine/vue/vueListeRestos.php";
}
include "$racine/vue/pied.html.php";
?>