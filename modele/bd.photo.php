<?php
include_once "bd.pdo.php";

function getLaPhotoByIdR($idR){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM photo WHERE idR = :idR");
        $req->bindValue(':idR', $idR);
        $req->execute();
        $laPhoto = $req->fetch(PDO::FETCH_OBJ);
        return $laPhoto;

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLesPhotoByIdR($idR){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM photo WHERE idR = :idR");
        $req->bindValue(':idR', $idR);
        $req->execute();
        $lesPhotos = $req->fetchall(PDO::FETCH_OBJ);
        return $lesPhotos;

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>