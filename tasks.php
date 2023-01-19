<?php
    require './Controllers/TaskController.php';
    session_start();
    $filter = filter_input_array(INPUT_POST,FILTER_DEFAULT) ? array_key_first(filter_input_array(INPUT_POST,FILTER_DEFAULT)) : null;
    $task = new TaskController($_SESSION['user_id']);
    $tasks = $task->getAllTasks($filter);
    echo json_encode($tasks);
