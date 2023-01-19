<?php
    require './Controllers/TaskController.php';
    session_start();
    $formTaskData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $task = new TaskController($_SESSION['user_id']);
    if(isset($formTaskData['submit-task'])) {
        extract($formTaskData);
        $task->name = $name;
        $task->favorite = (int) $favorite;
        $task->today = (int) $today;
        $task->important = (int) $important;
        $task->createTask();
    }