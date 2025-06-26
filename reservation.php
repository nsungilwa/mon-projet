<?php
    //Récupération des élements du formulaire
    $noms = $_POST['nom'];
    $dates = $_POST['dates'];
    $heure = $_POST['heure'];
    $personnes = $_POST['personnes'];
    

    try{
        $bdd = new PDO("mysql:host=localhost;dbname=vente", "root", "");
        echo "Connexion reussie";
    }
    catch(Exception $e){
        die("Erreur : " .$e->getMessage());
    }

    //Requête pour inserer les données
    $req = $bdd->prepare("INSERT INTO reservation(noms, dates, heures, personnes) VALUES(:noms, :dates, :heures, :personnes)");
    $req->bindParam(':noms', $noms);
    $req->bindParam(':dates', $dates);
    $req->bindParam(':heures', $heure);
    $req->bindParam(':personnes', $personnes);

    $req->execute();
?>