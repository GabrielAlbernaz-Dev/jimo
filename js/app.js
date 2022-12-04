//Global Vars
const appElement = document.querySelector('#app');
const headerElement = document.querySelector('.main-header');

import initTheme from './theme.js';
import initLayout from './layout.js';
import initMenu from './menu.js';
import initValidateForm from './validateForm.js';
import initTask from './task.js';
import initModal from './modal.js';

initTheme();
initLayout(appElement,headerElement);
initMenu(appElement);
initValidateForm();
initTask(appElement);
initModal(appElement);