<main>

    <?= isset($_SESSION['msg']);?>
    <div class="register">
        <h1>Login</h1>
        <form action="../../scripts/login.php" method="post" autocomplete="off">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>

            <input type="submit" value="login" name="login">
        </form>
    </div>
    <a href="register.php">Vous n'avez pas de compte ?</a>
</main>