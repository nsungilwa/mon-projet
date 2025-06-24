
<?php
    //Récupération des élements du formulaire
    $noms = $_POST['nom'];
    $telephone = $_POST['telephone'];
    $plat_commander = $_POST['plat'];
    $quantite = $_POST['quantite'];
    $adresse = $_POST['adresse'];

    try{
        $bdd = new PDO("mysql:host=localhost;dbname=vente", "root", "");
        echo "Connexion reussie";
    }
    catch(Exception $e){
        die("Erreur : " .$e->getMessage());
    }

    //Requête pour inserer les données
    $req = $bdd->prepare("INSERT INTO commander(noms, telephone, platcommande, quantite, adresse) VALUES(:noms, :telephone, :platcommande, :quantite, :adresse)");
    $req->bindParam(':noms', $noms);
    $req->bindParam(':telephone', $telephone);
    $req->bindParam(':platcommande', $plat_commander);
    $req->bindParam(':quantite', $quantite);
    $req->bindParam(':adresse', $adresse);
    $req->execute();
?>