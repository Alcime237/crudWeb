<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>koosner dasboard</title>

   <!-- iconscout cdn path -->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <!-- CSS File Link -->
   <link rel="stylesheet" href="crud.css">
</head>
<body>

<div class="wrapper flex">
    <div class="container">
        <h1> Etudiant !</h1>
        <a href="Ajouter.php"> <button class="add-button"><span>&#43;</span> Ajouter</button> </a>
        <div class="search-container">
            <form action="" method="post">
                <input type="text" class="search-input" name="search" placeholder="Recherche...">
                <span class="search-icon">&#128269;</span>
            </form>
        </div>
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Âge</th>
                <th>Matricule</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Connexion à la base de données
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "crudphp";

            try {
                // Connexion à la base de données
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // Configuration de PDO pour rapporter les erreurs
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Requête pour récupérer les données de la base de données
                if(isset($_POST['search'])) {
                    $term = $_POST['search'];
                    $sql = "SELECT * FROM etudiant WHERE Nom LIKE '%$term%' OR Prenom LIKE '%$term%' OR Matricule LIKE '%$term%'";
                } else {
                    $sql = "SELECT * FROM etudiant";
                }
                // Exécution de la requête
                $result = $conn->query($sql);

                // Vérification s'il y a des résultats
                if ($result->rowCount() > 0) {
                    // Parcourir les résultats et afficher les données dans une table
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        // Vérification de l'existence des clés avant de les utiliser
                        if (isset($row['Nom'])) {
                            echo "<td>" . $row['Nom'] . "</td>";
                        }
                        if (isset($row['Prenom'])) {
                            echo "<td>" . $row['Prenom'] . "</td>";
                        }
                        if (isset($row['Age'])) {
                            echo "<td>" . $row['Age'] . "</td>";
                        }
                        if (isset($row['Matricule'])) {
                            echo "<td>" . $row['Matricule'] . "</td>";
                        }
                        if (isset($row['Matricule'])) {
                            echo "<td>
                            <a href='Modifier.php?Matricule=" . $row['Matricule'] . "'><button class='modif-button'>Modifier</button></a>
                            <a href='interfaceSupp.php?Matricule=" . $row['Matricule'] . "'><button class='supp-button'>Supprimer</button></a>
                            <a href='etudiantdetails.php?Matricule=" . $row['Matricule'] . "'><button class='detail-button'>Détails</button></a>
                          </td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucun résultat trouvé.</td></tr>";
                }
            } catch(PDOException $e) {
                echo "<tr><td colspan='6'>Erreur : " . $e->getMessage() . "</td></tr>";
            }

            // Fermer la connexion
            $conn = null;
            ?>
            </tbody>
        </table>

    </div>
</div>

<!-- <script>
  let sideBar = document.getElementById('sidebar');
  let menuIcon = document.getElementById('menu-icon');
  let mainContent = document.getElementById('main-content');

  menuIcon.onclick = () => {
     sideBar.classList.toggle('toggleMenu');
     mainContent.classList.toggle('toggleContent');
  }
</script>  -->
</body>
</html>
