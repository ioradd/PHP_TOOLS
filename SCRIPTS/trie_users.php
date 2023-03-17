<?php 
// START SESSION --------------------------------------
session_start();

// ---------------  REQUIRE             ---------------
require_once '../../../layout/templates.php';
include '../../../scripts/functions.php';

// ---------------  HEADER              ---------------
template_header("Gestion d'utilisateurs");

// ---------------  NAVBAR              ---------------
if (isset($_SESSION['loggedin']) == TRUE)  {
    template_nav(isset($_SESSION['role']));
} else {
    template_nav(0);
}

?>

<?php

// --------------   Message d'activité  ---------------
?><div class="activity-msg">
    <?= isset($_SESSION["activity_msg"]); ?>
</div> <?php


// ---------------  MAIN                ---------------
?><main><?php
if ($_SESSION['loggedin'] == true && $_SESSION['role'] == 3) {
    $pdo = connect_pdo_mysql();
    $stmt = $pdo->query('SELECT * FROM users ORDER BY register_date DESC');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    
}

/*foreach ($users as $user) :?>
    <?=$user['username']?>
    <br>
    <?php endforeach ;?>
    */?>

    <div class="content read">
        <h2>Gestion d'utilisateurs</h2>
        <a href="create.php" class="create-contact">Créer utilisateur</a>
        <table>
            <thead>
                <tr>
                    <td>#</td>
                    <td>Utilisateur</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Ville</td>
                    <td>Pays</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?=$user['id']?></td>
                    <td><?=$user['username']?></td>
                    <td><?=$user['email']?></td>
                    <td><?=$user['role']?></td>
                    <td><?=$user['city']?></td>
                    <td><?=$user['country']?></td>
                    <td class="actions">
                        <a href="update.php?id=<?=$user['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="delete.php?id=<?=$user['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php /*
        <div class="pagination">
            <?php if ($page > 1): ?>
        <a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page*$records_per_page < $num_contacts): ?>
        <a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
    */?>
    </div>





</main>


<?php
// --------------- FOOTER -----------------
footer();