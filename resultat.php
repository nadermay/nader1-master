<?php
session_start();


if (!isset($_SESSION['login'])) {

    header("Location: Login.html");
    exit;
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats</title>
</head>
<body>
    <?php


    if (!isset($_SESSION['login'])) {
        
        header("Location: Login.html");
        exit;
    }
    
    
    $conn = new mysqli("localhost", "root", "", "bd<nader>");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    $login = $_SESSION['login'];
    $query = "SELECT E.NomPrenom, N.Moy, M.Libelle
              FROM NOTE N
              JOIN ELEVE E ON N.NumEleve = E.Numero
              JOIN MATIERE M ON N.CodeMatiere = M.Code
              WHERE E.Numero IN (SELECT NumEleve FROM UTILISATEUR WHERE login = '$login')
              ORDER BY M.Libelle";
    
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
       
        echo "Bienvenu $login à l’établissement " . $_COOKIE['etablissement'] . "<br><br>";
        while($row = $result->fetch_assoc()) {
            echo "L’élève " . $row["NomPrenom"]. " a eu la moyenne " . $row["Moy"]. " en " . $row["Libelle"]. "<br>";
        }
    } else {
        echo "Aucun résultat trouvé";
    }
    
    $conn->close();
    ?>
    <a href="logout.php">Déconnexion</a>
</body>
</html>
