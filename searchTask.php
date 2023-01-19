<?php
    require './Controllers/TaskController.php';
    session_start();
    $searchTask =  filter_input_array(INPUT_POST,FILTER_DEFAULT) ? array_key_first(filter_input_array(INPUT_POST,FILTER_DEFAULT)) : [];
    $task = new TaskController($_SESSION['user_id']);
    $foundedTasks = $task->getSearchTasks($searchTask);
    echo json_encode($foundedTasks);
    
