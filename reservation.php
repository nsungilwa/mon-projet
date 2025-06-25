<?php
    //Récupération des élements du formulaire
    $noms = $_POST['nom'];
    $dates = $_POST['dates'];
    $heure = $_POST['heure'];
    $nombredepersonnes = $_POST['personnes'];
    

    try{
        $bdd = new PDO("mysql:host=localhost;dbname=vente", "root", "");
        echo "Connexion reussie";
    }
    catch(Exception $e){
        die("Erreur : " .$e->getMessage());
    }

    //Requête pour inserer les données
    $req = $bdd->prepare("INSERT INTO reservation (noms, dates, heure, nombredepersonnes) VALUES(:noms, :dates, :heure, :personnes)");
    $req->bindParam(':noms', $noms);
    $req->bindParam(':dates', $dates);
    $req->bindParam(':heure', $heure);
    $req->bindParam(':nombredepersonnes', $personnes);
    $req->execute();
?>