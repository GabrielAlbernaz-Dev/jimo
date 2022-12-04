<?php
    include_once 'bin/connection.php';
    $del_task_id = $_GET['del_task'];
    $table = 'tasks';
    if(isset($del_task_id)) {
        $sql = "DELETE FROM $table WHERE id = $del_task_id";
        $exec = mysqli_query($conn,$sql);
        header('Location: app.php?query=1');
    } else {
        header('Location: app.php?action_invalid');
    }
?>