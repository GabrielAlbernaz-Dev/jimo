<?php 
    require './Controllers/UserController.php';
    $userLogout = new UserController();
    $userLogout->logout();
?>