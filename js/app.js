//Global Vars
const appElement = document.querySelector('#app');
const headerElement = document.querySelector('.main-header');

import initTheme from './theme.js';
import initLayout from './layout.js';
import initMenu from './menu.js';
import initValidateForm from './validateForm.js';
import initTask from './task.js';
import initModal from './modal.js';

//Global Functions
async function doneTaskAjax(url,id,val) {
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: JSON.stringify({id:id,doneVal:val})
    });
    const responseData = await response.json();
}

function setTasksDone() {
    const doneTasks = Array.from(document.querySelectorAll('li.task')).filter(task => task.dataset.done === "1");
    doneTasks.forEach(task =>{
        const inptCheckbox = task.querySelector('.check-input');
        const taskName = task.querySelector('.task-name');
        inptCheckbox.setAttribute('checked',true);
        taskName.classList.add('text-done');
    });
}

function appendTasks(container,data) {
    container.innerHTML = '';
    data.reverse().forEach(task => { 
     const taskLi = `
         <li class="task" data-id="${task.id}" data-done="${task.done.trim()}">
             <div class="left">
                 <span class="mark"><input type="checkbox" class="check-input" name="task-check"></span>
                 <p class="task-name">${task.name}</p>
             </div>
             <div class="right">
                 <span class="task-icon task-edit" data-id="${task.id}">
                     <i class="fa-solid fa-pen"></i>
                 </span>
                 <span class="task-icon task-delete" data-id="${task.id}">
                     <i class="fa-sharp fa-solid fa-trash"></i>
                 </span>
             </div>
         </li>
     `
     container.insertAdjacentHTML('afterbegin',taskLi);
    });
    setTasksDone();
}

function eventsToTasks(cb) {
    Array.from(document.querySelectorAll('.tasks .task-edit')).forEach((btn) => {
        btn.addEventListener('click', (e)=>{
            const {currentTarget} = e;
            const taskId = currentTarget.dataset.id;
            document.querySelector('#taskId').value = taskId;
            document.querySelector('.modal-edit').classList.toggle('open');
        });
    });

    Array.from(document.querySelectorAll('.tasks .task-delete')).forEach((btn) => {
        btn.addEventListener('click', (e)=>{
            const {currentTarget} = e;
            const taskId = currentTarget.dataset.id;
            document.querySelector('#taskIdDelete').value = taskId;
            document.querySelector('.modal-delete').classList.toggle('open');
        });
    });

    Array.from(document.querySelectorAll('.task .mark input')).forEach(input => {
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
            cb('/jimo/doneTask',id,currentTarget.value);
        })
    })
}

initTheme();
initLayout(appElement,headerElement);
initMenu(appElement,appendTasks,eventsToTasks,doneTaskAjax);
initValidateForm();
initTask(appElement,appendTasks,eventsToTasks,doneTaskAjax);
initModal(appElement);