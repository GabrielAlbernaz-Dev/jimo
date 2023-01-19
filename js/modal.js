export default function initModal(app) {
    if(app) {
        // Modal Edit
        const taskEditBtns = document.querySelectorAll('.task-edit');
        const modalEdit = document.querySelector('.modal-edit');
        const modalDelete = document.querySelector('.modal-delete');
        const inputTaskEdit = document.querySelector('#taskIdEdit');
        const inputTaskDelete = document.querySelector('#taskIdDelete');
        const deletedTaskBtns = document.querySelectorAll('.tasks .task-delete');

        // document.querySelector('.edit-form').onsubmit = (e)=>{
        //     e.preventDefault();
        // }

        function handleModalEdit(e) {
            e.preventDefault();
            const {currentTarget} = e;
            const taskId = currentTarget.dataset.id;
            inputTaskEdit.value = taskId;
            modalEdit.classList.toggle('open');
        }

        taskEditBtns.forEach((btn) => {
            btn.addEventListener('click', handleModalEdit);
        });

        modalEdit.addEventListener('click', (e)=>{
            e.stopPropagation();
            const {target,currentTarget} = e;
            if(target === currentTarget) {
                target.classList.toggle('open');
            }
        });

        //Delete Task
        function handleModalDelete(e) {
            const {currentTarget} = e;
            const taskId = currentTarget.dataset.id;
            inputTaskDelete.value = taskId;
            modalDelete.classList.toggle('open');
        }

        deletedTaskBtns.forEach(btn => {
            btn.addEventListener('click',handleModalDelete);
        });

        modalDelete.addEventListener('click', (e)=>{
            e.stopPropagation();
            const {target,currentTarget} = e;
            if(target === currentTarget) {
                target.classList.toggle('open');
            }
        });
    } 
}