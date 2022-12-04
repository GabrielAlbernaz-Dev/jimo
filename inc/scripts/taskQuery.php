<?php 
    $user_id = $_SESSION['user_id'];
    $table = TASKS_TABLE;
    $order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'ASC';
?>
<?php if(isset($_GET['query'])) : ?> 
<?php 
    $condition = $_GET['query'];
    $sqlTasks = "SELECT * FROM $table WHERE $condition AND user_id = $user_id ORDER BY task $order_by";
    $resultTasks = mysqli_query($conn,$sqlTasks);
?>

<?php while($row = mysqli_fetch_array($resultTasks)) : ?>
    <li data-id="<?= $row['id'];?>" class="task">
        <div class="left">
        <span class="mark"><input type="checkbox" class="check-input" name="task-check"></span>
            <p class="task-name"><?= $row['task']; ?></p>
        </div>
        <div class="right">
            <a class="task-icon task-edit">
                <i class="fa-solid fa-pen"></i>
            </a>
            <a href="deleteTask.php?del_task=<?=$row['id']; ?>" class="task-icon task-delete">
                <i class="fa-sharp fa-solid fa-trash"></i>
            </a>
        </div>
    </li>
<?php endwhile; ?>

<?php else :
    $sqlTasks = "SELECT * FROM $table WHERE 1 AND user_id = $user_id ORDER BY task $order_by";
    $resultTasks = mysqli_query($conn,$sqlTasks);
?>

<?php  while($row = mysqli_fetch_array($resultTasks)) :?>
    <li class="task" data-id="<?= $row['id'] ?>">
        <div class="left">
            <span class="mark"><input type="checkbox" class="check-input" name="task-check"></span>
            <p class="task-name"><?= $row['task']; ?></p>
        </div>
        <div class="right">
            <span class="task-icon task-edit">
                <i class="fa-solid fa-pen"></i>
            </span>
            <span class="task-icon task-delete">
                <i class="fa-sharp fa-solid fa-trash"></i>
            </span>
        </div>
    </li>
<?php endwhile; ?>


<?php endif; ?>