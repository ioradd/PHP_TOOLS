<?php 
// START SESSION  -------------------------------------
session_start();

// SECURITY -------------------------------------------

// ---------------  REQUIRE             ---------------
require_once 'core/layout/templates.php';

// ---------------  HEADER              ---------------
template_header("Page d'accueil");

// ---------------  NAVBAR              ---------------
if (isset($_SESSION['loggedin']) == TRUE)  {
    // template_nav(isset($_SESSION['role']));
    template_nav($role);
} else {
    template_nav(0);
}

?>

<?php
// -------------- Message d'activité ---------------
if (isset($_SESSION["activity_msg"])) 
    {
        echo $_SESSION["activity_msg"];
}?>

<?php
// --------------- MAIN ---------------
require_once 'core/layout/nav/home.php';




// --------------- FOOTER -----------------
footer();