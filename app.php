<?php 
    include_once 'inc/layout/header.php';
    require './Controllers/TaskController.php';
    require './helpers/Auth.php';
    Auth::check();
?>
    <main id="app">
        <?php include_once 'inc/layout/sidenav.php'; ?>
        <section class="task-wrapper">
            <header class="header-tasks">
                <div class="info">
                    <span class="info-icon">
                        <i class="fa-solid fa-sun"></i>
                    </span>
                    <p class="info-text">Tasks</p>
                </div>
                <!-- <div class="filters">
                    <a class="desc" href="#">
                        <i class="fa-solid fa-chevron-down"></i>
                        <p>desc</p>
                    </a>
                    <a class="asc" href="#">
                        <i class="fa-solid fa-chevron-up"></i>
                        <p>asc</p>
                    </a>
                </div> -->
            </header>
            <div class="date">
                <h2><?= date('D, M-d-y') ?></h2>
            </div>
            <div class="tasks-container pdy-3">
                <form id="form-task" action="insertTask.php" method="post">
                    <p class="invalid-input-task">The field cannot be empty</p>
                    <input class="input-add-task" name="name" type="text" placeholder="Add a task">
                    <div class="task-filter-container">
                        <ul class="filters-task">
                            <li class="filter-item" data-query="today">
                                <a href="#"><i class="fa-solid fa-sun"></i></a>
                                <input type="hidden" name="today" value="0">
                            </li>
                            <li class="filter-item" data-query="favorite">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                                <input type="hidden" name="favorite" value="0">
                            </li>
                            <li class="filter-item" data-query="important">
                                <a href="#"><i class="fa-sharp fa-solid fa-circle-exclamation"></i></a>
                                <input type="hidden" name="important" value="0">
                            </li>
                        </ul>
                        <button class="submit-task" name="submit-task" type="submit">Add</button>
                    </div>
                </form>
                <ul class="tasks mt-5">
                    <?php 
                        $task = new TaskController($_SESSION['user_id']);
                        $tasks = $task->getAllTasks(null);
                    ?>
                    <?php foreach ($tasks as $task) : ?>
                        <li class="task" data-id="<?= $task->id ?>" data-done="<?= $task->done ?>">
                            <div class="left">
                                <span class="mark">
                                    <input type="checkbox" class="check-input" name="task-check" <?= $task->done === '1' ? 'checked' : '' ?>>
                                </span>
                                <p class="task-name <?= $task->done === '1' ? 'text-done' : '' ?> "><?= $task->name ?></p>
                            </div>
                            <div class="right">
                                <span class="task-icon task-edit" data-id="<?= $task->id ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </span>
                                <span class="task-icon task-delete" data-id="<?= $task->id ?>">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                    <input type="hidden" name="taskId" id="taskId">
                                </span>
                            </div>
                        </li>
                    <?php endforeach ; ?>
                </ul>
            </div>
        </section>
    </main>
<?php include_once 'inc/layout/footer.php' ?>