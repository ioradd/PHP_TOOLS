<?php 
// START SESSION
session_start();

// ---------------  REQUIRE             ---------------
require_once 'core/layout/templates.php';

// ---------------  HEADER              ---------------
template_header("Page d'accueil");

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
require_once 'core/layout/nav/home.php';




// --------------- FOOTER              -----------------
footer();