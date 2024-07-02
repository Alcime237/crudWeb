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
    $id = isset($_POST['matricule']) ? $_POST['matricule'] : null; // ID de l'enregistrement à modifier
    $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
    $age = isset($_POST['age']) ? $_POST['age'] : null;
    
    // Traitement de la photo
    $photo = null; // Initialisation de la variable photo
    if(isset($_FILES['photo']['name']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo']['name']; // Nom du fichier photo
        $photo_tmp = $_FILES['photo']['tmp_name']; // Chemin temporaire du fichier photo
        $upload_directory = "uploads/"; // Répertoire où stocker les photos
        // Déplacer le fichier vers le répertoire de destination
        move_uploaded_file($photo_tmp, $upload_directory.$photo);
    }

    // Requête de modification
    $sql = "UPDATE etudiant SET Nom = :nom, Prenom = :prenom, Age = :age,  Photo = :photo WHERE Matricule = :matricule";
    
    // Préparation de la requête
    $stmt = $conn->prepare($sql);
    
    // Liaison des paramètres
    $stmt->bindParam(':matricule', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':photo', $photo);
    
    // Exécution de la requête
    $stmt->execute();

    echo "Données modifiées avec succès.";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermer la connexion
$conn = null;
?>
