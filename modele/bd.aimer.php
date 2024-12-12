<?php

function getAimerByIdR($idR, $mailU) {
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM aimer WHERE mailU = :mailU AND idR = :idR");
        $req->bindValue(':idR', $idR);
        $req->bindValue(':mailU', $mailU);
        $req->execute();
        $voirAimer = $req->fetch(PDO::FETCH_OBJ);
        return $voirAimer;

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function addAimer($idR, $mailU) {
    try{
        $connex = connexionPDO();
        $req1 = $connex->prepare("INSERT INTO aimer (idR, mailU) VALUES (:idR, :mailU)");
        $req1->bindValue(':idR', $idR);
        $req1->bindValue(':mailU', $mailU);
        $req1->execute();

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delAimer($idR, $mailU) {
    try{
        $connex = connexionPDO();
        $req1 = $connex->prepare("DELETE FROM aimer WHERE idR = :idR AND mailU = :mailU");
        $req1->bindValue(':idR', $idR);
        $req1->bindValue(':mailU', $mailU);
        $req1->execute();
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

?>