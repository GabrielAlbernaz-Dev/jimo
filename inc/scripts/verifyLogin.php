<?php 
    session_start();
    if(isset($_SESSION['auth']) && $_SESSION['auth']) {
        header('Location: app.php');
    }
?>