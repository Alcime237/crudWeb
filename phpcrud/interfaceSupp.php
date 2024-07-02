<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Étudiant</title>
    <link rel="stylesheet" href="suppression.css">
</head>
<body>
    <div class="contener">
        <table id="details">
            <caption class="animation">Voulez-vous Supprimer ?</caption>
            <tbody> 
            </tbody>
        </table>
        <!-- Formulaire pour la suppression -->
        <form id="deleteForm" action="Supprimer.php" method="post">
            <!-- Champ d'entrée caché pour le matricule -->
            <input type="hidden" id="matriculeInput" name="matricule" value="">
            <!-- Bouton "OUI" -->
            <input type="submit" value="OUI" class="oui">
            <!-- Bouton "NON" -->
            <button type="button" onclick="location.href='annuler.php'" class="non">NON</button>
        </form>
    </div>

    <!-- Script JavaScript pour récupérer le matricule et le mettre dans l'input caché -->
    <script>
        // Récupérer l'URL de la page
        var url = window.location.href;
        // Extraire le matricule de l'URL
        var matricule = url.split('Matricule=')[1];
        // Mettre à jour la valeur de l'input caché avec le matricule
        document.getElementById('matriculeInput').value = matricule;
    </script>
</body>
</html>
