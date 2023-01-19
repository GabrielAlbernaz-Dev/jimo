<?php 
    include_once 'inc/layout/header-noauth.php';
    require './Controllers/UserController.php';
    require './helpers/Auth.php';
    Auth::isLogin();
?>
<?php 
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $userRegister = new UserController();

    if(isset($formData['submit-user'])) {
        extract($formData);
        $userRegister->email = $email;
        $userRegister->password = $password;
        $userRegister->name = $name;
        // var_dump($userRegister);
        $userRegister->register();
    }
?>
    <main class="form-container">
        <div class="content">
        <div class="main-form">
                <form class="pdx-4" action="signup.php" method="post">
                    <h2 class="form-title">Create your account and enjoy JIMO</h2>
                    <div class="box-invalid validation">
                        <h4>The fields below are incorrect or empty, please try again.</h4>
                    </div>
                    <div>
                        <input type="email" placeholder="Email" name="email">
                        <div class="validate-msg">* Enter the @ and fill in the field.</div>
                    </div>
                    <div>
                        <input type="text" placeholder="Name" name="name">
                        <div class="validate-msg">* Fill in the field correctly.</div>
                    </div>
                    <div>
                        <input type="password" placeholder="Password" name="password">
                        <div class="validate-msg">* Fill in the field correctly.</div>
                    </div>
                    <button class="main-form-submit" type="submit" name="submit-user">Register</button>
                </form>
            </div>
            <div class="desc pdx-4">
                <h2 class="desc-title">Jimo</h2>
                <p class="desc-text">
                    Organize your day with the best possible way
                </p>
            </div>
        </div>
    </main>

<script type="module" src="./js/app.js"></script>
</body>
</html>