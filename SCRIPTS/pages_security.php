<?php 

// SECURITY -------------------------------------------
if ($_SESSION['loggedin'] != TRUE or $_SESSION['role'] != 3 ) {
    // $_SESSION['activity_msg'] = "Vous n'avez pas l'autorisation d'accéder à cette page";
	header('Location: /mooviblog/index.php');
	exit;
}