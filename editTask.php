<?php 
    include_once 'bin/connection.php';
    $edit_task_id = $_GET['edit_task'];
    $task_name = $_POST['task-name'];
    $table = 'tasks';

    if(isset($edit_task_id)) {
        $sql = "UPDATE $table SET task = '$task_name' WHERE id = $edit_task_id";
        $exec = mysqli_query($conn,$sql);
        header('Location: app.php?query=1');
    } else {
        header('Location: app.php?query=1');
    }
?>