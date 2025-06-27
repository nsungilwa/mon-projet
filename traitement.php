<?php
// Récupération des éléments du formulaire
$noms = $_POST['nom'];
$telephone = $_POST['telephone'];
$plat_commander = $_POST['plat'];
$quantite = $_POST['quantite'];
$adresse = $_POST['adresse'];

try {
    $bdd = new PDO("mysql:host=localhost;dbname=vente", "root", "");
    echo "Merci pour votre commende , nous vous contacterons très bientot";
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

// Préparation et exécution de la requête
$req = $bdd->prepare("INSERT INTO commander(noms, telephone, platcommande, quantite, adresse)
                      VALUES(:noms, :telephone, :platcommande, :quantite, :adresse)");

$req->bindParam(':noms', $noms);
$req->bindParam(':telephone', $telephone);
$req->bindParam(':platcommande', $plat_commander);
$req->bindParam(':quantite', $quantite);
$req->bindParam(':adresse', $adresse);

$req->execute();
?>