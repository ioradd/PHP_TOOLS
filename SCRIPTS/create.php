<?php

// START SESSION --------------------------------------
session_start();

// ---------------  REQUIRE             ---------------
require_once '../../../layout/templates.php';
include '../../../scripts/functions.php';

// ---------------  HEADER              ---------------
template_header("Ajout utilisateur");

// ---------------  NAVBAR              ---------------
if (isset($_SESSION['loggedin']) == TRUE)  {
    template_nav(isset($_SESSION['role']));
} else {
    template_nav(0);
}


// ---------------  MAIN PHP ---------------

// Connexion PDO
$pdo = connect_pdo_mysql();
$msg = '';

if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

    $username = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    // $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $role = isset($_POST['title']) ? $_POST['title'] : '';
    $register_date = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');

    // $stmt = $pdo->prepare('INSERT INTO users VALUES (?, ?, ?, ?, ?, ?)');
    // $stmt->execute([$id, $name, $email, $phone, $title, $created]);

    $stmt = $pdo->prepare('INSERT INTO users (`id`, `username`, `email`, `role`, `register_date`) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $username, $email, $role, $register_date]);

    $msg = 'Created Successfully!';
}

// ---------------  MAIN  ---------------
?>
<main>
    <div class="content update">
        <h2>Create Contact</h2>
        <form action="create.php" method="post">
            <label for="id">ID</label>
            <label for="name">Nom d'utilisateur</label>
            <input type="text" name="id" placeholder="26" value="auto" id="id">
            <input type="text" name="name" placeholder="John Doe" id="name">
            <label for="email">Email</label>
            <label for="phone">Numéro de téléphone</label>
            <input type="text" name="email" placeholder="johndoe@example.com" id="email">
            <input type="text" name="phone" placeholder="0600000000" id="phone">
            <label for="title">Role</label>
            <label for="created">Created</label>
            <input type="text" name="title" placeholder="3 = admin, 2 = editor, 1 = user" id="title">
            <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
            <input type="submit" value="Create">
        </form>
        <?php if ($msg): ?>
        <p><?=$msg?></p>
        <?php endif; ?>
    </div>
</main>


<?php
// --------------- FOOTER -----------------
footer();