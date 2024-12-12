<?php
include_once "bd.pdo.php";

function getLesRestos(){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM resto");
        $req->execute();
        $lesRestos = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesRestos;

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLeRestoByIdR($idR){
    try{
        $connex = connexionPDO();
        $req1 = $connex->prepare("SELECT * FROM resto WHERE idR = :idR");
        $req1->bindValue(':idR', $idR);
        $req1->execute();
        $leResto = $req1->fetch(PDO::FETCH_OBJ);
        return $leResto;

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLesRestosByNomR($nomR){
    try{
        $connex = connexionPDO();
        $req2 = $connex->prepare("SELECT * FROM resto WHERE nomR LIKE :nomR");
        $req2->bindValue(':nomR', "%".$nomR."%");
        $req2->execute();
        $resultatsNomR = $req2->fetchall(PDO::FETCH_OBJ);
        return $resultatsNomR;

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLesRestosByAdresse($voieAdrR, $cpR, $villeR) {
    try{
        $connex = connexionPDO();
        $req3 = $connex->prepare("SELECT * FROM resto WHERE voieAdrR LIKE :voieAdrR AND cpR LIKE :cpR AND villeR LIKE :villeR");
        $req3->bindValue(':voieAdrR', "%".$voieAdrR."%");
        $req3->bindValue(':cpR', "%".$cpR."%");
        $req3->bindValue(':villeR', "%".$villeR."%");
        $req3->execute();
        $resultatsAdresse = $req3->fetchall(PDO::FETCH_OBJ);
        return $resultatsAdresse;

    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }

}

function getLesRestosByTC($tabIdTC){
    if (count($tabIdTC) > 0) {
        $filtre = "(";
        foreach($tabIdTC as $idTC){
            $filtre .= "$idTC,";
        }
        $filtre .= "null)";
 
        try{
            $connex = connexionPDO();
            $prep = $connex->prepare("SELECT DISTINCT resto.* FROM resto INNER JOIN proposer ON resto.idR=proposer.idR WHERE idTC IN $filtre");
            $prep->execute();
            return $prep->fetchAll(PDO::FETCH_OBJ);

        }
        catch(PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    else {
        return false;
    }
}

?>