<?php 

include 'functions.php';

// Le message de sortie 
$msg =''; 

// On vérifie si l'utilisateur à importé une novelle image
if (isset($_FILES['image'], $_POST['title'], $_POST['description'])) {
    // Le dossier ou l'image sera stoqué 
    $target_dir = 'images/';
    // Le path de la nouvelle image importé
    $image_path = $target_dir . basename($_FILES['image']['name']);
    // On vérifie si l'image est valide
    if (!empty($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name'])) {
        if (file_exists($image_path)) {
            $msg = "Cette image existe déja, s'il vous plait choisissez une autre image ou un nouveau nom.";
        } else if ($_FILES['image']['size'] > 500000) {
            $msg = "La taille de l'image est trop grande, choisissez une image en dessous de 500kb.";
        } else {
            // Toute les vérifications ont étaient éffectué, nous pouvons déplacer l'image téléchargé
            move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
            // Connexion à MySQL
            $pdo = connect_pdo_mysql();
            // On insert les informations de l'image dans la base de donnée (titre, description, path, date d'ajout)
            $stmt = $pdo->prepare('INSERT INTO images (title, description, filepath, uploaded_date) VALUES (?, ?, ?, CURRENT_TIMESTAMP)');
            $stmt->execute([$_POST['title'], $_POST['description'], $image_path]);
            $msg = "L'image à été importé avec succés !";
            echo('<meta http-equiv="refresh" content="2; URL=/phpgallery2/index.php">');
        }
    } else {
        $msg = "S'il vous plait, importé une image!";
    }
}

// else if ($_FILES['image']['size'] > 500000) {
    // $msg = 'La taille de l'image est trop volumineuse (>500kb), contacter IzoDev pour
    // obtenir une modification technique sur l'application. ';
?>

<div>
    <h2>Ajouter une image</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="image">Choisir une image</label>
        <input type="file" name="image" accept="image/*" id="image">

        <label for="title">Titre</label>
        <input type="text" name="title" id="title">

        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
        <input type="submit" value="Ajouter une nouvelle image" name="submit">
    </form>
    <p><?=$msg?></p>
    <!-- <meta http-equiv="refresh" content="2; URL=http://www.manouvelleadresse.com"> -->


</div>

<!-- 
    













-->