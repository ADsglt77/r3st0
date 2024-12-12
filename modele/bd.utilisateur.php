<?php function getLeUtilisateurByMailU($mailU) {
    try{
        $connex = connexionPDO();
        $req1 = $connex->prepare("SELECT * FROM utilisateur WHERE mailU = :mailU");
        $req1->bindValue(':mailU', $mailU);
        $req1->execute();
        $leUtilisateurMail = $req1->fetch(PDO::FETCH_OBJ);
        return $leUtilisateurMail;

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

?>