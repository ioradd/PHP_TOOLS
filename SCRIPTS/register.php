<?php 

require_once 'functions.php';

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
    $_SESSION['msg'] = "L'identifiant ou le mot de passe est incorecte !";
    header('Location: ../../layout/nav/register.php');
	exit;
}

// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
    $_SESSION['msg'] = "L'identifiant ou le mot de passe est incorecte !";
    header('Location: ../../layout/nav/register.php');
	exit;
}

if (isset($_POST['register'])){
    try {
        // Récupération de l'objet de connexion
        $pdo = connect_pdo_mysql();
        // Attribut de gestion des érreurs (optionnel)
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des variables post rentré par l'utilisateur
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $role = 1;

        // hashage du password (obligatoire)
        $pass = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

        // Requète SQL pour vérifier si l'username n'existe pas déja
        $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
        // préparation de la requète (pour éviter les injections SQL)
        $stmt = $pdo->prepare($sql);

        // on ajoute les valeurs rentrer par l'utilisateur avec la méthode bindValue
        $stmt->bindValue(':username', $user);
        // On éxécute la requète SQL
        $stmt->execute();
        // On récupère la ligne de la base de donnée
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si la ligne est supérieur à 0 (donc existe) alors affiché "le nom d'utilisateur
        // existe déja.
        if($row['num'] > 0){
            echo '<script>alert("Username already exists")</script>';
        }
        // Sinon : Ajouter le nouvel utilisateur dans la bdd
        else {

            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) 
            VALUES (:username,:email,:password,:role)");
            $stmt->bindParam(':username', $user);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $pass);
            $stmt->bindParam(':role', $role);
            
            if($stmt->execute()) {
                echo '<script>alert("New account created.")</script>';
                //redirect to another page
                echo '<script>window.location.replace("index.php")</script>';
            } else{
                echo '<script>alert("An error occurred")</script>';
            }
        } // Gestion debug
    } catch(PDOException $e){
        $error = "Error: " . $e->getMessage();
        echo '<script type="text/javascript">alert("'.$error.'");</script>';
    }
}