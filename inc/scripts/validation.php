<?php 
    session_start();
    if(!$_SESSION['auth']) {
        header('Location: index.php?unauthorized');
    }
?>