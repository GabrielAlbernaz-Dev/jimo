export default function initMenu(app,appendTasks,eventsTasks,doneTaskFn) {
    //Mobile Menu
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const rightHeaderItem = document.querySelector('.main-header .right');

    function handleMobileMenu() {
        rightHeaderItem.classList.toggle('active');
    }

    mobileMenuToggle.addEventListener('click',handleMobileMenu);

    if(app) {
        //Aside Menu
        const asideNav = document.querySelector('aside.side-nav');
        const asideNavLinks = asideNav.querySelectorAll('.nav li a');
        const asideMenuToggle = asideNav.querySelector('.toggle-nav');
        const headerTasksTitle = document.querySelector('.header-tasks .info-text');

        function handleAsideMenu() {
            app.classList.toggle('side-disabled');
        }
        asideMenuToggle.addEventListener('click',handleAsideMenu);

        function removeAllActives() {
            asideNavLinks.forEach(link => link.classList.remove('active'));
        }

        async function tasksAjax(url,data) {
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


        asideNavLinks.forEach(link => {
            link.addEventListener('click', (e)=>{
                e.preventDefault();
                const {currentTarget} = e;
                tasksAjax('/jimo/tasks',currentTarget.dataset.filter);
                removeAllActives();
                currentTarget.classList.add('active');
                headerTasksTitle.innerText = currentTarget.innerText;
            });
        });

        //Profile
        const profileToggle = document.querySelector('.main-header .profile');
        const profileDropdown = profileToggle.querySelector('.dropdown-profile');

        function handleProfile() {
            profileDropdown.classList.toggle('active');
        }

        profileToggle.addEventListener('click',handleProfile)
    }
    
}