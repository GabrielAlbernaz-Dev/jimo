<?php 
    include_once 'bin/connection.php';
    include_once 'inc/scripts/validation.php';
    include_once 'inc/layout/header.php';
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
                <div class="filters">
                    <a class="desc" href="#">
                        <i class="fa-solid fa-chevron-down"></i>
                        <p>desc</p>
                    </a>
                    <a class="asc" href="#">
                        <i class="fa-solid fa-chevron-up"></i>
                        <p>asc</p>
                    </a>
                </div>
            </header>
            <div class="date">
                <h2><?= date('D, M-d-y') ?></h2>
            </div>
            <div class="tasks-container pdy-3">
                <form id="form-task" action="inc/scripts/insertTask.php" method="post">
                    <p class="invalid-input-task">The field cannot be empty</p>
                    <input class="input-add-task" name="task" type="text" placeholder="Add a task">
                    <div class="task-filter-container">
                        <ul class="filters-task">
                            <li class="filter-item" data-query="today">
                                <a href="#"><i class="fa-solid fa-sun"></i></a>
                            </li>
                            <li class="filter-item" data-query="favorite">
                                <a href="#"><i class="fa-solid fa-star"></i></a>
                            </li>
                            <li class="filter-item" data-query="important">
                                <a href="#"><i class="fa-sharp fa-solid fa-circle-exclamation"></i></a>
                            </li>
                        </ul>
                        <button class="submit-task" name="submit-task" type="submit">Add</button>
                    </div>
                </form>
                <ul class="tasks mt-5">
                    <?php include_once 'inc/scripts/taskQuery.php'; ?>
                </ul>
            </div>
        </section>
    </main>
<?php include_once 'inc/layout/footer.php' ?>