<?php
    require './Controllers/TaskController.php';
    session_start();
    $data = json_decode(file_get_contents('php://input'), true);
    $doneTaskData = filter_var_array($data, FILTER_SANITIZE_STRING);
    $task = new TaskController($_SESSION['user_id']);
    if(isset($doneTaskData) && count($doneTaskData)) {
        extract($doneTaskData);
        $task->id = (int) $id;
        $task->done = (int) $doneVal;
        $task->setDoneTask();
    }