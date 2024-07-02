<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Étudiant</title>
    <link rel="stylesheet" href="etudiant.css">
</head>
<body>
    <div class="contener">
    <table id="details">
        <!-- <caption class="animation">Détails Étudiant</caption>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Âge</th>
                <th>Matricule</th>
            </tr>
        </thead>
        <tbody> -->
        <?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crudphp";

// Vérification de la connexion à la base de données
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si le matricule de l'étudiant est fourni dans la requête GET
    if (isset($_GET['Matricule']) && is_numeric($_GET['Matricule'])) {
        $matricule = $_GET['Matricule'];
        $stmt = $conn->prepare("SELECT * FROM etudiant WHERE Matricule = :matricule");
        $stmt->bindParam(':matricule', $matricule);
        $stmt->execute();
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($etudiant) {
            echo "<table id='details'>";
            echo "<caption class='animation'>Détails Étudiant</caption>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Nom</th>";
            echo "<th>Prénom</th>";
            echo "<th>Âge</th>";
            echo "<th>Matricule</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td>{$etudiant['Nom']}</td>";
            echo "<td>{$etudiant['Prenom']}</td>";
            echo "<td>{$etudiant['Age']}</td>";
            echo "<td>{$etudiant['Matricule']}</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "Aucun étudiant trouvé avec ce matricule.";
        }
    } else {
        echo "Matricule d'étudiant non fourni.";
    }
} catch(PDOException $e) {
    echo "Échec de la connexion à la base de données: " . $e->getMessage();
}
?>

        </tbody>
    </table>
    </div>
</body>
</html>
