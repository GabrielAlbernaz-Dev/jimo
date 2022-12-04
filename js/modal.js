export default function initModal(app) {
    if(app) {
        // Modal Edit
        const taskEditBtns = document.querySelectorAll('.task-edit');
        const modalEdit = document.querySelector('.modal-edit');

        function handleModalEdit(e) {
            const {currentTarget} = e;
            console.log(currentTarget);
            const taskId = currentTarget.closest('li').dataset.id;
            const editForm = modalEdit.querySelector('.edit-form');
            modalEdit.classList.toggle('open');
            editForm.action = `editTask.php?edit_task=${taskId}`;
        }

        taskEditBtns.forEach((btn) => {
            btn.addEventListener('click', handleModalEdit);
        });

        modalEdit.addEventListener('click', (e)=>{
            e.stopPropagation();
            const {target} = e;
            if(target.classList.contains('open')) {
                target.classList.toggle('open');
            } else {
                return
            }
        });
    } 
}