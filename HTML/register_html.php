<main>

    <?= isset($_SESSION['msg']);?>
    <div class="register">
        <h1>Register</h1>
        <form action="../../scripts/register.php" method="post" autocomplete="off">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <label for="email">
                <i class="fas fa-envelope"></i>
            </label>
            <!-- <label for="login">
                <a href="#">Vous avez déja un compte ?</a>
            </label> -->
            <input type="email" name="email" placeholder="Email" id="email" required>
            <input type="submit" value="register" name="register">
        </form>
    </div>
    <a href="login.php">Vous avez déja un compte ?</a>
</main>