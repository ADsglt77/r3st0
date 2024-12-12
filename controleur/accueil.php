<?php
include_once "$racine/modele/bd.pdo.php";
include_once "$racine/modele/bd.authentification.php";
$titre = "Accueil";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueAccueil.php";
include "$racine/vue/pied.html.php";
?>