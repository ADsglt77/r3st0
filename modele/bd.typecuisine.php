<?php
include_once "bd.pdo.php";

function getLesTypesCuisinebyIdR($idR){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM typecuisine INNER JOIN proposer ON typecuisine.idTC = proposer.idTC WHERE proposer.idR = :idR");
        $req->bindValue(':idR', $idR);
        $req->execute();
        $lesTypesCuisine = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesTypesCuisine;

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLesTypesCuisine(){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM typecuisine");
        $req->execute();
        $typesCuisine = $req->fetchAll(PDO::FETCH_OBJ);
        return $typesCuisine;

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

?>