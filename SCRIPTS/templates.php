<?php 

// Initialisation variables globales
$role = 0;

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

// HEADER
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="/mooviblog/css/reset.css" rel="stylesheet" type="text/css">
        <link href="/mooviblog/css/style.css" rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">

        <title>$title</title>
    </head>

    <div class="header">
        <img src="/mooviblog/core/assets/logo/removebg-logo.png" alt="Logo principal mooviblog">
    </div>

    <body>
EOT;
}

// NAVBAR
function template_nav($role) {
    if ($role == 3) {
        echo <<<EOT
        <div class="navbar">
            <ul class="navbar-nav">
                <li class="nav-item3">
                    <a href="/mooviblog/index.php" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/house-solid.svg" class="fa-primary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>

                <li class="nav-item3">
                    <a href="/mooviblog/index.php" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/square-pen-solid.svg" class="fa-primary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>

                <li class="nav-item3">
                    <a href="/mooviblog/core/layout/nav/dashboard/users.php" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/users-solid.svg" class="fa-primary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>

                <li class="nav-item3">
                    <a href="#" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/user-solid.svg" class="fa-primary fa-secondary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>

                <li class="nav-item3">
                    <a href="/mooviblog/core/scripts/logout.php" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/right-from-bracket-solid.svg" class="fa-primary fa-secondary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>
            </ul>
        </div>
    EOT;
    } elseif ($role == 2) {
        echo <<<EOT
        <div class="navbar">
            <ul class="navbar-nav">
                <li class="nav-item2">
                    <a href="/mooviblog/index.php" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/house-solid.svg" class="fa-primary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>

                <li class="nav-item2">
                    <a href="/mooviblog/index.php" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/square-pen-solid.svg" class="fa-primary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>

                <li class="nav-item2">
                    <a href="#" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/user-solid.svg" class="fa-primary fa-secondary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>

                <li class="nav-item2">
                    <a href="core/layout/nav/register.php" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/right-from-bracket-solid.svg" class="fa-primary fa-secondary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>
            </ul>
        </div>
    EOT;
    } elseif ($role == 1) {
        echo <<<EOT
        <div class="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/mooviblog/index.php" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/house-solid.svg" class="fa-primary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/user-solid.svg" class="fa-primary fa-secondary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>

                <li class="nav-item">
                    <a href="core/layout/nav/register.php" class="nav-link">
                        <img src="/mooviblog/core/assets/icons/right-from-bracket-solid.svg" class="fa-primary fa-secondary" />
                        <!-- <span class="link-text">GALERIE</span> -->
                    </a>
                </li>
            </ul>
        </div>
    EOT;
    } else {
        echo <<<EOT
        <div class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/mooviblog/index.php" class="nav-link">
                    <img src="/mooviblog/core/assets/icons/house-solid.svg" class="fa-primary" />
                    <!-- <span class="link-text">GALERIE</span> -->
                </a>
            </li>
    
            <li class="nav-item">
                <a href="core/layout/nav/register.php" class="nav-link">
                    <img src="/mooviblog/core/assets/icons/user-solid.svg" class="fa-primary fa-secondary" />
                    <!-- <span class="link-text">GALERIE</span> -->
                </a>
            </li>
        </ul>
    </div>
    EOT;        
    }
}

// FOOTER
function footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
?>