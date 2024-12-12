<?php
include_once "$racine/modele/bd.utilisateur.php";
include_once "$racine/modele/bd.pdo.php";
include_once "$racine/modele/bd.authentification.php";
include_once "$racine/modele/bd.aimer.php";

if(isset($_GET['idR'])) {
    $idR = $_GET['idR'];
    $mailU = getMailULoggedOn();
    $leUtilisateurMail = getLeUtilisateurByMailU($mailU);

    $voirAimer = getAimerByIdR($idR, $mailU);

    if ($voirAimer) {
        $supAimer = delAimer($idR, $mailU);
    } else {
        $ajtAimer = addAimer($idR, $mailU);
    }

    header("Location: ./?action=detail&idR=$idR");
} else {
    header("Location: ./?action=defaut");
}
?>
