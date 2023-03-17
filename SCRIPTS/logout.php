<?php
session_start();
session_destroy();
$_SESSION["activity_msg"] = "Vous vous êtes déconnecté avec Succés !";
// Redirect to the login page:
header('Location: /NomDuDossierRacine/index.php');
?>