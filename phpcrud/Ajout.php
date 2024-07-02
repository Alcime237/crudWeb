<?php

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crudphp";

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuration de PDO pour rapporter les erreurs
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $matricule = $_POST['matricule'];

    // Vérification si un fichier a été téléchargé avec le formulaire
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        // Nom du fichier photo
        $photo = $_FILES['photo']['name'];
        // Chemin temporaire du fichier photo
        $photo_tmp = $_FILES['photo']['tmp_name'];

        // Déplacement de la photo vers un emplacement permanent
        $upload_directory = "uploads/"; // Répertoire où stocker les photos
        move_uploaded_file($photo_tmp, $upload_directory.$photo);
    } else {
        // Si aucun fichier n'a été téléchargé ou une erreur est survenue
        $photo = ""; // Définir une valeur par défaut pour $photo
    }

    // Requête d'insertion
    $sql = "INSERT INTO etudiant (Nom, Prenom, Age, Matricule, Photo) VALUES (:nom, :prenom, :age, :matricule, :photo)";
    
    // Préparation de la requête
    $stmt = $conn->prepare($sql);
    
    // Liaison des paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':matricule', $matricule);
    $stmt->bindParam(':photo', $photo);
    
    // Exécution de la requête
    $stmt->execute();

    echo "Données insérées avec succès.";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermer la connexion
$conn = null;
?>
