<?php 
    session_start();
    include_once 'bin/connection.php';
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $table = USERS_TABLE;

    function getDataRowVal(string $data) {
        global $conn,$email,$table;
        $sql = "SELECT $data FROM $table WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        return mysqli_fetch_array($result)[0];
    }

    $hash = getDataRowVal('password');
    $user_id = getDataRowVal('id');
    
    if(empty($email) || empty($password) || !password_verify($password,$hash)) {
        header('Location: index.php?auth_invalid');
    }

    $sql = "SELECT name,email FROM $table WHERE email = '$email' AND password='$hash' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);

    if($row === 1) {
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $user_id;
        header('Location: app.php?query=1');
    } else {
        $_SESSION['auth'] = false;
        header('Location: index.php?auth_invalid');
    }

?>  