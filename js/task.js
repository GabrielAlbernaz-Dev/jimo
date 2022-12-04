export default function initTask(app) {
    if (app) {
        // Elements
        const inputTask = document.querySelector('.input-add-task');
        const submitTask = document.querySelector('.submit-task');
        const inputInvalidMsg = document.querySelector('.invalid-input-task');
        const filterTaskBtns = document.querySelectorAll('.filters-task .filter-item');
        const orderByDescBtn = document.querySelector('.header-tasks .desc');
        const orderByAscBtn = document.querySelector('.header-tasks .asc');
        const markInputs = document.querySelectorAll('.task .mark input');
        const formTask = document.getElementById('form-task');
        const defaultAction = formTask.action;
        let paramsList = new Set();
        let params = null;


        function changeActionHref(params) {
            const newParams = '?' + params;
            const newAction = params ? defaultAction + newParams : defaultAction;
            formTask.action = newAction;
        }

        function checkInputTask(e) {
            if (inputTask.value.length === 0) {
                inputInvalidMsg.classList.add('active');
                e.preventDefault();
            }
        }

        function changeUrlOrder(text1, text2) {
            const windowHref = window.location.href;
            if (!windowHref.includes('order_by') && windowHref.includes('query')) {
                const urlSplited = windowHref.split('&');
                window.location.href = urlSplited[0] + text1;
            } else if (windowHref.includes('order_by') && windowHref.includes('query')) {
                const orderIndex = windowHref.indexOf('order_by');
                const oldUrl = window.location.href.slice(0,orderIndex);
                window.location.href = oldUrl + text1.replace('&','');
            } else {
                const oldUrl = windowHref.includes('?') ? windowHref.split('=')[0].replace('?','') : windowHref;
                window.location.href = oldUrl + text2;
            }
        }

        filterTaskBtns.forEach(btn => {
            const queryParam = btn.dataset.query;
            btn.addEventListener('click', ({ currentTarget }) => {
                currentTarget.classList.toggle('active');
                if (btn.classList.contains('active')) {
                    paramsList.add(queryParam);
                    const paramsArr = Array.from(paramsList);
                    params = paramsArr.join('&');
                } else {
                    paramsList.delete(queryParam);
                    const paramsArr = Array.from(paramsList);
                    params = paramsArr.join('&');
                }
                changeActionHref(params);
            })
        })

        submitTask.addEventListener('click', checkInputTask);

        orderByDescBtn.addEventListener('click', (e) => {
            e.preventDefault();
            changeUrlOrder('&order_by=DESC', '?=order_by=DESC')
        })

        orderByAscBtn.addEventListener('click', (e) => {
            e.preventDefault();
            changeUrlOrder('&order_by=ASC', '?=order_by=ASC')
        })

        markInputs.forEach(input => {
            input.addEventListener('change',({currentTarget})=>{
                const parent = currentTarget.closest('.left');
                const taskText  = parent.querySelector('.task-name');
                if(currentTarget.checked) {
                   taskText.classList.add('text-done');
                } else {
                    taskText.classList.remove('text-done');
                }
            })
        })
    }
}