<?php
    require './Controllers/TaskController.php';
    session_start();
    $id = (int) filter_input_array(INPUT_POST,FILTER_DEFAULT)['taskIdDelete'];
    $task = new TaskController($_SESSION['user_id']);
    $task->id = $id;
    $task->deleteTask();