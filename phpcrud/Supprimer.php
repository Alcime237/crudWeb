<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crudphp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si le formulaire a été soumis avec le matricule à supprimer
    if (isset($_POST['matricule'])) {
        $matricule = $_POST['matricule'];

        // Requête SQL pour supprimer l'étudiant correspondant
        $sql = "DELETE FROM etudiant WHERE Matricule = :matricule";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':matricule', $matricule);
        $stmt->execute();

        echo "Étudiant avec le matricule $matricule a été supprimé avec succès.";
    }
} catch(PDOException $e) {
    echo "Échec de la connexion à la base de données: " . $e->getMessage();
}
?>

