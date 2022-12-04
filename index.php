<?php include_once 'inc/scripts/verifyLogin.php' ?>
<?php include_once 'inc/layout/header-noauth.php' ?>
    <main class="form-container">
        <div class="content">
            <div class="desc pdx-4">
                <h2 class="desc-title">Jimo</h2>
                <p class="desc-text">
                    Organize your day with the best possible way
                </p>
            </div>
            <div class="main-form">
                <form class="pdx-4" action="login.php" method="post">
                    <h2 class="form-title">Log in to enjoy JIMO</h2>
                    <div class="box-invalid validation">
                        <h4>The fields below are incorrect or empty, please try again.</h4>
                    </div>
                    <div>
                        <input type="email" placeholder="Email" name="email">
                        <div class="validate-msg">* Enter the @ and fill in the field.</div>
                    </div>
                    <div>
                        <input type="password" placeholder="Password" name="password">
                        <div class="validate-msg">* Fill in the field correctly.</div>
                    </div>
                    <button class="main-form-submit" type="submit" name="submit">Log In</button>
                    <a href="#" class="forgot-password">Forgot your password?</a>
                </form>
            </div>
        </div>
    </main>

<script type="module" src="./js/app.js"></script>
</body>
</html>