<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd<nader>";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$login = $_POST['login'];
$password = $_POST['password'];
$etablissement = $_POST['etablissement'];
setcookie("etablissement", "$etablissement", time() + (86400 * 365), "/");

$sql = "SELECT * FROM UTILISATEUR WHERE login='$login' AND pwd='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    
    $_SESSION['login'] = $login;
    
    header("Location: Resultat.php");
} else {
   
    echo "Identifiant ou mot de passe incorrect.";
}

$conn->close();
?>
