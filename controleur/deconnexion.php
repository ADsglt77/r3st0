<?php 
include_once "$racine/modele/bd.utilisateur.php";
include_once "$racine/modele/bd.pdo.php";
include_once "$racine/modele/bd.authentification.php";

// Deconnexion
if (isset($_GET["action"]) && $_GET["action"] === "deconnexion") {
    logout();
}

$titre = "Déconnexion";

include "$racine/vue/entete.html.php";
include "$racine/vue/vueDeconnexion.php";
include "$racine/vue/pied.html.php";
?>
