export default function initTask(app,appendTasks,eventsTasks,doneTaskFn) {
    if (app) {
        // Elements
        const inputTask = document.querySelector('.input-add-task');
        const submitTask = document.querySelector('.submit-task');
        const inputInvalidMsg = document.querySelector('.invalid-input-task');
        const filterTaskBtns = document.querySelectorAll('.filters-task .filter-item');
        const markInputs = document.querySelectorAll('.task .mark input');
        const searchInput = document.querySelector('.search-todo-input');
        const searchTodoBtn = document.querySelector('.search-todo-button');

        function checkInputTask(e) {
            if (inputTask.value.length === 0) {
                inputInvalidMsg.classList.add('active');
                e.preventDefault();
            }
        }
        submitTask.addEventListener('click', checkInputTask);

        filterTaskBtns.forEach(btn => {
            btn.addEventListener('click', ({ currentTarget }) => {
                const inputBtn = btn.querySelector('input[type="hidden"]');
                currentTarget.classList.toggle('active');
                if (btn.classList.contains('active')) inputBtn.value = 1; 
                else inputBtn.value = 0;
            })
        });

        markInputs.forEach(input => {
            input.addEventListener('change',({currentTarget})=>{
                const parent = currentTarget.closest('.left');
                const taskText  = parent.querySelector('.task-name');
                const id = currentTarget.closest('li.task').dataset.id;
                if(currentTarget.checked) {
                   taskText.classList.add('text-done');
                   currentTarget.value = 1;
                } else {
                    taskText.classList.remove('text-done');
                    currentTarget.value = 0;
                }
                doneTaskFn('/jimo/doneTask',id,currentTarget.value);
            });
        });

        //Search
        searchTodoBtn.addEventListener('click', (e)=>{
            window.location.href = `${window.location.origin}/jimo/app?search=${searchInput.value}`
        });

        async function searchTasksAjax(url,data) {
            const tasksContainer = document.querySelector('.task-wrapper .tasks');
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: data
            });
           const responseData = await response.json();
           //Add Tasks to container
           appendTasks(tasksContainer,responseData);
           //Events after ajax
           eventsTasks(doneTaskFn);
        }
        
        window.addEventListener('load', ()=>{
            const params = new URLSearchParams(new URL(window.location.href).search);
            const searchData = params.get("search");
            if(params.has('search')) {
                searchTasksAjax(`${window.location.origin}/jimo/searchTask`,searchData)
            }
        });

    }
}