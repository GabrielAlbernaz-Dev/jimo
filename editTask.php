<?php
    require './Controllers/TaskController.php';
    session_start();
    $formTaskData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($_POST);
    $task = new TaskController($_SESSION['user_id']);
    if(isset($formTaskData['submit-edit'])) {
        extract($formTaskData);
        $task->id = (int) $taskIdEdit;
        $task->name = $taskName;
        $task->editTask();
    }