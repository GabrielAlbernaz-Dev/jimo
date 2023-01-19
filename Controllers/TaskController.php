<?php
    require './Models/Task.php';

    class TaskController {
        public int $id;
        public string $name;
        public int $favorite;
        public int $today;
        public int $important;
        public int $done;
        public int $userId;
        private object $taskModel;

        public function __construct($userId) {
            $this->taskModel = new Task();
            $this->userId = $userId;
        }

        public function getAllTasks($filter = null) {
            if($filter !== null) {
                return $this->taskModel->findAllFilteredTasks($filter,$this->userId);
            } else {
                return $this->taskModel->findAllTasks($this->userId);
            }
        }

        public function getSearchTasks($search) : array {
            $foundedTasks = $this->taskModel->searchTasks($search,$this->userId);
            if(count($foundedTasks)) return $foundedTasks;
            else return [];
        }

        public function createTask() {
            $name = $this->name;
            $favorite = $this->favorite;
            $today = $this->today;
            $important = $this->important;

            $createdTask = $this->taskModel->insertTask($name, $favorite, $today, $important,$this->userId);
            if($createdTask) header('Location: app.php');
            else header('Location: app.php?error_task');
        }

        public function editTask() {
            $id = $this->id;
            $name = $this->name;
            $editedTask = $this->taskModel->updateTask($id,$name);
            if($editedTask) header('Location: app.php');
            else header('Location: app.php?error_task');
        }

        public function deleteTask() {
            $id = $this->id;
            $deletedTask = $this->taskModel->deleteTask($id);
            if($deletedTask) header('Location: app.php');
            else header('Location: app.php?error_task');
        }

        public function setDoneTask() {
            $id = $this->id;
            $done = $this->done;
            $doneTask = $this->taskModel->doneTask($id,$done);
            if($doneTask) return;
            else header('Location: app.php?error_task');
        }
        
    }