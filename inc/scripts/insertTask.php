<?php 
    include_once '../../bin/connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['submit-task']) && isset($_POST['task'])) {
        $task = mysqli_real_escape_string($conn,$_POST['task']);
        $favorite = isset($_GET['favorite']) ? 1 : 0;
        $today = isset($_GET['today']) ? 1 : 0;
        $important = isset($_GET['important']) ? 1 : 0;
        $table = TASKS_TABLE;
        
        $sql = "INSERT INTO $table (user_id,task,important,favorite,today) VALUES ($user_id, '$task', $important,$favorite, $today)";
        $exec = mysqli_query($conn,$sql);
        header('Location: ../../app.php?query=1');

    } else {
        header('Location: ../../app.php?=task_empty'); 
    }

?>