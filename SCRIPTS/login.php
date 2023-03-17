<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'functions.php';

session_start();

$pdo = connect_pdo_mysql();

if (!isset($_POST['username'], $_POST['password'])) {
    // $_SESSION['msg'] = "S'il vous plait, Veuillez remplir les champs nom d'utilisateur et mot de passe !";
    exit ("S'il vous plait, Veuillez remplir les champs nom d'utilisateur et mot de passe !");
}

if ($stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?')) {

    $stmt->execute([$_POST['username']]);
    // echo 'commande bien éxécuté';
    // echo '<br>';

    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])){
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['role'] = $user['role'];
    } else {
        $_SESSION['msg'] = "L'identifiant/mot de passe est incorrecte";
        echo "L'identifiant/mot de passe est incorrecte";
    }
}

if (isset($_SESSION['loggedin'])) {
    header('Location: /NomDuDossierRacine/index.php');
    exit;
} else {
    header('Location: ../layout/layout/nav/login.php');
}

?>