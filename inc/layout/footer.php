<!--Edit -->
<div class="modal-edit">
    <div class="modal-edit-content">
        <form class="edit-form" action="editTask.php" method="post">
            <input type="text" name="taskName" placeholder="New task name">
            <input type="hidden" name="taskIdEdit" id="taskIdEdit">
            <button class="submit-edit" name="submit-edit" type="submit">Edit Task</button>
        </form>
    </div>
</div>
<!--Delete -->
<div class="modal-delete">
    <div class="modal-delete-content">
        <form class="delete-form" action="deleteTask.php" method="post">
            <input type="hidden" name="taskIdDelete" id="taskIdDelete">
            <button class="submit-delete" name="submit-delete" type="submit">Are you sure you want to delete this task?</button>
        </form>
    </div>
</div>
<script type="module" src="js/app.js"></script>
</body>
</html>