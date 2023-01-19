<?php 
    require './Controllers/UserController.php';
    $userAuth = new UserController();
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(isset($formData['submit'])) {
        extract($formData);
        $userAuth->email = $email;
        $userAuth->password = $password;
        var_dump($userAuth->login());
    }
