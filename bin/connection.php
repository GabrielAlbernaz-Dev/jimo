<?php 
    define('HOST','localhost');
    define('USERNAME','root');
    define('PASSWORD','');
    define('DB_NAME','jimo');
    define('USERS_TABLE','users');
    define('TASKS_TABLE','tasks');

    $conn = mysqli_connect(HOST,USERNAME,PASSWORD,DB_NAME) or die(mysqli_error());